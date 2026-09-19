<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    public function jadwals() {
        return $this->hasMany(Jadwal::class,'mapel_id');
    }
}
