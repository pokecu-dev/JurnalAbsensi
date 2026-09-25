<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mapel extends Model
{
<<<<<<< HEAD
    protected $table = 'mapels';

    protected $fillable = [
        'kode_mapel', 
        'nama_mapel'
    ];

    public function jadwals() 
=======
    public $timestamps = false;

    protected $fillable = ['name'];

    public function jadwals(): HasMany
>>>>>>> 33a1f581aba6a544a44ea5b7befbd332c7c9892e
    {
        return $this->hasMany(Jadwal::class, 'mapel_id');
    }
}