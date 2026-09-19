<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

// #[Fillable(['id_jadwal','tgl', 'materi', 'catatan', 'status', 'guru','foto'])]
class Jurnal extends Model
{

    protected $fillable = [
        'id_jadwal',
        'teacher_id',
        'class_id',
        'mapel_id',
        'start_time',
        'end_time',
        'tgl',
        'materi',
        'catatan',
        'guru',
        'status',
        'foto',
    ];

    protected function casts(): array
    {
        return [
            'tgl' => 'date',
        ];
    }

    public function getHariAttribute(): string
    {
        return Carbon::parse($this->tgl)->locale('id')->isoFormat('dddd');
    }

    public function getHariTanggalAttribute(): string
    {
        return Carbon::parse($this->tgl)->locale('id')->isoFormat('dddd, D MMMM Y');
    }



    public static function day()
    {
        // $daftar_hari = array(
        //     'Sunday' => 'Minggu',
        //     'Monday' => 'Senin',
        //     'Tuesday' => 'Selasa',
        //     'Wednesday' => 'Rabu',
        //     'Thursday' => 'Kamis',
        //     'Friday' => 'Jumat',
        //     'Saturday' => 'Sabtu'
        // );
        // $day = date('l');
        // return $daftar_hari[$day]; 

        return now()->locale('id')->isoFormat('dddd');


    }

    public function jadwal(){
        return $this->belongsTo(Jadwal::class,'id_jadwal');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }

    // public static function hourConvert(int $mode,$hour) {
    //     $hourMapel = 45;
        
    // }
}
