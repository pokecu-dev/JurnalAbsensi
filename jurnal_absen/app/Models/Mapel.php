<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapels';

    protected $fillable = [
        'kode_mapel', 
        'nama_mapel'
    ];

    public function jadwals() 
    {
        return $this->hasMany(Jadwal::class, 'mapel_id');
    }
}