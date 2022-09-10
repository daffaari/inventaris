<?php

namespace App\Http\Controllers\Inventaris;

use App\Http\Controllers\Controller;
use App\Models\Inventaris;
use Illuminate\Http\Request;

use DB;

class InventarisController extends Controller
{
    public function index()
    {
        $inventaris = Inventaris::all();
        //$aktiva = LaporanAktiva::all();
        return view(
            'inventaris.index',
            [
                'inventaris' => $inventaris,
                // 'dataAktiva' => $dataAktiva
            ]
        );
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



        $simpanData = new Inventaris();

        $orderData = DB::table('inventaris')
            ->orderByDesc('kode')
            ->limit(1)
            ->get();

        $kode = "";
        if (count($orderData) == 0) {
            $kode = 0;
        } else {
            $kode = str_replace("INV", "", $orderData[0]->kode);
            $kode = (int) $kode;
        }

        $simpanData->kode = 'INV' . sprintf("%04s", $kode + 1);

        $simpanData->nama = $request->nama;
        $simpanData->save();

        return redirect('/data-inventaris')->with('message', 'Sukses Menyimpan Data');
    }

    public function update($id, Request $request)
    {
        $data = Inventaris::find($id);
        $data->update($request->all());

        return redirect('/data-inventaris')->with('info', 'Sukses Mengupdate Data');
    }

    public function delete($id)
    {
        $data = Inventaris::destroy($id);
        return back()->with('info', 'Sukses Menghapus Data');
    }
}
