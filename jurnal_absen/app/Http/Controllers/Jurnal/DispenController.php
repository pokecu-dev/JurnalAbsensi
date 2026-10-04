<?php

namespace App\Http\Controllers\Jurnal;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Dispen;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class DispenController extends Controller
{
    private const KATEGORI = ['osis', 'lomba', 'sakit', 'pribadi', 'lainnya'];

    public function index(Request $request): View
    {
        $filters = $request->validate([
            'q' => ['nullable', 'string', 'max:200'],
            'class_id' => ['nullable', 'integer', 'exists:classes,id'],
            'status' => ['nullable', Rule::in(['pending', 'approved', 'rejected'])],
            'kategori' => ['nullable', Rule::in(self::KATEGORI)],
            'date' => ['nullable', 'date'],
            'date_from' => ['nullable', 'date'],
            'date_to' => ['nullable', 'date', 'after_or_equal:date_from'],
            'approval_user_id' => [
                'nullable',
                Rule::exists('users', 'id')->where(fn ($query) => $query->where('role', 'sekre')),
            ],
        ]);

        $query = Dispen::query()
            ->with(['details.siswa.class', 'approvalUser', 'approver'])
            ->when($filters['q'] ?? null, function ($query, string $search): void {
                $query->where(function ($query) use ($search): void {
                    $query->where('alasan', 'like', "%{$search}%")
                        ->orWhere('kategori', 'like', "%{$search}%")
                        ->orWhereHas('details.siswa', fn ($query) => $query->where('name', 'like', "%{$search}%"))
                        ->orWhereHas('approvalUser', fn ($query) => $query->where('name', 'like', "%{$search}%"))
                        ->orWhereHas('approver', fn ($query) => $query->where('name', 'like', "%{$search}%"));
                });
            })
            ->when($filters['class_id'] ?? null, fn ($query, int $classId) => $query->whereHas(
                'details.siswa',
                fn ($query) => $query->where('class_id', $classId)
            ))
            ->when($filters['status'] ?? null, fn ($query, string $status) => $query->where('status', $status))
            ->when($filters['kategori'] ?? null, fn ($query, string $kategori) => $query->where('kategori', $kategori))
            ->when($filters['date'] ?? null, fn ($query, string $date) => $query->whereDate('tgl', $date))
            ->when($filters['date_from'] ?? null, fn ($query, string $date) => $query->whereDate('tgl', '>=', $date))
            ->when($filters['date_to'] ?? null, fn ($query, string $date) => $query->whereDate('tgl', '<=', $date))
            ->when($filters['approval_user_id'] ?? null, fn ($query, int $userId) => $query->where('approval_user_id', $userId));

        $dispens = $query->latest()->paginate(15)->withQueryString();
        $classes = Classes::query()->orderBy('name')->get(['id', 'name']);
        $sekres = User::query()->where('role', 'sekre')->orderBy('name')->get(['id', 'name']);
        $counts = Dispen::query()->select('status', DB::raw('COUNT(*) as aggregate'))->groupBy('status')->pluck('aggregate', 'status');
        $summary = [
            'total' => (int) $counts->sum(),
            'pending' => (int) ($counts['pending'] ?? 0),
            'approved' => (int) ($counts['approved'] ?? 0),
            'rejected' => (int) ($counts['rejected'] ?? 0),
        ];

        return view('dispen.index', compact('dispens', 'classes', 'sekres', 'filters', 'summary'));
    }

    public function create(): View
    {
        $siswas = Siswa::query()->with('class')->orderBy('name')->get();
        $classes = Classes::query()->orderBy('name')->get(['id', 'name']);
        $sekres = User::query()
            ->where('role', 'sekre')
            ->whereNotNull('phone')
            ->where('phone', '!=', '')
            ->orderBy('name')
            ->get(['id', 'name']);
        $kategori = self::KATEGORI;
        $selectedSiswaIds = old('siswa_ids', []);
        $selectedSiswaIds = is_array($selectedSiswaIds) ? $selectedSiswaIds : [];

        return view('dispen.create', compact('siswas', 'classes', 'kategori', 'sekres', 'selectedSiswaIds'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'siswa_ids' => ['required', 'array', 'min:1'],
            'siswa_ids.*' => ['required', 'integer', 'distinct', 'exists:siswas,id'],
            'approval_user_id' => [
                'required',
                Rule::exists('users', 'id')->where(fn ($query) => $query
                    ->where('role', 'sekre')
                    ->whereNotNull('phone')
                    ->where('phone', '!=', '')),
            ],
            'kategori' => ['required', Rule::in(self::KATEGORI)],
            'alasan' => ['required', 'string'],
            'tgl' => ['required', 'date'],
            'jam_mulai' => ['nullable', 'date_format:H:i'],
            'jam_selesai' => ['nullable', 'date_format:H:i', 'after_or_equal:jam_mulai'],
        ]);

        $approvalUser = User::query()
            ->whereKey($validated['approval_user_id'])
            ->where('role', 'sekre')
            ->whereNotNull('phone')
            ->where('phone', '!=', '')
            ->firstOrFail();
        $phone = $this->normalizeWhatsAppNumber($approvalUser->phone);
        $siswas = Siswa::query()->with('class')->whereKey($validated['siswa_ids'])->orderBy('name')->get();

        if ($siswas->count() !== count($validated['siswa_ids'])) {
            abort(422, 'Satu atau lebih siswa tidak ditemukan.');
        }

        [$dispen, $token] = DB::transaction(function () use ($validated): array {
            $token = Str::random(64);
            $dispen = Dispen::create([
                'kategori' => $validated['kategori'],
                'alasan' => $validated['alasan'],
                'tgl' => $validated['tgl'],
                'jam_mulai' => $validated['jam_mulai'] ?? null,
                'jam_selesai' => $validated['jam_selesai'] ?? null,
                'status' => 'pending',
                'approval_user_id' => $validated['approval_user_id'],
            ]);
            $dispen->details()->createMany(array_map(
                fn (int $siswaId): array => ['siswa_id' => $siswaId],
                $validated['siswa_ids']
            ));
            $sentAt = now();
            $dispen->approvalToken()->create([
                'token_hash' => hash('sha256', $token),
                'expires_at' => $sentAt->copy()->addHour(),
                'last_sent_at' => $sentAt,
            ]);

            return [$dispen, $token];
        });

        $approvalUrl = route('dispen.approval', [
            'dispen' => $dispen->id,
            'token' => $token,
        ]);
        $studentLines = $siswas->values()->map(fn (Siswa $siswa, int $index): string => sprintf(
            '%d. %s - %s',
            $index + 1,
            $siswa->name,
            $siswa->class?->name ?? 'Kelas belum ditentukan'
        ))->implode("\n");
        $message = "Pengajuan Dispen\n"
            .'Tanggal: '.$dispen->tgl->locale('id')->translatedFormat('d F Y')."\n"
            ."Kategori: {$dispen->kategori}\n"
            ."Alasan: {$dispen->alasan}\n\n"
            ."Daftar Siswa:\n{$studentLines}\n\n"
            ."Link Approval:\n{$approvalUrl}\n"
            .'Link berlaku selama 1 jam.';

        return redirect('https://wa.me/'.$phone.'?text='.urlencode($message));
    }

    public function show(Dispen $dispen): View
    {
        $dispen->load(['details.siswa.class', 'approver', 'approvalUser']);

        return view('dispen.show', compact('dispen'));
    }

    public function edit(Dispen $dispen): View
    {
        abort_unless($dispen->status === 'pending', 409, 'Pengajuan yang sudah diproses tidak dapat diedit.');

        $dispen->load('details');
        $siswas = Siswa::query()->with('class')->orderBy('name')->get();
        $classes = Classes::query()->orderBy('name')->get(['id', 'name']);
        $kategori = self::KATEGORI;
        $selectedSiswaIds = old('siswa_ids', $dispen->details->pluck('siswa_id')->all());
        $selectedSiswaIds = is_array($selectedSiswaIds) ? $selectedSiswaIds : [];

        return view('dispen.edit', compact('dispen', 'siswas', 'classes', 'kategori', 'selectedSiswaIds'));
    }

    public function update(Request $request, Dispen $dispen): RedirectResponse
    {
        abort_unless($dispen->status === 'pending', 409, 'Pengajuan yang sudah diproses tidak dapat diedit.');

        $validated = $request->validate([
            'siswa_ids' => ['required', 'array', 'min:1'],
            'siswa_ids.*' => ['required', 'integer', 'distinct', 'exists:siswas,id'],
            'kategori' => ['required', Rule::in(self::KATEGORI)],
            'alasan' => ['required', 'string'],
            'tgl' => ['required', 'date'],
            'jam_mulai' => ['nullable', 'date_format:H:i'],
            'jam_selesai' => ['nullable', 'date_format:H:i', 'after_or_equal:jam_mulai'],
        ]);

        DB::transaction(function () use ($dispen, $validated): void {
            $lockedDispen = Dispen::query()->whereKey($dispen->id)->lockForUpdate()->firstOrFail();
            abort_unless($lockedDispen->status === 'pending', 409, 'Pengajuan yang sudah diproses tidak dapat diedit.');

            $lockedDispen->update([
                'kategori' => $validated['kategori'],
                'alasan' => $validated['alasan'],
                'tgl' => $validated['tgl'],
                'jam_mulai' => $validated['jam_mulai'] ?? null,
                'jam_selesai' => $validated['jam_selesai'] ?? null,
            ]);
            $lockedDispen->details()->delete();
            $lockedDispen->details()->createMany(array_map(
                fn (int $siswaId): array => ['siswa_id' => $siswaId],
                $validated['siswa_ids']
            ));
        });

        return redirect()->route('dispen.show', $dispen)->with('success', 'Data dispensasi berhasil diperbarui.');
    }

    public function destroy(Dispen $dispen): RedirectResponse
    {
        abort_unless($dispen->status === 'pending', 409, 'Pengajuan yang sudah diproses tidak dapat dihapus.');

        DB::transaction(function () use ($dispen): void {
            $lockedDispen = Dispen::query()->whereKey($dispen->id)->lockForUpdate()->firstOrFail();
            abort_unless($lockedDispen->status === 'pending', 409, 'Pengajuan yang sudah diproses tidak dapat dihapus.');

            $lockedDispen->details()->delete();
            $lockedDispen->approvalToken()->delete();
            $lockedDispen->delete();
        });

        return redirect()->route('dispen.index')->with('success', 'Pengajuan Dispen berhasil dihapus.');
    }

    private function normalizeWhatsAppNumber(string $phone): string
    {
        $normalized = preg_replace('/\D+/', '', $phone);

        abort_unless(str_starts_with($normalized, '62'), 422, 'Nomor WhatsApp Sekre harus menggunakan kode negara +62.');

        return $normalized;
    }
}
