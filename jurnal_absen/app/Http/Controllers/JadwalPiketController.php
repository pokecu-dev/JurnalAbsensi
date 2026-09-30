<?php

namespace App\Http\Controllers;

use App\Models\JadwalPiket;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JadwalPiketController extends Controller
{
    public function check(Request $request): JsonResponse
    {
        return response()->json([
            'is_piket_time' => JadwalPiket::GetJadwalPiketBy((int) $request->user()->id, 1),
        ]);
    }
}
