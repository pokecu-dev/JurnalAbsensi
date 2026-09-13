<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('class')->insert([
            ['name' => 'X RPL 1'],
            ['name' => 'X RPL 2'],
            ['name' => 'X TKJ 1'],
            ['name' => 'X TKJ 2'],
            ['name' => 'X DKV 1'],
            ['name' => 'X AKL 1'],

            // Kelas XI
            ['name' => 'XI RPL 1'],
            ['name' => 'XI RPL 2'],
            ['name' => 'XI TKJ 1'],
            ['name' => 'XI DKV 1'],
            ['name' => 'XI AKL 1'],

            ['name' => 'XII RPL 1'],
            ['name' => 'XII RPL 2'],
            ['name' => 'XII TKJ 1'],
            ['name' => 'XII DKV 1'],
            ['name' => 'XII AKL 1'],
        ]);
    }
}
