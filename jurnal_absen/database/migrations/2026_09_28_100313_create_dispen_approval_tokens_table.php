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
        Schema::create('dispen_approval_tokens', function (Blueprint $table) {
            $table->id();

            $table->foreignId('dispen_id')
                ->unique()
                ->constrained('dispens')
                ->cascadeOnDelete();

            $table->string('token_hash', 64)->unique();

            $table->timestamp('expires_at');

            $table->timestamp('last_sent_at');

            $table->timestamp('used_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispen_approval_tokens');
    }
};
