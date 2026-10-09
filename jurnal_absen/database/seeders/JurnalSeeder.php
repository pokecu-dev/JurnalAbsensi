<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurnalSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $class = DB::table('classes')->where('name', 'XI RPL 2')->first();

        if (! $class) {
            return;
        }

        $jadwals = DB::table('jadwals')
            ->where('class_id', $class->id)
            ->orderBy('day')
            ->get()
            ->values();

        if ($jadwals->isEmpty()) {
            return;
        }

        $mapelIds = DB::table('mapels')->pluck('id', 'name');

        $mapels = [
            ['name' => 'Informatika', 'materi' => 'Algoritma dan Pseudocode'],
            ['name' => 'Matematika', 'materi' => 'Fungsi Kuadrat dan Grafiknya'],
            ['name' => 'Bahasa Indonesia', 'materi' => 'Teks Eksposisi'],
            ['name' => 'Bahasa Inggris', 'materi' => 'Descriptive Text'],
            ['name' => 'Pancasila', 'materi' => 'Norma dan Keadilan'],
        ];

        // 1 dari 3 jurnal sudah diteruskan sekre ke Kurikulum (approved),
        // sisanya masih menunggu pemeriksaan sekre (pending).
        $statuses = ['pending', 'pending', 'approved', 'pending', 'approved'];

        $siswaId = DB::table('siswas')->value('id');

        foreach ($jadwals as $index => $jadwal) {
            $mapel = $mapels[$index % count($mapels)];
            $status = $statuses[$index % count($statuses)];

            $jurnalId = DB::table('jurnals')->insertGetId([
                'id_jadwal' => $jadwal->id,
                'teacher_id' => $jadwal->teacher_id,
                'class_id' => $class->id,
                'mapel_id' => $mapelIds[$mapel['name']],
                'start_time' => $jadwal->start_time,
                'end_time' => $jadwal->end_time,
                'tgl' => now()->toDateString(),
                'materi' => $mapel['materi'],
                'catatan' => 'Kondusif',
                'catatan_sekre' => $status === 'approved' ? 'Materi sudah sesuai RPP.' : null,
                'guru' => 'hadir',
                'status' => $status,
                'foto' => '-',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            if ($siswaId) {
                DB::table('detail_jurnals')->insert([
                    'jurnal_id' => $jurnalId,
                    'siswa_id' => $siswaId,
                    'status' => 'izin',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
