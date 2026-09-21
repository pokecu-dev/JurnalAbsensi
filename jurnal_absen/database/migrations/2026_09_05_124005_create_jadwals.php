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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained('users');
            $table->foreignId('class_id')->constrained('classes');
            $table->foreignId('mapel_id')->constrained('mapels');
            $table->enum('day', ['senin', 'selasa', 'rabu', 'kamis', 'jumat']);
            $table->integer('start_time')->nullable();
            $table->integer('end_time')->nullable();

            $table->timestamps();
        });

        Schema::create('jam_pelajarans', function (Blueprint $table) {
            $table->id();
            $table->enum('hari', ['senin-kamis', 'jumat']);
            $table->integer('jam_ke'); 
            $table->time('waktu_mulai'); 
            $table->time('waktu_selesai'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
