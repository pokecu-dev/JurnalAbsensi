<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classes extends Model
{
    public function siswas(): HasMany
    {
        return $this->hasMany(Siswa::class, 'class_id');
    }

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class, 'class_id');
    }
}
