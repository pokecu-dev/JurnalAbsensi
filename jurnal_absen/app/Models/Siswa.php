<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Classes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Siswa extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'class_id',
    ];

    public function class(): BelongsTo
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
}
