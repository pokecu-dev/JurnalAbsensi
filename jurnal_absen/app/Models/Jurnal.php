<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jurnal extends Model
{
    protected $fillable = [
        'id_jadwal',
        'keterangan',
        'tgl',
        'materi',
        'catatan',
        'tugas',
        'alasan',
        'foto',
        'alasan_validasi',
        'status',
    ];

    public function jadwal(): BelongsTo
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal');
    }

    public function absensis(): HasMany
    {
        return $this->hasMany(Absensi::class, 'id_jurnal');
    }

    protected function casts(): array
    {
        return [
            'tgl' => 'date',
        ];
    }

    public function getKeteranganLabelAttribute(): string
    {
        return match ($this->keterangan) {
            'hadir' => 'Hadir',
            'tidak_hadir_tugas' => 'Tidak Hadir (Ada Tugas)',
            'tidak_hadir_tanpa_tugas' => 'Tidak Hadir (Tanpa Tugas)',
            default => $this->keterangan ?? '-',
        };
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'approved' => 'Tervalidasi',
            'rejected' => 'Ditolak',
            default => 'Menunggu Validasi',
        };
    }
}