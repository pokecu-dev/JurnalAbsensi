<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapelController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Mengambil data mapel dengan fitur pencarian dan paginasi
        $mapels = Mapel::when($search, function ($query, $search) {
                return $query->where('kode_mapel', 'like', "%{$search}%")
                             ->orWhere('nama_mapel', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $nextCode = $this->generateNextCode();

        return view('mapels.index', compact('mapels', 'nextCode'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_mapel' => 'required|string|max:255|unique:mapels,nama_mapel',
        ], [
            'nama_mapel.unique' => 'Mata pelajaran ini sudah terdaftar!',
        ]);

        // Generate kode unik terbaru
        $nextCode = $this->generateNextCode();

        Mapel::create([
            'kode_mapel' => $nextCode,
            'nama_mapel' => $request->nama_mapel,
        ]);

        return redirect()->route('mapels.index')->with('success', 'Mata pelajaran berhasil ditambahkan.');
    }

    public function edit(Mapel $mapel)
    {
        return view('mapels.edit', compact('mapel'));
    }

    public function update(Request $request, Mapel $mapel)
    {
        // Validasi unik dengan mengecualikan ID mapel yang sedang di-edit
        $request->validate([
            'nama_mapel' => 'required|string|max:255|unique:mapels,nama_mapel,' . $mapel->id,
        ], [
            'nama_mapel.unique' => 'Mata pelajaran ini sudah terdaftar!',
        ]);

        $mapel->update([
            'nama_mapel' => $request->nama_mapel,
        ]);

        return redirect()->route('mapels.index')->with('success', 'Mata pelajaran berhasil diperbarui!');
    }

    public function destroy(Mapel $mapel)
    {
        $mapel->delete();

        return redirect()->route('mapels.index')->with('success', 'Mata pelajaran berhasil dihapus!');
    }

    /**
     * Method private helper untuk generate kode otomatis (MP001, MP002, dst.)
     */
    private function generateNextCode(): string
    {
        $maxCode = DB::table('mapels')
            ->selectRaw('MAX(CAST(SUBSTRING(kode_mapel, 3) AS UNSIGNED)) as max_num')
            ->value('max_num');

        $number = $maxCode ? $maxCode + 1 : 1;

        return 'MP' . str_pad($number, 3, '0', STR_PAD_LEFT);
    }
}