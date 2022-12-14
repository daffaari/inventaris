<?php

namespace App\Http\Controllers\Aktiva;

use App\Exports\ExportLaporanAktiva;
use App\Http\Controllers\Controller;
use App\Models\Aktiva;
use App\Models\LaporanAktiva;
use Carbon\Carbon;
use Illuminate\Http\Request;

use DB;
use Maatwebsite\Excel\Facades\Excel;

class LaporanAktivaController extends Controller
{
    public function index()
    {
        $dataAktiva = Aktiva::all();
        $aktiva = LaporanAktiva::all();
        return view(
            'aktiva.laporan.index',
            [
                'aktiva' => $aktiva,
                'dataAktiva' => $dataAktiva
            ]
        );
    }

    public function tambah()
    {
        $dataAktiva = DB::table('aktiva')
            ->leftJoin('laporan_aktiva', 'laporan_aktiva.aktiva_id', '=', 'aktiva.id')
            ->select('aktiva.*', 'laporan_aktiva.aktiva_id as id_aktiva')
            ->get();

        $aktiva = Aktiva::all();
        return view('aktiva.laporan.tambah', [
            // 'dataAktiva' => $dataAktiva,
            'aktiva' => $aktiva
        ]);
    }

    public function simpan(Request $request)
    {
        $validatedData = $request->validate(
            [
                'aktiva_id' => 'required',
                'nama' => 'required',
                //'tgl_perolehan' => 'required',
                'harga_perolehan' => 'required',
                // 'umur_teknis' => 'required',
                // 'penghapusan' => 'required',
                'ak_penyusutan' => 'required',
                'penyusutan_bln' => 'required',
                'jml_penyu_bln' => 'required',
                'nilai_buku' => 'required',
                // 'keterangan' => 'required',
            ],
            [

                'aktiva_id.required' => 'kolom jenis aktiva tidak boleh kosong',
                'nama.required' => 'kolom nama tidak boleh kosong',
                'tgl_perolehan.required' => 'kolom tanggal perolehan tidak boleh kosong',
                'harga_perolehan.required' => 'kolom harga perolehan tidak boleh kosong',
                'umur_teknis.required' => 'kolom umur teknis tidak boleh kosong',
                'penghapusan.required' => 'kolom penghapusan tidak boleh kosong',
                'ak_penyusutan.required' => 'kolom angka penyusutan tidak boleh kosong',
                'penyusutan_bln.required' => 'kolom penyusutan (dlm bln) tidak boleh kosong',
                'jml_penyu_bln.required' => 'kolom jumlah penyusutan (dlm bln) tidak boleh kosong',
                'nilai_buku.required' => 'kolom nilai buku tidak boleh kosong',
                'keterangan.required' => 'kolom keterangan tidak boleh kosong',
            ]
        );;



        $simpanData = new LaporanAktiva();

        $simpanData->aktiva_id = $request->aktiva_id;
        $simpanData->nama = $request->nama;
        $simpanData->tgl_perolehan = $request->tgl_perolehan . '-01 00:00:00';
        $simpanData->harga_perolehan = $request->harga_perolehan;
        $simpanData->umur_teknis = $request->umur_teknis;
        $simpanData->penghapusan = $request->penghapusan;
        $simpanData->ak_penyusutan = $request->ak_penyusutan;
        $simpanData->penyusutan_bln = $request->penyusutan_bln;
        $simpanData->jml_penyu_bln = $request->jml_penyu_bln;
        $simpanData->nilai_buku = $request->nilai_buku;
        $simpanData->keterangan = $request->keterangan;

        $simpanData->save();

        return redirect('/laporan-aktiva')->with('message', 'Sukses Menyimpan Data')->withInput();
    }

    public function edit($id, Request $request)
    {
        $dataAktiva = Aktiva::all();
        $data = LaporanAktiva::find($id);
        return view('aktiva.laporan.edit', [
            'data' => $data,
            'dataAktiva' => $dataAktiva
        ]);
    }

    public function update($id, Request $request)
    {
        $laporan = LaporanAktiva::find($id);

        $laporan->aktiva_id = $request->aktiva_id;
        $laporan->nama = $request->nama;
        $laporan->tgl_perolehan = $request->tgl_perolehan . '-01 00:00:00';
        $laporan->harga_perolehan = $request->harga_perolehan;
        $laporan->umur_teknis = $request->umur_teknis;
        $laporan->penghapusan = $request->penghapusan;
        $laporan->ak_penyusutan = $request->ak_penyusutan;
        $laporan->penyusutan_bln = $request->penyusutan_bln;
        $laporan->jml_penyu_bln = $request->jml_penyu_bln;
        $laporan->nilai_buku = $request->nilai_buku;
        $laporan->keterangan = $request->keterangan;

        // dd($laporan);
        // die;
        $laporan->save();


        return redirect('/laporan-aktiva')->with('info', 'Sukses Mengupdate Data');
    }

    public function delete($id)
    {
        $data = LaporanAktiva::destroy($id);
        return back()->with('info', 'Sukses Menghapus Data');
    }

    public function export(Request $request)
    {
        $date = Carbon::now();
        $date = date('Y-m-d');
        return Excel::download(new ExportLaporanAktiva, 'laporan-aktiva-' . $date . '.xlsx');
    }

    public function cetak(Request $request)
    {
        $month = $request->tgl_perolehan;
        $startDate = request()->input('startDate');
        $startDate = $startDate . " 00:00";
        $endDate   = request()->input('endDate');
        $endDate = $endDate . " 23:59";
        $laporanAktiva = DB::table('laporan_aktiva')
            ->select()
            ->where('tgl_perolehan', 'LIKE', '%' . $month . '%')
            ->get();
        return view('aktiva.laporan.cetak', ['laporanAktiva' => $laporanAktiva]);
    }
}
