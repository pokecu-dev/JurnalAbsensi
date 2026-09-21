<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Jadwal;

class Classes extends Model
{

    public function siswa() {
        return $this->hasMany(Jadwal::class,'class_id');
    }

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class, 'class_id');
    }
}
