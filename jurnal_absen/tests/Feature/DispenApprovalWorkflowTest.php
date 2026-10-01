<?php

use App\Models\DetailDispen;
use App\Models\Dispen;
use App\Models\DispenApprovalToken;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

/** @return array{0: User, 1: Dispen, 2: string, 3: DispenApprovalToken} */
function makeDispenApproval(array $tokenAttributes = []): array
{
    $approvalUser = User::factory()->create([
        'name' => 'Sekre Uji',
        'role' => 'sekre',
        'phone' => sprintf('+62 812-3456-%04d', User::query()->count() + 1),
    ]);
    $classId = DB::table('classes')->insertGetId(['name' => Str::random(10)]);
    $siswa = Siswa::create(['name' => 'Siswa Uji', 'class_id' => $classId]);
    $dispen = Dispen::create([
        'kategori' => 'sakit',
        'alasan' => 'Keterangan uji',
        'tgl' => now()->toDateString(),
        'status' => 'pending',
        'approval_user_id' => $approvalUser->id,
    ]);
    $dispen->details()->create(['siswa_id' => $siswa->id]);
    $token = Str::random(64);
    $approvalToken = DispenApprovalToken::create(array_merge([
        'dispen_id' => $dispen->id,
        'token_hash' => hash('sha256', $token),
        'expires_at' => now()->addHour(),
        'last_sent_at' => now()->subMinute(),
    ], $tokenAttributes));

    return [$approvalUser, $dispen, $token, $approvalToken];
}

/** @return array{0: Siswa, 1: int} */
function makeDispenRequestData(): array
{
    $classId = DB::table('classes')->insertGetId(['name' => Str::random(10)]);
    $siswa = Siswa::create(['name' => 'Murid Pengajuan', 'class_id' => $classId]);

    return [$siswa, $classId];
}

function dispenPayload(User $approvalUser, array $siswas): array
{
    return [
        'siswa_ids' => array_map(fn (Siswa $siswa): int => $siswa->id, $siswas),
        'approval_user_id' => $approvalUser->id,
        'kategori' => 'sakit',
        'alasan' => 'Perlu izin berobat',
        'tgl' => now()->toDateString(),
        'jam_mulai' => '08:00',
        'jam_selesai' => '09:00',
    ];
}

it('requires piket authentication to create a Dispen', function () {
    $this->get(route('dispen.create'))->assertRedirect(route('login'));
    $this->post(route('dispen.store'))->assertRedirect(route('login'));
});

it('denies create access to roles other than piket', function () {
    $guru = User::factory()->create(['role' => 'guru']);

    $this->actingAs($guru)
        ->get(route('dispen.create'))
        ->assertForbidden();

    $this->actingAs($guru)
        ->post(route('dispen.store'))
        ->assertForbidden();
});

it('shows the create form with students, classes, and Sekre recipients', function () {
    $piket = User::factory()->create(['role' => 'piket']);
    $sekre = User::factory()->create(['role' => 'sekre']);
    [$siswa] = makeDispenRequestData();

    $this->actingAs($piket)
        ->get(route('dispen.create'))
        ->assertOk()
        ->assertSee($siswa->name)
        ->assertSee($sekre->name);
});

it('creates a pending Dispen and one hashed one-hour token for the selected Sekre', function () {
    $piket = User::factory()->create(['role' => 'piket']);
    $sekre = User::factory()->create([
        'role' => 'sekre',
        'phone' => '+62 812-3456-7890',
    ]);
    [$siswa] = makeDispenRequestData();
    $secondClassId = DB::table('classes')->insertGetId(['name' => 'XII TKJ']);
    $secondSiswa = Siswa::create(['name' => 'Murid Kedua', 'class_id' => $secondClassId]);
    $sentAt = now()->startOfSecond();
    $this->travelTo($sentAt);

    $response = $this->actingAs($piket)
        ->post(route('dispen.store'), dispenPayload($sekre, [$siswa, $secondSiswa]));

    $response->assertRedirect();
    expect($response->headers->get('Location'))
        ->toStartWith('https://wa.me/6281234567890?text=');

    $dispen = Dispen::query()->firstOrFail();
    $approvalToken = $dispen->approvalToken;
    expect($dispen->status)->toBe('pending')
        ->and($dispen->approval_user_id)->toBe($sekre->id)
        ->and($approvalToken)->not->toBeNull()
        ->and(strlen($approvalToken->token_hash))->toBe(64)
        ->and($approvalToken->token_hash)->not->toBe($response->headers->get('Location'))
        ->and($approvalToken->expires_at->timestamp)->toBe($sentAt->copy()->addHour()->timestamp)
        ->and($approvalToken->last_sent_at->timestamp)->toBe($sentAt->timestamp)
        ->and(DispenApprovalToken::where('dispen_id', $dispen->id)->count())->toBe(1)
        ->and($dispen->details()->count())->toBe(2)
        ->and(Schema::hasColumn('dispens', 'siswa_id'))->toBeFalse()
        ->and(Schema::hasColumn('dispens', 'class_id'))->toBeFalse();

    expect(urldecode(parse_url($response->headers->get('Location'), PHP_URL_QUERY)))
        ->toContain($siswa->name)
        ->toContain($secondSiswa->name)
        ->toContain('XII TKJ')
        ->toContain('Perlu izin berobat')
        ->toContain('Link berlaku selama 1 jam.');
});

it('rejects duplicate student selections without creating a Dispen', function () {
    $piket = User::factory()->create(['role' => 'piket']);
    $sekre = User::factory()->create(['role' => 'sekre', 'phone' => '+62 812-3456-7890']);
    [$siswa] = makeDispenRequestData();
    $payload = dispenPayload($sekre, [$siswa]);
    $payload['siswa_ids'][] = $siswa->id;

    $this->actingAs($piket)
        ->from(route('dispen.create'))
        ->post(route('dispen.store'), $payload)
        ->assertRedirect(route('dispen.create'))
        ->assertSessionHasErrors('siswa_ids.1');

    expect(Dispen::query()->count())->toBe(0)
        ->and(DetailDispen::query()->count())->toBe(0)
        ->and(DispenApprovalToken::query()->count())->toBe(0);
});

it('rejects a selected Sekre without a usable WhatsApp phone', function () {
    $piket = User::factory()->create(['role' => 'piket']);
    $sekre = User::factory()->create(['role' => 'sekre', 'phone' => '081234567890']);
    [$siswa] = makeDispenRequestData();

    $this->actingAs($piket)
        ->post(route('dispen.store'), dispenPayload($sekre, [$siswa]))
        ->assertStatus(422);

    expect(Dispen::count())->toBe(0)
        ->and(DispenApprovalToken::count())->toBe(0);
});

it('shows each selected student and class on the edit form', function () {
    $piket = User::factory()->create(['role' => 'piket']);
    [, $dispen] = makeDispenApproval();
    $secondClassId = DB::table('classes')->insertGetId(['name' => 'XI RPL']);
    $secondSiswa = Siswa::create(['name' => 'Edit Murid', 'class_id' => $secondClassId]);
    $dispen->details()->create(['siswa_id' => $secondSiswa->id]);

    $this->actingAs($piket)
        ->get(route('dispen.edit', $dispen))
        ->assertOk()
        ->assertSee('Siswa Uji')
        ->assertSee('Edit Murid')
        ->assertSee('XI RPL');
});

it('updates the Dispen students while keeping the approval assignment and status unchanged', function () {
    $piket = User::factory()->create(['role' => 'piket']);
    [$approvalUser, $dispen] = makeDispenApproval();
    [$newSiswa] = makeDispenRequestData();

    $this->actingAs($piket)
        ->put(route('dispen.update', $dispen), [
            'siswa_ids' => [$newSiswa->id],
            'kategori' => 'lomba',
            'alasan' => 'Mengikuti lomba',
            'tgl' => now()->toDateString(),
            'jam_mulai' => '08:00',
            'jam_selesai' => '10:00',
            'status' => 'approved',
            'approval_user_id' => User::factory()->create(['role' => 'sekre'])->id,
        ])
        ->assertRedirect(route('dispen.show', $dispen));

    $dispen->refresh();
    expect($dispen->details()->pluck('siswa_id')->all())->toBe([$newSiswa->id])
        ->and($dispen->status)->toBe('pending')
        ->and($dispen->approval_user_id)->toBe($approvalUser->id)
        ->and($dispen->kategori)->toBe('lomba');
});

it('filters Dispens by student class, status, category, and date without duplicating parents', function () {
    $piket = User::factory()->create(['role' => 'piket']);
    [, $matchingDispen] = makeDispenApproval();
    $matchingDispen->update([
        'kategori' => 'lomba',
        'tgl' => '2026-09-30',
        'status' => 'pending',
        'alasan' => 'Lomba robotik',
    ]);
    $matchingDetails = $matchingDispen->details;
    $matchingClassId = $matchingDetails->first()->siswa->class_id;
    $secondClassId = DB::table('classes')->insertGetId(['name' => 'XII RPL']);
    $secondSiswa = Siswa::create(['name' => 'Murid Kelas Lain', 'class_id' => $secondClassId]);
    $matchingDispen->details()->create(['siswa_id' => $secondSiswa->id]);

    [, $otherDispen] = makeDispenApproval();
    $otherDispen->update(['kategori' => 'sakit', 'tgl' => '2026-09-29', 'status' => 'rejected']);

    $this->actingAs($piket)
        ->get(route('dispen.index', [
            'class_id' => $matchingClassId,
            'status' => 'pending',
            'kategori' => 'lomba',
            'date_from' => '2026-09-30',
            'date_to' => '2026-09-30',
        ]))
        ->assertOk()
        ->assertSee('Lomba robotik')
        ->assertDontSee('Keterangan uji')
        ->assertSee('Murid Kelas Lain');
});

it('searches Dispens by student name, reason, category, and assigned Sekre', function (string $query) {
    $piket = User::factory()->create(['role' => 'piket']);
    [, $dispen] = makeDispenApproval();
    $dispen->update(['alasan' => 'Kunjungan klinik', 'kategori' => 'pribadi']);

    $this->actingAs($piket)
        ->get(route('dispen.index', ['q' => $query]))
        ->assertOk()
        ->assertSee('Kunjungan klinik');
})->with([
    'student name' => 'Siswa Uji',
    'reason' => 'Kunjungan klinik',
    'category' => 'pribadi',
    'assigned Sekre' => 'Sekre Uji',
]);

it('keeps active search filters in database pagination links', function () {
    $piket = User::factory()->create(['role' => 'piket']);
    for ($index = 0; $index < 16; $index++) {
        makeDispenApproval();
    }

    $this->actingAs($piket)
        ->get(route('dispen.index', ['q' => 'Keterangan uji']))
        ->assertOk()
        ->assertSee('q=Keterangan%20uji')
        ->assertSee('page=2');
});

it('deletes a Dispen and cascades its details and approval token', function () {
    $piket = User::factory()->create(['role' => 'piket']);
    [, $dispen, , $approvalToken] = makeDispenApproval();
    $detailId = $dispen->details()->value('id');

    $this->actingAs($piket)
        ->delete(route('dispen.destroy', $dispen))
        ->assertRedirect(route('dispen.index'));

    $this->assertDatabaseMissing('dispens', ['id' => $dispen->id]);
    $this->assertDatabaseMissing('detail_dispens', ['id' => $detailId]);
    $this->assertDatabaseMissing('dispen_approval_tokens', ['id' => $approvalToken->id]);
});

it('returns 409 and preserves processed Dispen data when deletion is attempted', function (string $status) {
    $piket = User::factory()->create(['role' => 'piket']);
    [$approvalUser, $dispen, , $approvalToken] = makeDispenApproval();
    $dispen->update(['status' => $status, 'approved_by' => $approvalUser->id]);
    $detailId = $dispen->details()->value('id');

    $this->actingAs($piket)
        ->delete(route('dispen.destroy', $dispen))
        ->assertStatus(409);

    $this->assertDatabaseHas('dispens', ['id' => $dispen->id, 'status' => $status]);
    $this->assertDatabaseHas('detail_dispens', ['id' => $detailId]);
    $this->assertDatabaseHas('dispen_approval_tokens', ['id' => $approvalToken->id]);
})->with(['approved', 'rejected']);

it('shows confirmation for a valid magic link without consuming it or logging in', function () {
    [$approvalUser, $dispen, $token, $approvalToken] = makeDispenApproval();
    $secondClassId = DB::table('classes')->insertGetId(['name' => 'XI TKJ']);
    $secondSiswa = Siswa::create(['name' => 'Siswa Approval Kedua', 'class_id' => $secondClassId]);
    $dispen->details()->create(['siswa_id' => $secondSiswa->id]);

    $this->get(route('dispen.approval', ['dispen' => $dispen, 'token' => $token]))
        ->assertOk()
        ->assertSee('Lanjut sebagai '.$approvalUser->name)
        ->assertSee('Siswa Approval Kedua')
        ->assertSee('XI TKJ');

    expect(auth()->check())->toBeFalse()
        ->and($approvalToken->fresh()->used_at)->toBeNull();
});

it('does not offer resend when the link token was replaced', function () {
    [, $dispen, $oldToken] = makeDispenApproval();

    $this->post(route('dispen.approval.resend', ['dispen' => $dispen, 'token' => $oldToken]))
        ->assertRedirect();

    $this->get(route('dispen.approval', ['dispen' => $dispen, 'token' => Str::random(64)]))
        ->assertOk()
        ->assertSee('Link ini sudah diganti')
        ->assertDontSee('Kirim Ulang Link');

    $this->post(route('dispen.approval.resend', ['dispen' => $dispen, 'token' => $oldToken]))
        ->assertForbidden();
});

it('shows resend for the current token after it expires', function () {
    [, $dispen, $token, $approvalToken] = makeDispenApproval([
        'expires_at' => now()->subSecond(),
    ]);

    $this->get(route('dispen.approval', ['dispen' => $dispen, 'token' => $token]))
        ->assertOk()
        ->assertSee('Kirim Ulang Link');

    expect($approvalToken->fresh()->used_at)->toBeNull();
});

it('shows resend for the current token after it has been used', function () {
    [, $dispen, $token] = makeDispenApproval(['used_at' => now()->subMinute()]);

    $this->get(route('dispen.approval', ['dispen' => $dispen, 'token' => $token]))
        ->assertOk()
        ->assertSee('Kirim Ulang Link');
});

it('consumes a valid token and logs in as the assigned secretary', function () {
    [$approvalUser, $dispen, $token, $approvalToken] = makeDispenApproval();

    $this->post(route('dispen.approval.login', $dispen), ['token' => $token])
        ->assertRedirect(route('dispen.approval.page', $dispen));

    $this->assertAuthenticatedAs($approvalUser);
    expect($approvalToken->fresh()->used_at)->not->toBeNull();
});

it('rejects login with an invalid, expired, or used token', function (array $tokenAttributes, string $expectedStatus) {
    [, $dispen, $token] = makeDispenApproval($tokenAttributes);

    $this->post(route('dispen.approval.login', $dispen), ['token' => $token])
        ->assertStatus((int) $expectedStatus);
})->with([
    'invalid hash' => [['token_hash' => hash('sha256', 'different-token')], '403'],
    'expired' => [['expires_at' => now()->subSecond()], '410'],
    'used' => [['used_at' => now()], '410'],
]);

it('restricts the approval page to the assigned Sekre', function () {
    [$approvalUser, $dispen] = makeDispenApproval();
    $otherSekre = User::factory()->create(['role' => 'sekre']);
    $guru = User::factory()->create(['role' => 'guru']);

    $this->get(route('dispen.approval.page', $dispen))->assertRedirect(route('login'));
    $this->actingAs($approvalUser)
        ->get(route('dispen.approval.page', $dispen))
        ->assertOk()
        ->assertSee('Siswa Uji');
    $this->actingAs($otherSekre)->get(route('dispen.approval.page', $dispen))->assertForbidden();
    $this->actingAs($guru)->get(route('dispen.approval.page', $dispen))->assertForbidden();
});

it('allows the assigned secretary to approve and invalidates the token', function () {
    [$approvalUser, $dispen, , $approvalToken] = makeDispenApproval();

    $this->actingAs($approvalUser)
        ->post(route('dispen.status', $dispen), ['status' => 'approved'])
        ->assertOk()
        ->assertJsonPath('status', 'success')
        ->assertJsonPath('decision_status', 'approved')
        ->assertJsonPath('approved_by', $approvalUser->id);

    $dispen->refresh();
    expect($dispen->status)->toBe('approved')
        ->and($dispen->approved_by)->toBe($approvalUser->id)
        ->and($approvalToken->fresh()->used_at)->not->toBeNull();
});

it('allows the assigned secretary to reject and invalidates the token', function () {
    [$approvalUser, $dispen, , $approvalToken] = makeDispenApproval();

    $this->actingAs($approvalUser)
        ->post(route('dispen.status', $dispen), ['status' => 'rejected'])
        ->assertOk()
        ->assertJsonPath('status', 'success')
        ->assertJsonPath('decision_status', 'rejected')
        ->assertJsonPath('approved_by', $approvalUser->id);

    $dispen->refresh();
    expect($dispen->status)->toBe('rejected')
        ->and($dispen->approved_by)->toBe($approvalUser->id)
        ->and($approvalToken->fresh()->used_at)->not->toBeNull();
});

it('returns 403 when a different Sekre attempts to approve or reject', function (string $requestedStatus) {
    [, $dispen, , $approvalToken] = makeDispenApproval();
    $otherSekre = User::factory()->create(['role' => 'sekre']);

    $this->actingAs($otherSekre)
        ->post(route('dispen.status', $dispen), ['status' => $requestedStatus])
        ->assertForbidden();

    expect($dispen->fresh()->status)->toBe('pending')
        ->and($dispen->fresh()->approved_by)->toBeNull()
        ->and($approvalToken->fresh()->used_at)->toBeNull();
})->with(['approve' => 'approved', 'reject' => 'rejected']);

it('returns 409 for invalid status transitions from approved or rejected states', function (string $currentStatus, string $requestedStatus) {
    [$approvalUser, $dispen, , $approvalToken] = makeDispenApproval();
    $dispen->update(['status' => $currentStatus, 'approved_by' => $approvalUser->id]);

    $this->actingAs($approvalUser)
        ->post(route('dispen.status', $dispen), ['status' => $requestedStatus])
        ->assertStatus(409);

    expect($dispen->fresh()->status)->toBe($currentStatus)
        ->and($dispen->fresh()->approved_by)->toBe($approvalUser->id)
        ->and($approvalToken->fresh()->used_at)->toBeNull();
})->with([
    'approved to rejected' => ['approved', 'rejected'],
    'approved to approved' => ['approved', 'approved'],
    'rejected to approved' => ['rejected', 'approved'],
    'rejected to rejected' => ['rejected', 'rejected'],
]);

it('returns 422 when a pending Dispen receives a status outside approved or rejected', function (string $status) {
    [$approvalUser, $dispen, , $approvalToken] = makeDispenApproval();

    $this->actingAs($approvalUser)
        ->postJson(route('dispen.status', $dispen), ['status' => $status])
        ->assertUnprocessable();

    expect($dispen->fresh()->status)->toBe('pending')
        ->and($approvalToken->fresh()->used_at)->toBeNull();
})->with(['pending', 'cancelled']);

it('returns 409 for duplicate approval requests after the first decision commits', function () {
    [$approvalUser, $dispen, , $approvalToken] = makeDispenApproval();

    $this->actingAs($approvalUser)
        ->post(route('dispen.status', $dispen), ['status' => 'approved'])
        ->assertOk();
    $approvedAt = $approvalToken->fresh()->used_at;

    $this->post(route('dispen.status', $dispen), ['status' => 'approved'])
        ->assertStatus(409);

    expect($dispen->fresh()->status)->toBe('approved')
        ->and($dispen->fresh()->approved_by)->toBe($approvalUser->id)
        ->and($approvalToken->fresh()->used_at->equalTo($approvedAt))->toBeTrue();
});

it('returns 409 when processed Dispen records are opened or submitted for edit', function (string $status) {
    $piket = User::factory()->create(['role' => 'piket']);
    [$approvalUser, $dispen] = makeDispenApproval();
    $dispen->update(['status' => $status, 'approved_by' => $approvalUser->id]);
    $originalReason = $dispen->alasan;
    $originalApprovalUserId = $dispen->approval_user_id;
    $originalSiswaIds = $dispen->details()->pluck('siswa_id')->all();
    [$replacementSiswa] = makeDispenRequestData();

    $this->actingAs($piket)
        ->get(route('dispen.edit', $dispen))
        ->assertStatus(409);
    $this->put(route('dispen.update', $dispen), [
        'siswa_ids' => [$replacementSiswa->id],
        'kategori' => 'lomba',
        'alasan' => 'Tidak boleh berubah',
        'tgl' => now()->toDateString(),
    ])->assertStatus(409);

    expect($dispen->fresh()->status)->toBe($status)
        ->and($dispen->fresh()->alasan)->toBe($originalReason)
        ->and($dispen->fresh()->approval_user_id)->toBe($originalApprovalUserId)
        ->and($dispen->details()->pluck('siswa_id')->all())->toBe($originalSiswaIds);
})->with(['approved', 'rejected']);

it('rejects a second approval state transition', function () {
    [$approvalUser, $dispen] = makeDispenApproval();

    $this->actingAs($approvalUser)
        ->post(route('dispen.status', $dispen), ['status' => 'approved'])
        ->assertOk();

    $this->post(route('dispen.status', $dispen), ['status' => 'rejected'])
        ->assertStatus(409);

    expect($dispen->fresh()->status)->toBe('approved');
});

it('enforces resend cooldown without creating another token row', function () {
    [, $dispen, $token, $approvalToken] = makeDispenApproval([
        'last_sent_at' => now(),
    ]);

    $this->post(route('dispen.approval.resend', ['dispen' => $dispen, 'token' => $token]))
        ->assertStatus(429);

    expect($approvalToken->fresh()->token_hash)->toBe(hash('sha256', $token))
        ->and(DispenApprovalToken::where('dispen_id', $dispen->id)->count())->toBe(1);
});

it('resends by updating the same token row and extending its expiration', function () {
    [$approvalUser, $dispen, $token, $approvalToken] = makeDispenApproval();
    $secondClassId = DB::table('classes')->insertGetId(['name' => 'X RPL']);
    $secondSiswa = Siswa::create(['name' => 'Siswa Resend Kedua', 'class_id' => $secondClassId]);
    $dispen->details()->create(['siswa_id' => $secondSiswa->id]);

    $response = $this->post(route('dispen.approval.resend', ['dispen' => $dispen, 'token' => $token]));
    $normalizedPhone = preg_replace('/\D+/', '', $approvalUser->phone);
    expect(str_starts_with(
        (string) $response->headers->get('Location'),
        "https://wa.me/{$normalizedPhone}?text="
    ))->toBeTrue();

    $approvalToken->refresh();
    $location = $response->headers->get('Location');
    parse_str((string) parse_url($location, PHP_URL_QUERY), $query);
    preg_match('~/dispen/approval/\d+/([A-Za-z0-9]+)~', urldecode($query['text']), $matches);
    $resentToken = $matches[1];
    $message = urldecode($query['text']);

    expect($approvalToken->token_hash)->toBe(hash('sha256', $resentToken))
        ->and($approvalToken->token_hash)->not->toBe(hash('sha256', $token))
        ->and($approvalToken->used_at)->toBeNull()
        ->and($approvalToken->expires_at->greaterThan(now()->addMinutes(59)))->toBeTrue()
        ->and(DispenApprovalToken::where('dispen_id', $dispen->id)->count())->toBe(1)
        ->and($message)->toContain('Siswa Resend Kedua', 'X RPL');
});

it('does not allow resend after the Dispen is no longer pending', function () {
    [, $dispen, $token, $approvalToken] = makeDispenApproval();
    $dispen->update(['status' => 'approved']);

    $this->post(route('dispen.approval.resend', ['dispen' => $dispen, 'token' => $token]))
        ->assertStatus(409);

    expect(DispenApprovalToken::where('dispen_id', $dispen->id)->count())->toBe(1)
        ->and($approvalToken->fresh()->token_hash)->toBe(hash('sha256', $token));
});
