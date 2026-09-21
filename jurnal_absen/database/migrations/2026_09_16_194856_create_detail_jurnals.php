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
        Schema::create('detail_jurnals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jurnal_id')->constrained('jurnals','id')->cascadeOnDelete();
            $table->foreignId('siswa_id')->constrained('siswas','id')->cascadeOnDelete();
            $table->enum('status',['dispen','izin','sakit','alpha']);
            $table->string('catatan')->nullable();
            $table->string('foto')->default('-');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_jurnals');
    }
};
