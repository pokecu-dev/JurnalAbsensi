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
        Schema::create('jurnals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_jadwal')->nullable()->constrained('jadwals')->nullOnDelete();
            $table->foreignId('teacher_id')->constrained('users');
            $table->foreignId('class_id')->constrained('classes');
            $table->foreignId('mapel_id')->constrained('mapels');
            // $table->enum('day', ['senin', 'selasa', 'rabu', 'kamis', 'jumat']);
            $table->integer('start_time')->nullable();
            $table->integer('end_time')->nullable();
            $table->date('tgl')->useCurrent();
            $table->text('materi')->nullable();
            $table->string('catatan')->nullable();
            $table->enum('guru', ['hadir', 'tidak-ada_tugas', 'tidak-tanpa_tugas']); // tidak-ada_tugas berarti tidak hadir namun ada tugas, tidak-tanpa_tugas berarti tidak hadir namun tidak ada tugas
            $table->enum('status', ['pending', 'rejected', 'approved']);
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurnals');
    }
};
