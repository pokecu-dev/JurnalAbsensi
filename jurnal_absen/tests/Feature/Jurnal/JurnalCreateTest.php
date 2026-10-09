<?php

use App\Models\Jadwal;
use App\Models\Jurnal;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\User;

function siapkanSesiGuru(): array
{
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

    $siswa = Siswa::create(['name' => 'Roy Kiyoshi', 'class_id' => $kelas->id]);

    return [$guru, $kelas, $mapel, $jadwal, $siswa];
}

it('guru dapat mengisi jurnal sesi mengajar', function () {
    [$guru,,, $jadwal, $siswa] = siapkanSesiGuru();

    $this->actingAs($guru)
        ->postJson(route('guru.jurnal.create'), [
            'jadwal_id' => $jadwal->id,
            'status_kehadiran' => 'hadir',
            'materi' => 'Fungsi Linear',
            'absensi' => [$siswa->id => 'hadir'],
        ])
        ->assertOk()
        ->assertJson(['status' => 'success']);

    expect(Jurnal::count())->toBe(1);
});

it('guru tidak dapat mengisi jurnal dua kali untuk sesi yang sama', function () {
    [$guru,,, $jadwal, $siswa] = siapkanSesiGuru();

    Jurnal::create([
        'id_jadwal' => $jadwal->id,
        'teacher_id' => $guru->id,
        'class_id' => $jadwal->class_id,
        'mapel_id' => $jadwal->mapel_id,
        'start_time' => $jadwal->start_time,
        'end_time' => $jadwal->end_time,
        'tgl' => now()->toDateString(),
        'guru' => 'hadir',
        'status' => 'pending',
    ]);

    $this->actingAs($guru)
        ->postJson(route('guru.jurnal.create'), [
            'jadwal_id' => $jadwal->id,
            'status_kehadiran' => 'hadir',
            'materi' => 'Fungsi Linear',
            'absensi' => [$siswa->id => 'hadir'],
        ])
        ->assertStatus(422);

    expect(Jurnal::count())->toBe(1);
});
