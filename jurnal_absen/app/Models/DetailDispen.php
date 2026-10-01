<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailDispen extends Model
{
    protected $fillable = [
        'dispen_id',
        'siswa_id',
    ];

    public function dispen(): BelongsTo
    {
        return $this->belongsTo(Dispen::class, 'dispen_id');
    }

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}
