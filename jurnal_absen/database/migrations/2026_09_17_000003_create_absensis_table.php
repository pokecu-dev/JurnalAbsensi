<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
<<<<<<< HEAD
        // Schema::create('absensis', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('id_jurnal')->constrained('jurnals');
        //     $table->string('nama_siswa');
        //     $table->enum('keterangan', ['sakit', 'izin', 'alpha', 'dispen']);
        //     $table->timestamps();
        // });
=======
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_jurnal')->constrained('jurnals');
            $table->string('nama_siswa');
            $table->enum('keterangan', ['sakit', 'izin', 'alpha', 'dispen']);
            $table->timestamps();
        });
>>>>>>> 3985aad47f5463aac1ced55dffe6af02f76af4aa
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
<<<<<<< HEAD
        // Schema::dropIfExists('absensis');
=======
        Schema::dropIfExists('absensis');
>>>>>>> 3985aad47f5463aac1ced55dffe6af02f76af4aa
    }
};