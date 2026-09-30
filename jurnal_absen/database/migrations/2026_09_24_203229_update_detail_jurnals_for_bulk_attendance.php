<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        if (DB::getDriverName() === 'mysql') {
            DB::statement("
                ALTER TABLE detail_jurnals
                MODIFY status ENUM(
                    'hadir',
                    'dispen',
                    'izin',
                    'sakit',
                    'alpha'
                )
                NOT NULL
            ");
        }

        Schema::table('detail_jurnals', function (Blueprint $table) {
            $table->unique(
                ['jurnal_id', 'siswa_id'],
                'detail_jurnals_jurnal_siswa_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::table('detail_jurnals', function (Blueprint $table) {
            $table->dropUnique(
                'detail_jurnals_jurnal_siswa_unique'
            );
        });

        if (DB::getDriverName() === 'mysql') {
            DB::statement("
                ALTER TABLE detail_jurnals
                MODIFY status ENUM(
                    'dispen',
                    'izin',
                    'sakit',
                    'alpha'
                )
                NOT NULL
            ");
        }
    }
};