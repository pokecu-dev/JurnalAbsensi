<?php

namespace Database\Seeders;

use App\Models\Absensi;
use App\Models\Jurnal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurnalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $jadwal = DB::table('jadwals')->where('id',1)->first();

        DB::table('jurnals')->insert([
            ['id_jadwal' => 1,'teacher_id' => $jadwal->teacher_id,'class_id' => $jadwal->class_id,'mapel_id' => $jadwal->mapel_id,'start_time' => $jadwal->start_time,'end_time' => $jadwal->end_time, 'tgl' => now(), 'materi' => 'smth', 'catatan' => 'kondusif', 'guru' => 'hadir', 'status' => 'pending', 'foto' => '-'],
        ]);

        DB::table('detail_jurnals')->insert([
            ['jurnal_id' => 1,'siswa_id' => 1,'status'=>'izin','catatan'=>'acara']
        ]);
    
        // $jadwals = DB::table('jadwals')->get();

        // if ($jadwals->isEmpty()) {
        //     return;
        // }

        // $statuses = ['pending', 'approved', 'rejected'];
        // $kehadiran = ['hadir', 'tidak_hadir_tugas', 'tidak_hadir_tanpa_tugas'];
        // $materis = ['Fungsi Linear', 'Persamaan Kuadrat', 'Logaritma', 'Trigonometri', 'Eksponen'];
        // $siswas = [
        //     'Roy Kiyoshi', 'Ahmad Fauzi', 'Budi Setiawan', 'Citra Kirana',
        //     'Dewi Lestari', 'Fajar Nugraha', 'Rafi Arkhan', 'Siti Aminah',
        // ];

        // foreach (array_slice($jadwals->all(), 0, 15) as $jadwal) {
        //     $keterangan = $kehadiran[array_rand($kehadiran)];
        //     $status = $statuses[array_rand($statuses)];

        //     $jurnal = Jurnal::create([
        //         'id_jadwal' => $jadwal->id,
        //         'keterangan' => $keterangan,
        //         'tgl' => now()->subDays(rand(0, 5))->toDateString(),
        //         'materi' => $keterangan === 'hadir' ? $materis[array_rand($materis)] : null,
        //         'catatan' => rand(0, 1) ? 'Penjelasan, Latihan Soal' : null,
        //         'tugas' => $keterangan === 'tidak_hadir_tugas'
        //             ? 'Kerjakan latihan soal halaman 45 sampai 50, dikumpulkan minggu depan.'
        //             : null,
        //         'alasan' => $keterangan === 'tidak_hadir_tanpa_tugas'
        //             ? 'Sedang mendampingi lomba.'
        //             : null,
        //         'status' => $status,
        //     ]);

        //     if ($keterangan === 'hadir') {
        //         shuffle($siswas);
        //         foreach (array_slice($siswas, 0, rand(1, 3)) as $nama) {
        //             Absensi::create([
        //                 'id_jurnal' => $jurnal->id,
        //                 'nama_siswa' => $nama,
        //                 'keterangan' => Absensi::KETERANGAN[array_rand(Absensi::KETERANGAN)],
        //             ]);
        //         }
        //     }
        // }
    }
}
