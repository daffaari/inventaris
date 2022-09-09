<?php

namespace App\Http\Controllers;

use App\Models\Aktiva;
use Illuminate\Http\Request;

use DB;

class AktivaController extends Controller
{
    public function index()
    {
        $aktiva = Aktiva::all();
        return view('aktiva.index', ['aktiva' => $aktiva]);
    }

    public function tambah()
    {
        return view('aktiva.tambah');
    }

    public function simpan(Request $request)
    {
        $validatedData = $request->validate(
            [
                'nama' => 'required',
            ],
            [

                'nama.required' => 'kolom nama tidak boleh kosong' // custom message
            ]
        );;



        $simpanData = new Aktiva();

        $orderData = DB::table('aktiva')
            ->orderByDesc('kode')
            ->limit(1)
            ->get();

        $kode = "";
        if (count($orderData) == 0) {
            $kode = 0;
        } else {
            $kode = str_replace("AKT", "", $orderData[0]->kode);
            $kode = (int) $kode;
        }

        $simpanData->kode = 'AKT' . sprintf("%04s", $kode + 1);

        $simpanData->nama = $request->nama;
        $simpanData->save();

        return redirect('/data-aktiva')->with('message', 'Sukses Menyimpan Data');
    }

    public function edit($id, Request $request)
    {
        Aktiva::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'nama' => $request->name,
            ],
            [
                'kode' => $request->kode
            ]
        );

        return response()->json(['success' => true]);
    }
}
