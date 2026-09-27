<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class DetailJurnal extends Model
{
    protected $fillable = [
        'jurnal_id',
        'siswa_id',
        'status',
        'catatan',
        'foto',
    ];

    public function jurnal() {
        return $this->belongsTo(Jurnal::class, 'jurnal_id');
    }
}
