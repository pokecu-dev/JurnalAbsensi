<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dummySiswas = [
            ['id' => 1, 'name' => 'MARVEL MAULANA SAPUTRA','CLASS_ID' => 8],
            ['id' => 2, 'name' => 'MARWA RIZQIANI PUTRI','CLASS_ID' => 8],
            ['id' => 3, 'name' => 'MAULANA QUBRO ALGHOZALI','CLASS_ID' => 8],
            ['id' => 4, 'name' => 'MOCHAMAD RAFI NUR ALFAN','CLASS_ID' => 8],
            ['id' => 5, 'name' => 'MOCHAMMAD WILDAN SEPTIANO PRASETYO','CLASS_ID' => 8],
            ['id' => 6, 'name' => 'MUHAMAD BAGUS PRASETIYO','CLASS_ID' => 8],
            ['id' => 7, 'name' => 'MUHAMMAD ADIP SOFIYULLOH','CLASS_ID' => 8],
            ['id' => 8, 'name' => 'MUHAMMAD ALBYAN AULIA','CLASS_ID' => 8],
            ['id' => 9, 'name' => 'MUHAMMAD DUDE FAHREZI','CLASS_ID' => 8],
            ['id' => 10, 'name' => 'MUHAMMAD FUAD HASAN','CLASS_ID' => 8],
            ['id' => 11, 'name' => 'MUHAMMAD ILHAM NASHRULLAH','CLASS_ID' => 8],
            ['id' => 12, 'name' => 'MUHAMMAD RAFA AZRYELLO FARISHUTA','CLASS_ID' => 8],
            ['id' => 13, 'name' => 'MUHAMMAD RAFFI ARKHAN','CLASS_ID' => 8],
            ['id' => 14, 'name' => 'MUHAMMAD REISYA APRILLIAWAN','CLASS_ID' => 8],
            ['id' => 15, 'name' => 'MUHAMMAD SAIFUDDIN','CLASS_ID' => 8],
            ['id' => 16, 'name' => 'NANDA AURELIA KHOIRUNNISAA','CLASS_ID' => 8],
            ['id' => 17, 'name' => 'NASWA PUTRI BINTANG FEBRIANA','CLASS_ID' => 8],
            ['id' => 18, 'name' => 'NAZWA AFIFAH ANWAR','CLASS_ID' => 8],
            ['id' => 19, 'name' => 'NITA DWI LARASATI','CLASS_ID' => 8],
            ['id' => 20, 'name' => 'PRATAMA REZKIANSYAH WIDIANTO','CLASS_ID' => 8],
            ['id' => 21, 'name' => 'PUTRI LIANASARI','CLASS_ID' => 8],
            ['id' => 22, 'name' => 'PUTRI ZAHWA RUSDIANA','CLASS_ID' => 8],
            ['id' => 23, 'name' => 'RAGA SYAHPUTRA ARIFIN','CLASS_ID' => 8],
            ['id' => 24, 'name' => 'RANIA NURILLAH','CLASS_ID' => 8],
            ['id' => 25, 'name' => 'RIRIN SRI WAHYUNI','CLASS_ID' => 8],
            ['id' => 26, 'name' => 'SALMA FIKRIATUL AZIZAH','CLASS_ID' => 8],
            ['id' => 27, 'name' => 'SEREN KHANZAA AZYLA','CLASS_ID' => 8],
            ['id' => 28, 'name' => 'SEVIA DWI NOVITASARI','CLASS_ID' => 8],
            ['id' => 29, 'name' => 'SHALSABILLA PUTRI NURAINI','CLASS_ID' => 8],
            ['id' => 30, 'name' => 'SKANDINAVIA','CLASS_ID' => 8],
            ['id' => 31, 'name' => 'SYAFIQI ERDANSYAH RAMADAN','CLASS_ID' => 8],
            ['id' => 32, 'name' => 'VANESSA FLORIS','CLASS_ID' => 8],
            ['id' => 33, 'name' => 'VANISSA DEWI PUTRI RIANTO','CLASS_ID' => 8],
            ['id' => 34, 'name' => 'VARADITA APRILIANDINI','CLASS_ID' => 8],
            ['id' => 35, 'name' => 'WILDAN RAMADHAN ZULKARNAEN','CLASS_ID' => 8],
            ['id' => 36, 'name' => 'ZHEFITRA ANANDA WIJAYA','CLASS_ID' => 8],
        ];

        DB::table('siswas')->insert($dummySiswas);

        
    }
}
