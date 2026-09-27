<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class MapelController extends Controller
{
    /**
     * Tampilkan daftar mata pelajaran
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $mapels = Mapel::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         // Prioritaskan nama mapel yang DIAWALI kata pencarian
                         ->orderByRaw("CASE 
                             WHEN name LIKE ? THEN 1 
                             ELSE 2 
                         END", ["{$search}%"]);
        })
        ->latest()
        ->paginate(10)
        ->withQueryString(); // Menjaga parameter pencarian tetap ada saat berpindah halaman pagination

        return view('admin.data_mapel', compact('mapels'));
    }

    /**
     * Jika halaman /create diakses, redirect balik ke index
     */
    public function create()
    {
        return redirect()->route('admin.data_mapel.index');
    }

    /**
     * Simpan mata pelajaran baru langsung dari halaman mapel
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ], [
            'name.required' => 'Nama mata pelajaran wajib diisi.',
        ]);

        Mapel::create([
            'name' => $request->name,
            'kategori' => 'Umum',
        ]);

        return redirect()->route('admin.data_mapel.index')->with('success', 'Mata pelajaran berhasil ditambahkan!');
    }

    /**
     * Hapus mata pelajaran beserta jadwal terkait secara otomatis
     */
    public function destroy(Mapel $data_mapel)
    {
        try {
            // 1. Hapus semua jadwal yang menggunakan mapel ini terlebih dahulu
            $data_mapel->jadwals()->delete();

            // 2. Hapus data mapelnya
            $data_mapel->delete();

            return redirect()->route('admin.data_mapel.index')->with('success', 'Mata pelajaran dan jadwal terkait berhasil dihapus!');
        } catch (QueryException $e) {
            return redirect()->route('admin.data_mapel.index')->with('error', 'Gagal menghapus data mata pelajaran.');
        }
    }
}