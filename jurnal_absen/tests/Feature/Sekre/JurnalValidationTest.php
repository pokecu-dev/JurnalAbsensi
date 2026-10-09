<?php

use App\Models\DetailJurnal;
use App\Models\Jadwal;
use App\Models\Jurnal;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\User;

function makeSekreJurnal(array $attributes = []): array
{
    $sekre = User::factory()->create(['role' => 'sekre']);
    $guru = User::factory()->guru()->create();

    $kelas = Kelas::create(['name' => 'X RPL 1']);
    $mapel = Mapel::create(['name' => 'Matematika']);
    $jadwal = Jadwal::create([
        'teacher_id' => $guru->id,
        'class_id' => $kelas->id,
        'mapel_id' => $mapel->id,
        'day' => 'senin',
        'start_time' => 1,
        'end_time' => 2,
    ]);

    $jurnal = Jurnal::create(array_merge([
        'id_jadwal' => $jadwal->id,
        'teacher_id' => $guru->id,
        'class_id' => $kelas->id,
        'mapel_id' => $mapel->id,
        'start_time' => 1,
        'end_time' => 2,
        'guru' => 'hadir',
        'tgl' => now()->toDateString(),
        'materi' => 'Fungsi Linear',
        'catatan' => 'Penjelasan, Latihan Soal',
        'status' => 'pending',
    ], $attributes));

    return [$sekre, $guru, $jadwal, $jurnal];
}

it('tamu diarahkan ke halaman login saat mengakses jurnal sekre', function () {
    $this->get('/sekre/jurnal')->assertRedirect('/login');
});

it('role selain sekre tidak dapat mengakses validasi jurnal', function () {
    $guru = User::factory()->guru()->create();

    $this->actingAs($guru)
        ->get(route('sekre.status-validasi'))
        ->assertForbidden();
});

it('sekre dapat melihat daftar jurnal yang menunggu validasi', function () {
    [$sekre] = makeSekreJurnal();

    $this->actingAs($sekre)
        ->get(route('sekre.status-validasi'))
        ->assertOk()
        ->assertSee('Matematika')
        ->assertSee('Menunggu')
        ->assertSee('X RPL 1');
});

it('sekre dapat membuka detail jurnal beserta absensi siswa', function () {
    [$sekre,, $jadwal, $jurnal] = makeSekreJurnal();

    $siswa = Siswa::create([
        'name' => 'Roy Kiyoshi',
        'class_id' => $jadwal->class_id,
    ]);

    DetailJurnal::create([
        'jurnal_id' => $jurnal->id,
        'siswa_id' => $siswa->id,
        'status' => 'sakit',
    ]);

    $this->actingAs($sekre)
        ->get(route('sekre.jurnal.show', $jurnal))
        ->assertOk()
        ->assertSee('Roy Kiyoshi')
        ->assertSee('Sakit')
        ->assertSee('Fungsi Linear');
});

it('sekre dapat melihat daftar jurnal pada halaman jurnal', function () {
    [$sekre] = makeSekreJurnal();

    $this->actingAs($sekre)
        ->get(route('sekre.jurnal.index'))
        ->assertOk()
        ->assertSee('Matematika')
        ->assertSee('X RPL 1');
});

it('sekre dapat mengirim jurnal pending beserta catatan', function () {
    [$sekre,,, $jurnal] = makeSekreJurnal();

    $this->actingAs($sekre)
        ->post(route('sekre.jurnal.kirim', $jurnal), [
            'catatan_sekre' => 'Kehadiran siswa perlu dicek ulang.',
        ])
        ->assertRedirect(route('sekre.jurnal.index'));

    $jurnal = $jurnal->fresh();

    expect($jurnal->status)->toBe('approved');
    expect($jurnal->catatan_sekre)->toBe('Kehadiran siswa perlu dicek ulang.');
});

it('detail menampilkan catatan sekre pada jurnal yang sudah dikirim', function () {
    [$sekre,,, $jurnal] = makeSekreJurnal([
        'status' => 'approved',
        'catatan_sekre' => 'Catatan dari sekre.',
    ]);

    $this->actingAs($sekre)
        ->get(route('sekre.jurnal.show', $jurnal))
        ->assertOk()
        ->assertSee('Catatan dari sekre.');
});

it('jurnal yang sudah dikirim tidak dapat dikirim ulang', function () {
    [$sekre,,, $jurnal] = makeSekreJurnal(['status' => 'approved']);

    $this->actingAs($sekre)
        ->post(route('sekre.jurnal.kirim', $jurnal))
        ->assertStatus(400);

    expect($jurnal->fresh()->status)->toBe('approved');
});
