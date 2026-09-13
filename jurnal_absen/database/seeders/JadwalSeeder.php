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
        $classIds = DB::table('class')->pluck('id')->toArray();

        // if (empty($classIds) || empty($teacherIds)) {
        //     return;
        // }

        $days = ['senin', 'selasa', 'rabu', 'kamis', 'jumat'];
        $jadwals = [];

        foreach ($days as $day) {
            foreach ($classIds as $classId) {
                $startTime = rand(1, 10);

                $duration = rand(1, 3);
                $endTime = min($startTime + $duration - 1, 12);

                $jadwals[] = [
                    'teacher_id' => $teacherIds[array_rand($teacherIds)],
                    'class_id'   => $classId,
                    'day'        => $day,
                    'start_time' => $startTime, 
                    'end_time'   => $endTime,   
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('jadwals')->insert($jadwals);

    }
}
