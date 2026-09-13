<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mapels')->insert([
            ['name' => 'Pendidikan Agama dan Budi Pekerti'],
            ['name' => 'Pancasila'],
            ['name' => 'Bahasa Indonesia'],
            ['name' => 'Matematika'],
            ['name' => 'Bahasa Inggris'],
            ['name' => 'Ilmu Pengetahuan Alam (IPA)'],
            ['name' => 'Ilmu Pengetahuan Sosial (IPS)'],
            ['name' => 'Pendidikan Jasmani, Olahraga, dan Kesehatan (PJOK)'],
            ['name' => 'Informatika'],
            ['name' => 'Seni dan Budaya'],
            ['name' => 'Sejarah'],
            ['name' => 'Fisika'],
            ['name' => 'Kimia'],
            ['name' => 'Biologi'],
            ['name' => 'Ekonomi'],
            ['name' => 'Sosiologi'],
            ['name' => 'Geografi'],
        ]);
    }
}
