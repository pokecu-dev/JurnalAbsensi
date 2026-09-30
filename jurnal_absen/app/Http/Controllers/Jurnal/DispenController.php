<?php

namespace App\Http\Controllers\Jurnal;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Dispen;
use App\Models\DispenApprovalToken;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class DispenController extends Controller
{
    public function index()
    {
        $dispens = Dispen::with(['siswa', 'kelas', 'approver'])
            ->latest()
            ->paginate(10);

        return view('dispen.index', compact('dispens'));
    }

    public function create()
    {
        $siswas = Siswa::all();
        $classes = Classes::all();

        $sekres = User::query()
            ->where('role', 'sekre')
            ->whereNotNull('phone')
            ->orderBy('name')
            ->get(['id', 'name', 'phone']);

        $kategori = ['osis', 'lomba', 'sakit', 'pribadi', 'lainnya'];

        // return response()->json([
        // $sekres
        // ]);

        return view('test-dispen', compact('siswas', 'classes', 'kategori', 'sekres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'approval_user_id' => [
                'required',
                Rule::exists('users', 'id')->where(
                    fn ($query) => $query
                        ->where('role', 'sekre')
                        ->whereNotNull('phone')
                ),
            ],
            'siswa_id' => 'required|exists:siswas,id',
            'class_id' => 'required|exists:classes,id',
            'kategori' => ['required', Rule::in(['osis', 'lomba', 'sakit', 'pribadi', 'lainnya'])],
            'alasan' => 'required|string',
            'tgl' => 'required|date',
            'jam_mulai' => 'nullable|date_format:H:i',
            'jam_selesai' => 'nullable|date_format:H:i|after_or_equal:jam_mulai',
        ]);

        $approvalUser = User::query()
            ->whereKey($validated['approval_user_id'])
            ->where('role', 'sekre')
            ->whereNotNull('phone')
            ->firstOrFail();

        $phone = preg_replace('/\D+/', '', $approvalUser->phone);

        abort_unless(str_starts_with($phone, '62'), 422, 'Nomor WhatsApp Sekre tidak valid.');

        $validated['status'] = 'pending';

        $siswaData = Siswa::FindOrFail($validated['siswa_id']);

        $siswa = $siswaData['name'];
        $kelas = Kelas::FindOrFail($validated['class_id'])->name;

        $dispen = Dispen::create($validated);

        $token = Str::random(64);

        DispenApprovalToken::create([
            'dispen_id' => $dispen->id,
            'token_hash' => hash('sha256', $token),
            'expires_at' => now()->addHour(),
            'last_sent_at' => now(),
        ]);

        $approvalUrl = route('dispen.approval', [
            'dispen' => $dispen->id,
            'token' => $token,
        ]);

        $message = "Mohon klik link untuk melakukan verifikasi Dispen\n"
            ."Note: Link bersifat sekali pakai\n"
            ."Link: {$approvalUrl}\n"
            ."Nama Siswa: {$siswa}\n"
            ."Kelas: {$kelas}\n"
            ."Kategori: {$validated['kategori']}\n"
            ."Alasan: {$validated['alasan']}\n"
            ."Link berlaku selama 1 jam.\n";

        return redirect(
            'https://wa.me/'.$phone.'?text='.urlencode($message)
        );
        // return redirect('https://wa.me/6281235807937?text=Mohon%20Klik%20link%20untuk%20melakukan%20verifikasi%20Dispen%0ANote%3ALink%20bersifat%20sekali%20pakai%0ALink%3A%20https://wa.me/6281235807937%0ANama%20Siswa%3A%20{$siswa}');

        // return redirect()->route('dispen.index')->with('success', 'Pengajuan dispensasi berhasil dibuat.');
    }

    public function show(Dispen $dispen)
    {
        $dispen->load(['siswa', 'kelas', 'approver']);

        return response()->json([$dispen]);
        // return view('dispen.show', compact('dispen'));
    }

    public function edit(Dispen $dispen)
    {
        $siswas = Siswa::all();
        $classes = Classes::all();
        $kategori = ['osis', 'lomba', 'sakit', 'pribadi', 'lainnya'];

        return view('dispen.edit', compact('dispen', 'siswas', 'classes', 'kategori'));
    }

    public function update(Request $request, Dispen $dispen)
    {
        $validated = $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'class_id' => 'required|exists:classes,id',
            'kategori' => ['required', Rule::in(['osis', 'lomba', 'sakit', 'pribadi', 'lainnya'])],
            'alasan' => 'required|string',
            'tgl' => 'required|date',
            'jam_mulai' => 'nullable',
            'jam_selesai' => 'nullable',
        ]);

        $dispen->update($validated);

        return redirect()->route('dispen.index')->with('success', 'Data dispensasi berhasil diperbarui.');
    }

    public function destroy(Dispen $dispen)
    {
        $dispen->delete();

        return redirect()->route('dispen.index')->with('success', 'Data dispensasi berhasil dihapus.');
    }
}
