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

        if (! in_array($status, ['pending', 'approved', 'rejected'], true)) {
            $status = null;
        }

        $jurnals = Jurnal::query()
            ->with(['kelas', 'jadwal.mapel', 'jadwal.teacher', 'detailJurnal'])
            ->when($status, fn ($query) => $query->where('status', $status))
            ->orderByRaw("case when status = 'pending' then 0 when status = 'rejected' then 1 else 2 end")
            ->latest('tgl')
            ->latest('id')
            ->get();

        return view('sekre.jurnal.index', compact('jurnals', 'status'));
    }

    public function show(Jurnal $jurnal)
    {
        $jurnal->load(['kelas', 'mapel', 'jadwal.mapel', 'jadwal.teacher', 'detailJurnal.siswa']);

        return view('sekre.jurnal.show', compact('jurnal'));
    }

    public function kirim(Request $request, Jurnal $jurnal)
    {
        abort_unless($jurnal->status === 'pending', 400, 'Jurnal ini sudah dikirim ke Kurikulum.');

        $validated = $request->validate([
            'catatan_sekre' => ['nullable', 'string', 'max:1000'],
        ]);

        $jurnal->update([
            'status' => 'approved',
            'catatan_sekre' => $validated['catatan_sekre'] ?? $jurnal->catatan_sekre,
        ]);

        return redirect()
            ->route('sekre.jurnal.index')
            ->with('success', 'Jurnal berhasil dikirim ke Kurikulum.');
    }
}
