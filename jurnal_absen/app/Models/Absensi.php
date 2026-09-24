<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Absensi extends Model
{
    protected $fillable = ['id_jurnal', 'nama_siswa', 'keterangan'];

    public function jurnal(): BelongsTo
    {
        return $this->belongsTo(Jurnal::class, 'id_jurnal');
    }

    public const KETERANGAN = ['sakit', 'izin', 'alpha', 'dispen'];
}