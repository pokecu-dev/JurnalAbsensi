<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispen extends Model
{
    use HasFactory;

    protected $table = 'dispens';

    protected $fillable = [
        'siswa_id',
        'class_id',
        'kategori',
        'alasan',
        'tgl',
        'jam_mulai',
        'jam_selesai',
        'status',
        'approved_by',
    ];

    protected $casts = [
        'tgl' => 'date',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}