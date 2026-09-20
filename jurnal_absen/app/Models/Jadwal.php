<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\JamPelajaran;

class Jadwal extends Model
{
    private function getKelompokHari()
    {
        return strtolower($this->day) === 'jumat' ? 'jumat' : 'senin-kamis';
    }

    public function getWaktuMulaiAttribute()
    {
        $jam = JamPelajaran::where('hari', $this->getKelompokHari())
            ->where('jam_ke', $this->start_time)
            ->first();

        return $jam ? date('H:i', strtotime($jam->waktu_mulai)) : null;
    }

    public function getWaktuSelesaiAttribute()
    {
        $jam = JamPelajaran::where('hari', $this->getKelompokHari())
            ->where('jam_ke', $this->end_time)
            ->first();

        return $jam ? date('H:i', strtotime($jam->waktu_selesai)) : null;
    }

    public static function GetJadwalBy($teacherId = null, $hour = null,array $with = [])
    {
        $now = now();
        $today = strtolower(Jurnal::day($now->translatedFormat('l')));
        $time = $now->format('H:i:s');

        $query = static::with($with)->where('day',$today)->when($teacherId, function ($q) use ($teacherId) {
            $q->where('teacher_id',$teacherId);
        });

        if (!$hour) {
            return $query->get();
        }

        $day = ($today === 'jumat') ? 'jumat' : 'senin-kamis';

        $activeHours = JamPelajaran::where('hari', $day)->where('waktu_mulai', '<=', $time)->where('waktu_selesai', '>=', $time)->first();

        if(!$activeHours){
            return null;
        }

        return $query->where('start_time', '<=', $activeHours->jam_ke)
            ->where('end_time', '>=', $activeHours->jam_ke)
            ->first();
    }

    public function jurnal() {
        return $this->hasMany(Jurnal::class,'id_jadwal');
    }

    public function teacher() {
        return $this->belongsTo(User::class, 'teacher_id');
    }
    public function classes() {
        return $this->belongsTo(Classes::class,'class_id');
    }
    public function mapel() {
        return $this->belongsTo(Mapel::class,'mapel_id');
    }
}
