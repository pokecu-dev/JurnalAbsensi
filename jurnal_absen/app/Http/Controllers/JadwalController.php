<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Classes;
use App\Models\Mapel;
use App\Models\User;
use Illuminate\Http\Request;

class JadwalController extends Controller
{

    public function index()
    {
        $jadwals = Jadwal::with(['teacher', 'classes', 'mapel'])->get();
        return view('jadwal.index', compact('jadwals'));
    }


    public function create()
    {
        $teachers = User::get();
        $classes = Classes::get();
        $mapels = Mapel::get();

        return view('jadwal.create', compact('teachers', 'classes', 'mapels'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'teacher_id' => 'required|exists:users,id',
            'class_id'   => 'required|exists:classes,id',
            'mapel_id'   => 'required|exists:mapels,id',
            'day'        => 'required|in:senin,selasa,rabu,kamis,jumat',
            'start_time' => 'nullable|integer',
            'end_time'   => 'nullable|integer',
        ]);

        Jadwal::create($validated);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan!');
    }


    public function show(string $id)
    {
        return redirect()->route('jadwal.index');
    }


    public function edit(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $teachers = User::get();
        $classes = Classes::get();
        $mapels = Mapel::get();

        return view('jadwal.edit', compact('jadwal', 'teachers', 'classes', 'mapels'));
    }


    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'teacher_id' => 'required|exists:users,id',
            'class_id'   => 'required|exists:classes,id',
            'mapel_id'   => 'required|exists:mapels,id',
            'day'        => 'required|in:senin,selasa,rabu,kamis,jumat',
            'start_time' => 'nullable|integer',
            'end_time'   => 'nullable|integer',
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($validated);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui!');
    }


    public function destroy(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus!');
    }
}
