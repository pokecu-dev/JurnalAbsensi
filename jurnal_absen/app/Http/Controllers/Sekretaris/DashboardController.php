<?php

namespace App\Http\Controllers\Sekretaris;

use App\Http\Controllers\Controller;
use App\Models\Jurnal;

class DashboardController extends Controller
{
    public function index()
    {
        $jurnalTerakhir = Jurnal::query()
            ->with(['kelas', 'mapel', 'teacher', 'jadwal'])
            ->latest('created_at')
            ->first();

        $antrean = Jurnal::query()
            ->with(['kelas', 'mapel', 'teacher', 'jadwal'])
            ->whereIn('status', ['rejected', 'pending'])
            ->orderByRaw("case when status = 'rejected' then 0 else 1 end")
            ->latest('updated_at')
            ->get();

        $jumlahMenunggu = $antrean->where('status', 'pending')->count();

        return view('sekre.dashboard', compact('jurnalTerakhir', 'antrean', 'jumlahMenunggu'));
    }
}
