<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kelas extends Model
{
    public $timestamps = false;

    protected $table = 'class';

    protected $fillable = ['name', 'id_wali_kelas', 'total_students'];

    public function waliKelas(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_wali_kelas');
    }

    public function jadwals(): HasMany
    {
        return $this->hasMany(Jadwal::class, 'class_id');
    }
}