<?php

namespace App\Http\Controllers;

use App\Models\Dispen;
use App\Models\Siswa;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DispenController extends Controller
{
    public function index()
    {
        $dispens = Dispen::with(['siswa', 'kelas', 'approver'])
            ->latest()
            ->paginate(10);

        return view('dispen.index', compact('dispens'));
    }

    public function create()
    {
        $siswas = Siswa::all();
        $classes = Classes::all();
        $kategori = ['osis', 'lomba', 'sakit', 'pribadi', 'lainnya'];

        return view('dispen.create', compact('siswas', 'classes', 'kategori'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'class_id' => 'required|exists:classes,id',
            'kategori' => ['required', Rule::in(['osis', 'lomba', 'sakit', 'pribadi', 'lainnya'])],
            'alasan' => 'required|string',
            'tgl' => 'required|date',
            'jam_mulai' => 'nullable|date_format:H:i',
            'jam_selesai' => 'nullable|date_format:H:i|after_or_equal:jam_mulai',
        ]);

        $validated['status'] = 'pending';

        Dispen::create($validated);

        return redirect()->route('dispen.index')->with('success', 'Pengajuan dispensasi berhasil dibuat.');
    }

    public function show(Dispen $dispen)
    {
        $dispen->load(['siswa', 'kelas', 'approver']);
        return view('dispen.show', compact('dispen'));
    }

    public function edit(Dispen $dispen)
    {
        $siswas = Siswa::all();
        $classes = Classes::all();
        $kategori = ['osis', 'lomba', 'sakit', 'pribadi', 'lainnya'];

        return view('dispen.edit', compact('dispen', 'siswas', 'classes', 'kategori'));
    }

    public function update(Request $request, Dispen $dispen)
    {
        $validated = $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'class_id' => 'required|exists:classes,id',
            'kategori' => ['required', Rule::in(['osis', 'lomba', 'sakit', 'pribadi', 'lainnya'])],
            'alasan' => 'required|string',
            'tgl' => 'required|date',
            'jam_mulai' => 'nullable',
            'jam_selesai' => 'nullable',
        ]);

        $dispen->update($validated);

        return redirect()->route('dispen.index')->with('success', 'Data dispensasi berhasil diperbarui.');
    }

    public function destroy(Dispen $dispen)
    {
        $dispen->delete();
        return redirect()->route('dispen.index')->with('success', 'Data dispensasi berhasil dihapus.');
    }

    public function updateStatus(Request $request, Dispen $dispen)
    {
        $request->validate([
            'status' => ['required', Rule::in(['approved', 'rejected'])],
        ]);

        $dispen->update([
            'status'      => $request->status,
            'approved_by' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Status dispensasi berhasil diperbarui.');
    }
}