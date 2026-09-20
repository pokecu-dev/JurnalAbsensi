<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapelController extends Controller
{
    public function index()
    {
        $mapels = Mapel::all();

        // Generate kode otomatis untuk ditampilkan di form index
        $maxCode = DB::table('mapels')->selectRaw('MAX(CAST(SUBSTRING(kode_mapel, 3) AS UNSIGNED)) as max_num')->value('max_num');
        $number = $maxCode ? $maxCode + 1 : 1;
        $nextCode = 'MP' . str_pad($number, 3, '0', STR_PAD_LEFT);

        return view('mapels.index', compact('mapels', 'nextCode'));
    }

public function store(Request $request)
{
    // Generate kode otomatis
    $maxCode = DB::table('mapels')->selectRaw('MAX(CAST(SUBSTRING(kode_mapel, 3) AS UNSIGNED)) as max_num')->value('max_num');
    $number = $maxCode ? $maxCode + 1 : 1;
    $nextCode = 'MP' . str_pad($number, 3, '0', STR_PAD_LEFT);

    // Validasi pencegahan duplikat nama_mapel
    $request->validate([
        'nama_mapel' => 'required|string|max:255|unique:mapels,nama_mapel'
    ], [
        // Pesan error kustom (opsional)
        'nama_mapel.unique' => 'Mata pelajaran ini sudah terdaftar!',
    ]);

    Mapel::create([
        'kode_mapel' => $nextCode,
        'nama_mapel' => $request->nama_mapel
    ]);

    return redirect()->route('mapels.index')->with('success', 'Mata pelajaran berhasil ditambahkan.');
}

   public function destroy(Mapel $mapel)
{
    // Hapus data mapel
    $mapel->delete();

    return redirect()->route('mapels.index')->with('success', 'Mata pelajaran berhasil dihapus!');
}
}