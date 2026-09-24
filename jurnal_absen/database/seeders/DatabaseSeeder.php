<?php

namespace Database\Seeders;

use App\Models\Siswa;
use App\Models\User;
use Database\Factories\SiswaFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => '',
        //     'email' => 'test@example.com',
        // ]);
        
        $this->call([
            UserSeeder::class,
            ClassSeeder::class,
            MapelSeeder::class,
            JadwalSeeder::class
        ]);

        Siswa::factory(50)->create();

        $this->call([
<<<<<<< HEAD
            JurnalSeeder::class
=======
            UserSeeder::class,
            ClassSeeder::class,
            MapelSeeder::class,
            JadwalSeeder::class,
            JurnalSeeder::class,
>>>>>>> 3985aad47f5463aac1ced55dffe6af02f76af4aa
        ]);


    }
}
