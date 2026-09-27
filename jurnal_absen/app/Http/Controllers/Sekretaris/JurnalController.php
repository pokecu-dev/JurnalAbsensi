<?php

namespace App\Http\Controllers\Sekretaris;

use App\Http\Controllers\Controller;
use App\Models\Jurnal;
use Illuminate\Http\Request;

class JurnalController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');

        $jurnals = Jurnal::query()
            ->with(['kelas', 'jadwal.mapel', 'jadwal.teacher','detailJurnal'])
            ->when($request->has('status'), function ($query) use ($status) {
                if (! in_array($status, ['pending', 'approved', 'rejected'])) {
                    $status = null;
                }
                $query->where('status', $status);
            })
            ->latest('tgl')
            ->latest('id')
            ->get();

        return view('sekre.jurnal.index', compact('jurnals', 'status'));
    }

    public function show(Jurnal $jurnal)
    {
        $jurnal->load(['kelas', 'jadwal.mapel', 'jadwal.teacher', 'detailJurnal']);

        // return response()->json([
        //     $jurnal->detailJurnal
        // ]);

        return view('sekre.jurnal.show', compact('jurnal'));
    }

    public function approve(Jurnal $jurnal)
    {
        abort_unless($jurnal->status === 'pending', 400, 'Hanya jurnal berstatus menunggu yang dapat divalidasi.');

        $jurnal->update(['status' => 'approved']);

        return redirect()
            ->route('sekre.status-validasi')
            ->with('success', 'Jurnal berhasil tervalidasi.');
    }

    public function reject(Request $request, Jurnal $jurnal)
    {
        abort_unless($jurnal->status === 'pending', 400, 'Hanya jurnal berstatus menunggu yang dapat ditolak.');

        $validated = $request->validate([
            'alasan_validasi' => ['nullable', 'string', 'max:255'],
        ]);

        $jurnal->update([
            'status' => 'rejected',
            'alasan_validasi' => $validated['alasan_validasi'] ?? null,
        ]);

        return redirect()
            ->route('sekre.jurnal.show', $jurnal)
            ->with('success', 'Jurnal dikembalikan ke guru untuk diperbaiki.');
    }
}