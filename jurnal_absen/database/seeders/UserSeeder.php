<?php

namespace Database\Seeders;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                [
                    'nip' => '111111111111111111',
                    'nuptk' => '1111111111111111',
                    'phone' => '+62 811-1111-1111',
                    'name' => 'admin',
                    'email' => 'admin@ex.com',
                    'password' => Hash::make('password'),
                    'role' => 'admin'
                ],
                [
                    'nip' => '111111111111111112',
                    'nuptk' => '1111111111111112',
                    'phone' => '+62 811-1111-1112',
                    'name' => 'sekre',
                    'email' => 'sekre@ex.com',
                    'password' => Hash::make('password'),
                    'role' => 'sekre'
                ],
                [
                    'nip' => '111111111111111113',
                    'nuptk' => '1111111111111113',
                    'phone' => '+62 811-1111-1113',
                    'name' => 'guru',
                    'email' => 'guru@ex.com',
                    'password' => Hash::make('password'),
                    'role' => 'guru'
                ],
                [
                    'nip' => '111111111111111114',
                    'nuptk' => '1111111111111114',
                    'phone' => '+62 811-1111-1114',
                    'name' => 'piket',
                    'email' => 'piket@ex.com',
                    'password' => Hash::make('password'),
                    'role' => 'piket'
                ],
                
            ]



        );
    }
}
