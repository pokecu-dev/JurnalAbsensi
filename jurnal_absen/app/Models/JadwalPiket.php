<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class JadwalPiket extends Model
{
    protected $table = 'jadwal_piket';

    public $timestamps = false;

    public static function GetJadwalPiketBy(?int $userId = null, ?int $hour = null, array $with = [])
    {
        $query = static::with($with)
            ->whereHas('user', function (Builder $query): void {
                $query->whereIn('role', ['guru', 'piket']);
            })
            ->when($userId, function (Builder $query) use ($userId): void {
                $query->where('user_id', $userId);
            });

        if (! $hour) {
            return $query->get();
        }

        $time = now()->format('H:i:s');

        return $query
            ->where('start_time', '<=', $time)
            ->where('end_time', '>=', $time)
            ->exists();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
