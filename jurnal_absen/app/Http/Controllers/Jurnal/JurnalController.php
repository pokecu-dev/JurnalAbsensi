<?php

namespace App\Http\Controllers\Jurnal;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\DetailJurnal;
use App\Models\Jadwal;
use App\Models\Jurnal;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class JurnalController extends Controller
{

    public function form()
    {

        // Carbon::setTestNow('2026-09-18 13:00:00');
        Carbon::setTestNow('2026-09-25 13:00:00');

        $jadwal = Jadwal::GetJadwalBy(auth()->id(), 1, ['teacher', 'classes.siswas', 'mapel']);
        // return response()->json($jadwal);
        return view('guru.jurnal', compact('jadwal'));
    }

    public function index()
    {
        return response()->json([
            'alo' => 'iyah',
            'data' => Jurnal::with(['teacher', 'kelas.siswas', 'mapel'])->get()
            // 'data' => Jadwal::with('teacher')->get()
        ]);
    }

    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'jadwal_id' => ['required', 'integer', 'exists:jadwals,id'],


            'status_kehadiran' => [
                'required',
                Rule::in([
                    'hadir',
                    'tidak_hadir_tugas',
                    'tidak_hadir_tanpa_tugas',
                ]),
            ],

            'materi' => [
                'nullable',
                'string',
                'required_if:status_kehadiran,hadir',
            ],

            'keterangan' => [
                'nullable',
                'string',
            ],

            'instruksi_tugas' => [
                'nullable',
                'string',
                'required_if:status_kehadiran,tidak_hadir_tugas',
            ],

            'alasan_kosong' => [
                'nullable',
                'string',
                'required_if:status_kehadiran,tidak_hadir_tanpa_tugas',
            ],

            'absensi' => [
                'required',
                'array',
                'min:1',
            ],

            'absensi.*' => [
                'required',
                Rule::in([
                    'hadir',
                    'sakit',
                    'izin',
                    'alpha',
                    'dispen',
                ]),
            ],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 422);
        }

        $validated = $validator->validated();

        // jadwalll ygyyy

        $jadwal = Jadwal::query()
            ->where('id', $validated['jadwal_id'])
            ->where('teacher_id', auth()->id())
            ->first();

        if (!$jadwal) {
            return response()->json([
                'status' => 'error',
                'message' => 'Jadwal tidak ditemukan atau bukan milik guru yang login.',
            ], 403);
        }

        // siswa 

        $absensi = $validated['absensi'];

        $studentIds = array_map(
            'intval',
            array_keys($absensi)
        );

        $classStudentIds = Siswa::query()
            ->where('class_id', $jadwal->class_id)
            ->pluck('id')
            ->map(fn($id) => (int) $id)
            ->all();

        // chdeck

        $missingStudentIds = array_values(
            array_diff($classStudentIds, $studentIds)
        );

        $invalidStudentIds = array_values(
            array_diff($studentIds, $classStudentIds)
        );


        if (!empty($invalidStudentIds)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terdapat siswa yang bukan bagian dari kelas jadwal ini.',
                'invalid_siswa_id' => $invalidStudentIds,
            ], 422);
        }

        if (!empty($missingStudentIds)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Absensi harus mencakup seluruh siswa di kelas.',
                'missing_siswa_id' => $missingStudentIds,
            ], 422);
        }

        // status gury
        $guruStatus = match ($validated['status_kehadiran']) {
            'hadir' => 'hadir',
            'tidak_hadir_tugas' => 'tidak-ada_tugas',
            'tidak_hadir_tanpa_tugas' => 'tidak-tanpa_tugas',
        };


        // siapin data jurnal
        $jurnalData = [
            'id_jadwal' => $jadwal->id,
            'teacher_id' => auth()->id(),
            'class_id' => $jadwal->class_id,
            'mapel_id' => $jadwal->mapel_id,
            'start_time' => $jadwal->start_time,
            'end_time' => $jadwal->end_time,
            'tgl' => now()->toDateString(),
            'materi' => $validated['materi'] ?? null,
            'catatan' => $validated['keterangan'] ?? null,
            'guru' => $guruStatus,
            'status' => 'pending',
            'foto' => null,
            'instruksi_tugas' => $validated['instruksi_tugas'] ?? null,
            'alasan_kosong' => $validated['alasan_kosong'] ?? null,
        ];

        // utama ygy

        try {
            $jurnal = DB::transaction(function () use (
                $jurnalData,
                $absensi
            ) {
                $jurnal = Jurnal::create($jurnalData);

                $now = now();

                $detailData = collect($absensi)
                    ->map(function ($status, $siswaId) use ($jurnal, $now) {
                        return [
                            'jurnal_id' => $jurnal->id,
                            'siswa_id' => (int) $siswaId,
                            'status' => $status,
                            'created_at' => $now,
                            'updated_at' => $now,
                        ];
                    })
                    ->values()
                    ->all();

                DetailJurnal::upsert(
                    $detailData,
                    ['jurnal_id', 'siswa_id'],
                    [
                        'status',
                        'updated_at',
                    ]
                );

                return $jurnal;
            });
        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'status' => 'error',
                'message' => 'Jurnal gagal disimpan.',
            ], 500);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Jurnal dan absensi berhasil disimpan.',
            'data' => [
                'jurnal_id' => $jurnal->id,
                'jumlah_siswa' => count($absensi),
            ],
        ]);
    }

    public function updateJurnal(Request $request, Jurnal $jurnal)
    {
        $this->authorize('update', $jurnal);

        $validator = Validator::make($request->all(), [
            'status_kehadiran' => [
                'required',
                Rule::in([
                    'hadir',
                    'tidak_hadir_tugas',
                    'tidak_hadir_tanpa_tugas',
                ]),
            ],

            'materi' => [
                'nullable',
                'string',
                'required_if:status_kehadiran,hadir',
            ],

            'keterangan' => [
                'nullable',
                'string',
            ],

            'instruksi_tugas' => [
                'nullable',
                'string',
                'required_if:status_kehadiran,tidak_hadir_tugas',
            ],

            'alasan_kosong' => [
                'nullable',
                'string',
                'required_if:status_kehadiran,tidak_hadir_tanpa_tugas',
            ],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 422);
        }

        $validated = $validator->validated();

        $guruStatus = match ($validated['status_kehadiran']) {
            'hadir' => 'hadir',
            'tidak_hadir_tugas' => 'tidak-ada_tugas',
            'tidak_hadir_tanpa_tugas' => 'tidak-tanpa_tugas',
        };

        $instruksiTugas = $validated['instruksi_tugas'] ?? null;
        $alasanKosong = $validated['alasan_kosong'] ?? null;

        if ($validated['status_kehadiran'] !== 'tidak_hadir_tugas') {
            $instruksiTugas = null;
        }

        if ($validated['status_kehadiran'] !== 'tidak_hadir_tanpa_tugas') {
            $alasanKosong = null;
        }

        $jurnal->update([
            'materi' => $validated['materi'] ?? null,
            'catatan' => $validated['keterangan'] ?? null,
            'instruksi_tugas' => $instruksiTugas,
            'alasan_kosong' => $alasanKosong,
            'guru' => $guruStatus,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Jurnal berhasil diperbarui.',
        ]);
    }

    public function updateDetail(Request $request, DetailJurnal $detailJurnal)
    {
        $this->authorize('update', $detailJurnal);

        $validator = Validator::make($request->all(), [
            'status' => ['required', Rule::in('hadir','dispen', 'izin', 'sakit', 'alpha')],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ]);
        }

        $validated = $validator->validated();

        $detailJurnal->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'selese'
        ]);
    }

    public function deleteJurnal(Jurnal $jurnal)
    {

        $this->authorize('delete', $jurnal);

        $jurnal->delete();

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function deleteDetail(DetailJurnal $detailJurnal)
    {
        $this->authorize('delete', $detailJurnal);
        $detailJurnal->delete();

        return response()->json([
            'status' => 'success'
        ]);
    }
}
