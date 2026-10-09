<?php

use App\Models\Jadwal;
use App\Models\Jurnal;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\User;

function siapkanDashboard(): array
{
    $sekre = User::factory()->create(['role' => 'sekre']);
    $guru = User::factory()->guru()->create(['name' => 'Budi Pengajar']);

    $kelas = Kelas::create(['name' => 'XI DKV 2']);
    $mapel = Mapel::create(['name' => 'Matematika']);

    $jadwal = Jadwal::create([
        'teacher_id' => $guru->id,
        'class_id' => $kelas->id,
        'mapel_id' => $mapel->id,
        'day' => 'selasa',
        'start_time' => 3,
        'end_time' => 3,
    ]);

    return [$sekre, $guru, $kelas, $mapel, $jadwal];
}

function buatJurnal(User $guru, $kelas, $mapel, $jadwal, array $data = []): Jurnal
{
    return Jurnal::create(array_merge([
        'id_jadwal' => $jadwal->id,
        'teacher_id' => $guru->id,
        'class_id' => $kelas->id,
        'mapel_id' => $mapel->id,
        'start_time' => 3,
        'end_time' => 3,
        'guru' => 'hadir',
        'tgl' => now()->toDateString(),
        'materi' => 'Fungsi Linear',
        'status' => 'pending',
    ], $data));
}

it('menampilkan jurnal yang diisi guru pada antrean validasi dashboard', function () {
    [$sekre, $guru, $kelas, $mapel, $jadwal] = siapkanDashboard();

    $jurnal = buatJurnal($guru, $kelas, $mapel, $jadwal);

    $this->actingAs($sekre)
        ->get(route('sekre.dashboard'))
        ->assertOk()
        ->assertSee('Matematika')
        ->assertSee('XI DKV 2')
        ->assertSee(route('sekre.jurnal.show', $jurnal), false);
});

it('menampilkan jurnal paling terakhir diisi guru pada kartu utama', function () {
    [$sekre, $guruLama, $kelas, $mapel, $jadwal] = siapkanDashboard();
    $guruBaru = User::factory()->guru()->create(['name' => 'Citra Pengajar']);

    buatJurnal($guruLama, $kelas, $mapel, $jadwal);

    $this->travel(1)->minutes();

    buatJurnal($guruBaru, $kelas, $mapel, $jadwal);

    $this->actingAs($sekre)
        ->get(route('sekre.dashboard'))
        ->assertOk()
        ->assertSee('Jurnal Terakhir')
        ->assertSee('Citra Pengajar')
        ->assertDontSee('Budi Pengajar');
});

it('menampilkan pesan kosong bila belum ada jurnal dari guru', function () {
    [$sekre] = siapkanDashboard();

    $this->actingAs($sekre)
        ->get(route('sekre.dashboard'))
        ->assertOk()
        ->assertSee('Belum ada jurnal dari guru');
});
