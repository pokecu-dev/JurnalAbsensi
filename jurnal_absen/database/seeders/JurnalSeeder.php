<?php

namespace Database\Seeders;

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
    }
}
