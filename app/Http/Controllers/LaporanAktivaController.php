<?php

namespace App\Http\Controllers;

use App\Models\LaporanAktiva;
use Illuminate\Http\Request;

use DB;

class LaporanAktivaController extends Controller
{
    public function index()
    {
        $aktiva = LaporanAktiva::all();
        return view('aktiva.laporan.index', ['aktiva' => $aktiva]);
    }
}
