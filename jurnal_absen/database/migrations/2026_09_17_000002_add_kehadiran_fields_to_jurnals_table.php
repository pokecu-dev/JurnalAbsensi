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
        // Schema::table('jurnals', function (Blueprint $table) {
        //     $table->enum('keterangan', ['hadir', 'tidak_hadir_tugas', 'tidak_hadir_tanpa_tugas'])
        //         ->nullable()
        //         ->after('id_jadwal');
        //     $table->text('tugas')->nullable()->after('catatan');
        //     $table->text('alasan')->nullable()->after('tugas');
        //     $table->string('foto')->nullable()->after('alasan');
        //     $table->text('alasan_validasi')->nullable()->after('foto');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('jurnals', function (Blueprint $table) {
        //     $table->dropColumn(['keterangan', 'tugas', 'alasan', 'foto', 'alasan_validasi']);
        // });
    }
};