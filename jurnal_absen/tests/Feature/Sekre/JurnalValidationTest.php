<?php

use App\Models\Absensi;
use App\Models\Jadwal;
use App\Models\Jurnal;
use App\Models\Kelas;
use App\Models\Mapel;
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
        'keterangan' => 'hadir',
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
        ->get(route('sekre.jurnal.index'))
        ->assertForbidden();
});

it('sekre dapat melihat daftar jurnal yang menunggu validasi', function () {
    [$sekre] = makeSekreJurnal();

    $this->actingAs($sekre)
        ->get(route('sekre.jurnal.index'))
        ->assertOk()
        ->assertSee('Matematika')
        ->assertSee('Menunggu')
        ->assertSee('X RPL 1');
});

it('sekre dapat membuka detail jurnal beserta absensi siswa', function () {
    [$sekre,,, $jurnal] = makeSekreJurnal();

    Absensi::create([
        'id_jurnal' => $jurnal->id,
        'nama_siswa' => 'Roy Kiyoshi',
        'keterangan' => 'sakit',
    ]);

    $this->actingAs($sekre)
        ->get(route('sekre.jurnal.show', $jurnal))
        ->assertOk()
        ->assertSee('Roy Kiyoshi')
        ->assertSee('Sakit')
        ->assertSee('Fungsi Linear');
});

it('sekre dapat menyetujui jurnal pending', function () {
    [$sekre,,, $jurnal] = makeSekreJurnal();

    $this->actingAs($sekre)
        ->post(route('sekre.jurnal.approve', $jurnal))
        ->assertRedirect(route('sekre.jurnal.index'));

    expect($jurnal->fresh()->status)->toBe('approved');
});

it('sekre dapat menolak jurnal beserta alasan validasi', function () {
    [$sekre,,, $jurnal] = makeSekreJurnal();

    $this->actingAs($sekre)
        ->post(route('sekre.jurnal.reject', $jurnal), [
            'alasan_validasi' => 'Materi belum lengkap',
        ])
        ->assertRedirect(route('sekre.jurnal.show', $jurnal));

    $jurnal = $jurnal->fresh();

    expect($jurnal->status)->toBe('rejected');
    expect($jurnal->alasan_validasi)->toBe('Materi belum lengkap');
});

it('jurnal yang sudah disetujui tidak dapat ditolak', function () {
    [$sekre,,, $jurnal] = makeSekreJurnal(['status' => 'approved']);

    $this->actingAs($sekre)
        ->post(route('sekre.jurnal.reject', $jurnal))
        ->assertStatus(400);

    expect($jurnal->fresh()->status)->toBe('approved');
});

it('jurnal yang sudah ditolak tidak dapat disetujui', function () {
    [$sekre,,, $jurnal] = makeSekreJurnal(['status' => 'rejected']);

    $this->actingAs($sekre)
        ->post(route('sekre.jurnal.approve', $jurnal))
        ->assertStatus(400);

    expect($jurnal->fresh()->status)->toBe('rejected');
});