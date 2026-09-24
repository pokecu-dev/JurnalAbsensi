<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(5)->guru()->create();

        $teacherIds = DB::table('users')->where('role', 'guru')->pluck('id')->toArray();
<<<<<<< HEAD
        $classIds = DB::table('classes')->pluck('id')->toArray();
        $mapelIds = DB::table('mapels')->pluck('id')->toArray();
        if (empty($classIds) || empty($teacherIds) || empty($mapelIds)) {
            return;
        }
=======
        $classIds = DB::table('class')->pluck('id')->toArray();
        $mapelIds = DB::table('mapels')->pluck('id')->toArray();

        // if (empty($classIds) || empty($teacherIds)) {
        //     return;
        // }
>>>>>>> 3985aad47f5463aac1ced55dffe6af02f76af4aa

        $days = ['senin', 'selasa', 'rabu', 'kamis', 'jumat'];
        $jadwals = [];

        foreach ($days as $day) {
            foreach ($classIds as $classId) {
                $startTime = rand(1, 10);

                $duration = rand(1, 3);
                $endTime = min($startTime + $duration - 1, 12);

                $jadwals[] = [
                    'teacher_id' => $teacherIds[array_rand($teacherIds)],
<<<<<<< HEAD
                    'class_id' => $classId,
                    'mapel_id' => $mapelIds[array_rand($mapelIds)],
                    'day' => $day,
                    'start_time' => $startTime,
                    'end_time' => $endTime,
=======
                    'class_id'   => $classId,
                    'mapel_id'   => $mapelIds[array_rand($mapelIds)],
                    'day'        => $day,
                    'start_time' => $startTime, 
                    'end_time'   => $endTime,   
>>>>>>> 3985aad47f5463aac1ced55dffe6af02f76af4aa
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('jadwals')->insert($jadwals);

<<<<<<< HEAD
        DB::table('jam_pelajarans')->insert([

            ['hari' => 'senin-kamis', 'jam_ke' => 1, 'waktu_mulai' => '07:00:00', 'waktu_selesai' => '07:40:00'],
            ['hari' => 'senin-kamis', 'jam_ke' => 2, 'waktu_mulai' => '07:40:00', 'waktu_selesai' => '08:20:00'],
            ['hari' => 'senin-kamis', 'jam_ke' => 3, 'waktu_mulai' => '08:20:00', 'waktu_selesai' => '09:00:00'],
            ['hari' => 'senin-kamis', 'jam_ke' => 4, 'waktu_mulai' => '09:00:00', 'waktu_selesai' => '09:40:00'],
            // istirahat 1:>
            ['hari' => 'senin-kamis', 'jam_ke' => 5, 'waktu_mulai' => '10:00:00', 'waktu_selesai' => '10:35:00'],
            ['hari' => 'senin-kamis', 'jam_ke' => 6, 'waktu_mulai' => '10:35:00', 'waktu_selesai' => '11:10:00'],
            ['hari' => 'senin-kamis', 'jam_ke' => 7, 'waktu_mulai' => '11:10:00', 'waktu_selesai' => '11:45:00'],
            // istirahat 2:>
            ['hari' => 'senin-kamis', 'jam_ke' => 8, 'waktu_mulai' => '13:15:00', 'waktu_selesai' => '13:50:00'],
            ['hari' => 'senin-kamis', 'jam_ke' => 9, 'waktu_mulai' => '13:50:00', 'waktu_selesai' => '14:25:00'],
            ['hari' => 'senin-kamis', 'jam_ke' => 10, 'waktu_mulai' => '14:25:00', 'waktu_selesai' => '15:00:00'],


            ['hari' => 'jumat', 'jam_ke' => 1, 'waktu_mulai' => '07:00:00', 'waktu_selesai' => '07:30:00'],
            ['hari' => 'jumat', 'jam_ke' => 2, 'waktu_mulai' => '07:30:00', 'waktu_selesai' => '08:00:00'],
            ['hari' => 'jumat', 'jam_ke' => 3, 'waktu_mulai' => '08:00:00', 'waktu_selesai' => '08:30:00'],
            ['hari' => 'jumat', 'jam_ke' => 4, 'waktu_mulai' => '08:30:00', 'waktu_selesai' => '09:00:00'],
            ['hari' => 'jumat', 'jam_ke' => 5, 'waktu_mulai' => '09:00:00', 'waktu_selesai' => '09:30:00'],
            // istirahat 1:>
            ['hari' => 'jumat', 'jam_ke' => 6, 'waktu_mulai' => '09:50:00', 'waktu_selesai' => '10:20:00'],
            ['hari' => 'jumat', 'jam_ke' => 7, 'waktu_mulai' => '10:20:00', 'waktu_selesai' => '10:50:00'],
            ['hari' => 'jumat', 'jam_ke' => 8, 'waktu_mulai' => '10:50:00', 'waktu_selesai' => '11:20:00'],
            // istirahat 2:>
            ['hari' => 'jumat', 'jam_ke' => 9, 'waktu_mulai' => '13:00:00', 'waktu_selesai' => '13:30:00'],
            ['hari' => 'jumat', 'jam_ke' => 10, 'waktu_mulai' => '13:30:00', 'waktu_selesai' => '14:00:00'],
            ['hari' => 'jumat', 'jam_ke' => 11, 'waktu_mulai' => '14:00:00', 'waktu_selesai' => '14:30:00'],
            ['hari' => 'jumat', 'jam_ke' => 12, 'waktu_mulai' => '14:30:00', 'waktu_selesai' => '15:00:00'],
            ['hari' => 'jumat', 'jam_ke' => 13, 'waktu_mulai' => '15:00:00', 'waktu_selesai' => '15:30:00'],

        ]);
=======
>>>>>>> 3985aad47f5463aac1ced55dffe6af02f76af4aa
    }
}
