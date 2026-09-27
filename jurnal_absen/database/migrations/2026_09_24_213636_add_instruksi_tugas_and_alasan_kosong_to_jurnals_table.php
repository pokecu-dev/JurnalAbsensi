<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('jurnals', function (Blueprint $table) {
            $table->text('instruksi_tugas')->nullable()->after('catatan');
            $table->text('alasan_kosong')->nullable()->after('instruksi_tugas');
        });
    }

    public function down(): void
    {
        Schema::table('jurnals', function (Blueprint $table) {
            $table->dropColumn([
                'instruksi_tugas',
                'alasan_kosong',
            ]);
        });
    }
};