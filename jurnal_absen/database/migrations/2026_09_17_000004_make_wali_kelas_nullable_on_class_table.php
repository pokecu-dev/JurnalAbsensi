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
        // Schema::table('class', function (Blueprint $table) {
            // $table->foreignId('id_wali_kelas')->nullable()->change();
        // });
=======
        Schema::table('class', function (Blueprint $table) {
            $table->foreignId('id_wali_kelas')->nullable()->change();
        });
>>>>>>> 3985aad47f5463aac1ced55dffe6af02f76af4aa
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
<<<<<<< HEAD
        // Schema::table('class', function (Blueprint $table) {
        //     $table->foreignId('id_wali_kelas')->nullable(false)->change();
        // });
=======
        Schema::table('class', function (Blueprint $table) {
            $table->foreignId('id_wali_kelas')->nullable(false)->change();
        });
>>>>>>> 3985aad47f5463aac1ced55dffe6af02f76af4aa
    }
};