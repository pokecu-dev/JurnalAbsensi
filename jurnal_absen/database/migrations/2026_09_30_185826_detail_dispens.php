<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public $withinTransaction = false;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasTable('detail_dispens')) {
            Schema::create('detail_dispens', function (Blueprint $table) {
                $table->id();
                $table->foreignId('dispen_id')->constrained('dispens')->cascadeOnDelete();
                $table->foreignId('siswa_id')->constrained('siswas');
                $table->timestamps();
                $table->unique(['dispen_id', 'siswa_id'], 'detail_dispens_dispen_siswa_unique');
            });
        }

        if (Schema::hasColumn('dispens', 'siswa_id')) {
            DB::table('dispens')
                ->select(['id', 'siswa_id', 'created_at', 'updated_at'])
                ->whereNotNull('siswa_id')
                ->orderBy('id')
                ->chunkById(500, function ($dispens): void {
                    $createdAt = now();
                    $details = $dispens->map(fn (object $dispen): array => [
                        'dispen_id' => $dispen->id,
                        'siswa_id' => $dispen->siswa_id,
                        'created_at' => $dispen->created_at ?? $createdAt,
                        'updated_at' => $dispen->updated_at ?? $createdAt,
                    ])->all();

                    DB::table('detail_dispens')->insertOrIgnore($details);
                });

            $unmigratedCount = DB::table('dispens')
                ->whereNotNull('siswa_id')
                ->whereNotExists(fn ($query) => $query->selectRaw('1')
                    ->from('detail_dispens')
                    ->whereColumn('detail_dispens.dispen_id', 'dispens.id')
                    ->whereColumn('detail_dispens.siswa_id', 'dispens.siswa_id'))
                ->count();

            if ($unmigratedCount > 0) {
                throw new RuntimeException('Data Dispen lama belum seluruhnya berhasil dipindahkan ke detail_dispens.');
            }
        }

        $legacyColumns = [];
        foreach (['siswa_id', 'class_id'] as $column) {
            if (Schema::hasColumn('dispens', $column)) {
                $legacyColumns[] = $column;
            }
        }

        if ($legacyColumns !== []) {
            Schema::disableForeignKeyConstraints();
            try {
                Schema::table('dispens', function (Blueprint $table) use ($legacyColumns): void {
                    foreach ($legacyColumns as $column) {
                        $table->dropConstrainedForeignId($column);
                    }
                });
            } finally {
                Schema::enableForeignKeyConstraints();
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('dispens', 'siswa_id') === false) {
            Schema::table('dispens', function (Blueprint $table) {
                $table->foreignId('siswa_id')
                    ->nullable()
                    ->constrained('siswas')
                    ->nullOnDelete();
            });
        }

        if (Schema::hasColumn('dispens', 'class_id') === false) {
            Schema::table('dispens', function (Blueprint $table) {
                $table->foreignId('class_id')
                    ->nullable()
                    ->constrained('classes')
                    ->nullOnDelete();
            });
        }

        // Restore data from detail back to legacy siswa_id.
        DB::table('detail_dispens')
            ->orderBy('id')
            ->get()
            ->each(function ($detail) {
                DB::table('dispens')
                    ->where('id', $detail->dispen_id)
                    ->whereNull('siswa_id')
                    ->update([
                        'siswa_id' => $detail->siswa_id,
                    ]);
            });

        Schema::dropIfExists('detail_dispens');
    }
};
