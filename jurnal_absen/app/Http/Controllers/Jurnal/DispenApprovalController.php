<?php

namespace App\Http\Controllers\Jurnal;

use App\Http\Controllers\Controller;
use App\Models\Dispen;
use App\Models\DispenApprovalToken;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class DispenApprovalController extends Controller
{
    public function approval(Dispen $dispen, string $token): View
    {
        $dispen->load(['approvalToken', 'approvalUser', 'details.siswa.class']);

        if ($dispen->status !== 'pending') {
            return view('dispen.approval-finished', compact('dispen'));
        }

        $approvalToken = $dispen->approvalToken;

        if (! $approvalToken) {
            abort(404, 'Token approval tidak ditemukan.');
        }

        $isCurrentToken = hash_equals($approvalToken->token_hash, hash('sha256', $token));

        if (! $isCurrentToken) {
            return view('dispen.approval-expired', compact('dispen', 'approvalToken', 'isCurrentToken'));
        }

        if ($approvalToken->used_at !== null || $approvalToken->expires_at->isPast()) {
            return view('dispen.approval-expired', compact('dispen', 'approvalToken', 'isCurrentToken'));
        }

        $approvalUser = $dispen->approvalUser;

        if (! $approvalUser || $approvalUser->role !== 'sekre') {
            abort(403, 'User approval tidak valid.');
        }

        if(auth()->check()){
            if(auth()->role() === 'sekre'){
                return view('dispen.approval.page',['dispen' => $dispen]);
            }
            else{
                abort(403,'User tidak sesuai dengan yang di tunjuk');
            }
        }

        return view('dispen.approval', compact('dispen', 'approvalToken', 'token', 'approvalUser'));
    }

    public function login(Request $request, Dispen $dispen): RedirectResponse
    {
        $validated = $request->validate([
            'token' => ['required', 'string'],
        ]);

        $approvalUser = $dispen->approvalUser;

        if (! $approvalUser || $approvalUser->role !== 'sekre') {
            abort(403, 'User approval tidak valid.');
        }

        DB::transaction(function () use ($dispen, $validated, $approvalUser): void {
            $lockedDispen = Dispen::query()->whereKey($dispen->id)->lockForUpdate()->firstOrFail();

            if ($lockedDispen->status !== 'pending') {
                abort(409, 'Pengajuan sudah diproses.');
            }

            if ((int) $lockedDispen->approval_user_id !== (int) $approvalUser->id) {
                abort(403, 'User approval tidak valid.');
            }

            $approvalToken = $lockedDispen->approvalToken()->lockForUpdate()->firstOrFail();
            $tokenHash = hash('sha256', $validated['token']);

            if (! hash_equals($approvalToken->token_hash, $tokenHash)) {
                abort(403, 'Token tidak valid.');
            }

            if ($approvalToken->used_at !== null || $approvalToken->expires_at->isPast()) {
                abort(410, 'Token sudah digunakan atau kedaluwarsa.');
            }

            $approvalToken->update(['used_at' => now()]);
        });

        Auth::login($approvalUser);
        $request->session()->regenerate();

        return redirect()->route('dispen.approval.page', ['dispen' => $dispen]);
    }

    public function approvalPage(Dispen $dispen): View
    {
        abort_unless(Auth::check(), 401);
        abort_unless(Auth::user()->role === 'sekre', 403);
        abort_unless((int) Auth::id() === (int) $dispen->approval_user_id, 403);

        if ($dispen->status !== 'pending') {
            return view('dispen.approval-finished', compact('dispen'));
        }

        $dispen->load(['details.siswa.class']);

        return view('dispen.approval-page', compact('dispen'));
    }

    public function resend(Dispen $dispen, string $token): RedirectResponse
    {
        $approvalUser = $dispen->approvalUser;

        if (! $approvalUser || $approvalUser->role !== 'sekre') {
            abort(403, 'User approval tidak valid.');
        }

        $phone = preg_replace('/\D+/', '', (string) $approvalUser->phone);

        if (! str_starts_with($phone, '62')) {
            abort(422, 'Nomor WhatsApp Sekre tidak valid.');
        }

        $newToken = DB::transaction(function () use ($dispen, $token): string {
            $lockedDispen = Dispen::query()->whereKey($dispen->id)->lockForUpdate()->firstOrFail();

            if ($lockedDispen->status !== 'pending') {
                abort(409, 'Pengajuan ini sudah diproses.');
            }

            $approvalToken = $lockedDispen->approvalToken()->lockForUpdate()->firstOrFail();

            if (! hash_equals($approvalToken->token_hash, hash('sha256', $token))) {
                abort(403, 'Token tidak valid atau sudah diganti.');
            }

            $availableAt = $approvalToken->last_sent_at->copy()->addSeconds(45);
            if ($availableAt->isFuture()) {
                $remaining = max(1, now()->diffInSeconds($availableAt, false));
                abort(429, "Silakan tunggu {$remaining} detik sebelum mengirim ulang.");
            }

            $newToken = Str::random(64);
            $approvalToken->update([
                'token_hash' => hash('sha256', $newToken),
                'expires_at' => now()->addHour(),
                'last_sent_at' => now(),
                'used_at' => null,
            ]);

            return $newToken;
        });

        $dispen->load(['details.siswa.class']);
        $approvalUrl = route('dispen.approval', ['dispen' => $dispen, 'token' => $newToken]);
        $studentLines = $dispen->details->values()->map(fn ($detail, int $index): string => sprintf(
            '%d. %s - %s',
            $index + 1,
            $detail->siswa?->name ?? 'Siswa dihapus',
            $detail->siswa?->class?->name ?? 'Kelas belum ditentukan'
        ))->implode("\n");
        $message = "Mohon lakukan approval Dispen.\n"
            ."Tanggal: {$dispen->tgl->locale('id')->translatedFormat('d F Y')}\n"
            ."Kategori: {$dispen->kategori}\n"
            ."Alasan: {$dispen->alasan}\n"
            ."Daftar Siswa:\n{$studentLines}\n"
            ."Link: {$approvalUrl}\n"
            .'Link berlaku selama 1 jam.';

        return redirect('https://wa.me/'.$phone.'?text='.urlencode($message));
    }

    public function updateStatus(Request $request, Dispen $dispen): JsonResponse
    {
        abort_unless(Auth::check(), 401);
        abort_unless(Auth::user()->role === 'sekre', 403);
        abort_unless((int) Auth::id() === (int) $dispen->approval_user_id, 403);

        $validated = DB::transaction(function () use ($request, $dispen): array {
            $lockedDispen = Dispen::query()->whereKey($dispen->id)->lockForUpdate()->firstOrFail();

            if ($lockedDispen->status !== 'pending') {
                abort(409, 'Pengajuan dispensasi sudah diproses.');
            }

            if ((int) Auth::id() !== (int) $lockedDispen->approval_user_id) {
                abort(403, 'Anda bukan Sekre yang ditunjuk untuk approval.');
            }

            $validated = $request->validate([
                'status' => ['required', Rule::in(['approved', 'rejected'])],
            ]);

            $lockedDispen->update([
                'status' => $validated['status'],
                'approved_by' => Auth::id(),
            ]);

            DispenApprovalToken::query()->where('dispen_id', $lockedDispen->id)
                ->lockForUpdate()
                ->first()?->update(['used_at' => now()]);

            return $validated;
        });

        return response()->json([
            'status' => 'success',
            'message' => 'Status dispensasi berhasil diperbarui.',
            'dispen_id' => $dispen->id,
            'decision_status' => $validated['status'],
            'approved_by' => Auth::id(),
        ]);
    }
}
