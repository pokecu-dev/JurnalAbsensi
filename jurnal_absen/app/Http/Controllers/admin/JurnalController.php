<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Jurnal;
use Illuminate\Http\Request;

class JurnalController extends Controller
{
    public function form()
    {
        $jurnal = Jurnal::all();

        // return view()
        return view('admin.jurnal', compact('jurnal'));
    }
}
