<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Mapel extends Model
{
    //public $timestamps = false;

    // Tambahkan 'kategori' agar tidak kena error Mass Assignment saat store()
    protected $fillable = [
        'name',
        'kategori',
    ];

    /**
     * Relasi ke tabel Jadwal
     */
    public function jadwals(): HasMany
    {
        return $this->hasMany(Jadwal::class, 'mapel_id');
    }

    /**
     * Mutator Otomatis: Merapikan format huruf besar/kecil & singkatan mapel
     */
    public function setNameAttribute($value)
    {
        // 1. Hapus spasi ganda/berlebih di awal, tengah, dan akhir
        $cleanValue = trim(preg_replace('/\s+/', ' ', $value));

        // 2. Daftar singkatan/akronim yang WAJIB KAPITAL SEMUA
        $acronyms = [
            'IPA', 'IPS', 'PJOK', 'PPKN', 'PKN', 'BK', 
            'TIK', 'RPL', 'TKJ', 'PABP', 'PAI', 'SBK', 'P5', 'DKV'
        ];

        // 3. Ubah huruf pertama tiap kata jadi kapital (Title Case)
        $formatted = Str::title(mb_strtolower($cleanValue));

        // 4. Ubah kata singkatan menjadi KAPITAL SEMUA jika cocok
        foreach ($acronyms as $acronym) {
            $formatted = preg_replace_callback(
                '/\b' . preg_quote($acronym, '/') . '\b/i',
                fn() => $acronym,
                $formatted
            );
        }

        $this->attributes['name'] = $formatted;
    }
}