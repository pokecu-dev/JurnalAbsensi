<?php

use App\Models\Dispen;
use App\Models\DispenApprovalToken;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

function makeDispenApproval(): array
{
    $approvalUser = User::factory()->create(['role' => 'sekre']);
    $classId = DB::table('classes')->insertGetId(['name' => Str::random(10)]);
    $siswa = Siswa::create(['name' => 'Siswa Uji', 'class_id' => $classId]);
    $dispen = Dispen::create([
        'siswa_id' => $siswa->id,
        'class_id' => $classId,
        'kategori' => 'sakit',
        'alasan' => 'Keterangan uji',
        'tgl' => now()->toDateString(),
        'status' => 'pending',
        'approval_user_id' => $approvalUser->id,
    ]);
    $token = Str::random(64);
    $approvalToken = DispenApprovalToken::create([
        'dispen_id' => $dispen->id,
        'token_hash' => hash('sha256', $token),
        'expires_at' => now()->addHour(),
        'last_sent_at' => now()->subMinute(),
    ]);

    return [$approvalUser, $dispen, $token, $approvalToken];
}

it('magic link GET shows confirmation without consuming the token or logging in', function () {
    [$approvalUser, $dispen, $token, $approvalToken] = makeDispenApproval();

    $this->get(route('dispen.approval', ['dispen' => $dispen, 'token' => $token]))
        ->assertOk()
        ->assertSee('Lanjut sebagai ' . $approvalUser->name);

    expect(auth()->check())->toBeFalse()
        ->and($approvalToken->fresh()->used_at)->toBeNull();
});

it('login consumes a valid token and authenticates the assigned secretary', function () {
    [$approvalUser, $dispen, $token, $approvalToken] = makeDispenApproval();

    $this->post(route('dispen.approval.login', $dispen), ['token' => $token])
        ->assertRedirect(route('dispen.approval.page', $dispen));

    $this->assertAuthenticatedAs($approvalUser);
    expect($approvalToken->fresh()->used_at)->not->toBeNull();
});

it('only the assigned secretary can approve and a processed request cannot change again', function () {
    [$approvalUser, $dispen] = makeDispenApproval();
    $otherSecretary = User::factory()->create(['role' => 'sekre']);

    $this->actingAs($otherSecretary)
        ->post(route('dispen.status', $dispen), ['status' => 'approved'])
        ->assertForbidden();

    $this->actingAs($approvalUser)
        ->post(route('dispen.status', $dispen), ['status' => 'approved'])
        ->assertOk()
        ->assertJsonPath('approved_by', $approvalUser->id);

    $this->post(route('dispen.status', $dispen), ['status' => 'rejected'])
        ->assertStatus(409);

    expect($dispen->fresh()->status)->toBe('approved');
});

it('resend enforces cooldown and updates the existing token row after 45 seconds', function () {
    [, $dispen, $token, $approvalToken] = makeDispenApproval();
    $approvalToken->update(['last_sent_at' => now()]);

    $this->post(route('dispen.approval.resend', ['dispen' => $dispen, 'token' => $token]))
        ->assertStatus(429);

    $this->travel(45)->seconds();

    $this->post(route('dispen.approval.resend', ['dispen' => $dispen, 'token' => $token]))
        ->assertRedirect();

    $approvalToken->refresh();
    expect(DispenApprovalToken::where('dispen_id', $dispen->id)->count())->toBe(1)
        ->and($approvalToken->token_hash)->not->toBe(hash('sha256', $token))
        ->and($approvalToken->used_at)->toBeNull()
        ->and($approvalToken->expires_at->greaterThan(now()->addMinutes(59)))->toBeTrue();
});
