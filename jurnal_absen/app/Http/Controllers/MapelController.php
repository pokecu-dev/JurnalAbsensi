<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Validation\Rule; // <-- Tambahkan ini untuk aturan unique ignore

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
                         ->orderByRaw("CASE 
                             WHEN name LIKE ? THEN 1 
                             ELSE 2 
                         END", ["{$search}%"]);
        })
        ->latest()
        ->paginate(10)
        ->withQueryString();

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
     * Simpan mata pelajaran baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:mapels,name',
        ], [
            'name.required' => 'Nama mata pelajaran wajib diisi.',
            'name.unique'   => 'Nama mata pelajaran tersebut sudah ada.',
        ]);

        Mapel::create([
            'name' => $request->name,
            'kategori' => 'Umum',
        ]);

        return redirect()->route('admin.data_mapel.index')->with('success', 'Mata pelajaran berhasil ditambahkan!');
    }

    /**
     * Jika halaman /edit diakses langsung via URL, redirect balik ke index
     */
    public function edit(Mapel $data_mapel)
    {
        return redirect()->route('admin.data_mapel.index');
    }

    /**
     * Perbarui data mata pelajaran
     */
    public function update(Request $request, Mapel $data_mapel)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('mapels', 'name')->ignore($data_mapel->id), // Mengecek keunikan nama kecuali milik ID ini
            ],
        ], [
            'name.required' => 'Nama mata pelajaran wajib diisi.',
            'name.unique'   => 'Nama mata pelajaran tersebut sudah ada.',
        ]);

        try {
            $data_mapel->update([
                'name' => $request->name,
            ]);

            return redirect()->route('admin.data_mapel.index')->with('success', 'Mata pelajaran berhasil diperbarui!');
        } catch (QueryException $e) {
            return redirect()->route('admin.data_mapel.index')->with('error', 'Gagal memperbarui data mata pelajaran.');
        }
    }

    /**
     * Hapus mata pelajaran beserta jadwal terkait
     */
    public function destroy(Mapel $data_mapel)
    {
        try {
            $data_mapel->jadwals()->delete();
            $data_mapel->delete();

            return redirect()->route('admin.data_mapel.index')->with('success', 'Mata pelajaran dan jadwal terkait berhasil dihapus!');
        } catch (QueryException $e) {
            return redirect()->route('admin.data_mapel.index')->with('error', 'Gagal menghapus data mata pelajaran.');
        }
    }
}