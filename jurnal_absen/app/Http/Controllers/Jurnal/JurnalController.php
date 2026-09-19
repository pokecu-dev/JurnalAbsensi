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

use function Pest\Laravel\delete;

class JurnalController extends Controller
{
    public function index() {
        return response()->json([
            'data' => Jurnal::with(['teacher', 'kelas', 'mapel'])->get()
            // 'data' => Jadwal::with('teacher')->get()
        ]);
    }

    public function create(Request $request){

        $jadwalGuru = Jadwal::GetJadwalBy($request->id_guru,1);

        if(!$jadwalGuru){
            return response()->json([
                'status' => 'error',
                'message' => 'jadwal dengan id tersebut tidak ditemukan'
            ]);
        }
        
        $request->merge([
            'tgl' => $request->tgl ?? now()->format('Y-m-d H:i:s'),
            'catatan' => $request->catatan ?? "kosong",
            'status' => $request->status ?? 'pending',
        ]);

        $validator = Validator::make($request->all(),[
            'tgl' => ['required'],
            'id_jadwal' => ['required',Rule::in($jadwalGuru->id)],
            'materi' => ['required','string'],
            'catatan' => ['required'],
            'guru' => ['required'],
            'status' => ['required'],
            'foto' => ['nullable'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ]);
        }

        $validated = $validator->validated();
    

        Jurnal::create($validated);

        return response()->json([
            'status' => 'success',
            'data' => $validated
        ]);
        
    }

    public function AddDetail(Request $request) {
        $validator = Validator::make($request->all(),[
            'jurnal_id' => ['required','numeric'],
            'siswa_id' => ['required','numeric'],
            'status' => ['required',Rule::in('dispen','izin','sakit','alpha')],
            'catatan' => ['required','string'],
            'foto' => ['nullable']
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ]);
        }

        $jurnal = Jurnal::with('jadwal')->where('id',$request->jurnal_id)->first();

        // $classesCheck = Siswa::where('class_id',$jurnal->);
        $dataIfExist = DB::table('detail_jurnals')->where('jurnal_id',$request->jurnal_id)->where('siswa_id',$request->siswa_id)->exists();

        if($dataIfExist){
            return response()->json([
                'status' => 'error',
                'message' => 'siswa sudah ada di jurnal woe>:('
            ]);
        }

        $validated = $validator->validated();


        // DetailJurnal::create($validated);

        return response()->json([
            'status' => 'success',
            // 'message' => 'siswa berhasil di tambhkan'
            'tes' => $jurnal
        ]);

    }

    public function updateJurnal(Request $request,Jurnal $jurnal) {

        $validator = Validator::make($request->all(),[
            'materi' => ['required','string'],
            'catatan' => ['required'],
            'guru' => ['required'],
            'status' => ['required'],
            'foto' => ['nullable'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ]);
        }

        $validated = $validator->validated();
        if(empty($validated['foto'])){
            unset($validated['foto']);
        }

        $jurnal->update($validated);

        return response()->json([
            'status' => 'success'
        ]);

    }

    public function updateDetail(Request $request, DetailJurnal $detailJurnal){
        $validator = Validator::make($request->all(),[
            'status' => ['required',Rule::in('dispen','izin','sakit','alpha')],
            'catatan' => ['required','string'],
            'foto' => ['nullable'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ]);
        }

        $validated = $validator->validated();
        if(empty($validated['foto'])){
            unset($validated['foto']);
        }

        $detailJurnal->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'selese'
        ]);

    }

    public function deleteJurnal(Jurnal $jurnal) {
        $jurnal->delete();

        return response()->json([
            'status' => 'success'
        ]);
        
    }

    public function deleteDetail(DetailJurnal $detailJurnal){
        $detailJurnal->delete();

        return response()->json([
            'status' => 'success'
        ]);
    }
}
