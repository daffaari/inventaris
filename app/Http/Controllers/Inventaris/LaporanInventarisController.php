<?php

namespace App\Http\Controllers\Inventaris;

use App\Exports\ExportLaporanInventaris;
use App\Http\Controllers\Controller;
use App\Models\Inventaris;
use App\Models\LaporanInventaris;
use Carbon\Carbon;
use Illuminate\Http\Request;

use DB;
use Maatwebsite\Excel\Facades\Excel;

class LaporanInventarisController extends Controller
{
    public function index()
    {
        $lapInven = LaporanInventaris::all();
        //$aktiva = LaporanAktiva::all();
        return view(
            'inventaris.laporan.index',
            [
                'lapInven' => $lapInven,
                // 'dataAktiva' => $dataAktiva
            ]
        );
    }

    public function tambah()
    {
        $inv = DB::table('inventaris')
            ->leftJoin('laporan_inventaris', 'laporan_inventaris.inventaris_id', '=', 'inventaris.id')
            ->select('inventaris.*', 'laporan_inventaris.inventaris_id as id_inventaris')
            ->get();

        $inventaris = Inventaris::all();
        return view(
            'inventaris.laporan.tambah',
            [
                'inv' => $inv,
                'inventaris' => $inventaris

            ]
        );
    }

    public function simpan(Request $request)
    {
        $validatedData = $request->validate(
            [
                'inventaris_id' => 'required',
                'lokasi' => 'required',
                'kelompok' => 'required',
                // 'tgl_perolehan' => 'required',
                'banyak' => 'required',
                'harga_satuan' => 'required',
                'jml_hrg_perolehan' => 'required',
                // 'umur' => 'required',
                // 'penghapusan' => 'required',
                'akum_penyusutan' => 'required',
                'penyusutan_bln' => 'required',
                'jml_penyusutan' => 'required',
                'nilai_buku' => 'required',
                'keterangan' => 'required',
            ],
            [

                'inventaris_id.required' => 'kolom jenis inventaris tidak boleh kosong',
                'lokasi.required' => 'kolom lokasi perolehan tidak boleh kosong',
                'kelompok.required' => 'kolom kelompok tidak boleh kosong',
                'tgl_perolehan.required' => 'kolom tanggal perolehan teknis tidak boleh kosong',
                'banyak.required' => 'kolom banyak tidak boleh kosong',
                'harga_satuan.required' => 'kolom harga satuan tidak boleh kosong',
                'jml_hrg_perolehan.required' => 'kolom jumlah harga perolehan tidak boleh kosong',
                'umur.required' => 'kolom umur tidak boleh kosong',
                'penghapusan.required' => 'kolom penghapusan tidak boleh kosong',
                'akum_penyusutan.required' => 'kolom akumulasi penyusutan tidak boleh kosong',
                'penyusutan_bln.required' => 'kolom penyusutan tidak boleh kosong',
                'jml_penyusutan.required' => 'kolom jumlah penyusutan tidak boleh kosong',
                'nilai_buku.required' => 'kolom nilai buku tidak boleh kosong',
                'keterangan.required' => 'kolom keterangan tidak boleh kosong',
            ]
        );;



        $simpanData = new LaporanInventaris();

        $simpanData->inventaris_id = $request->inventaris_id;
        $simpanData->nama = $request->nama;
        $simpanData->lokasi = $request->lokasi;
        $simpanData->kelompok = $request->kelompok;
        $simpanData->tgl_perolehan = $request->tgl_perolehan . '-01 00:00:00';
        $simpanData->banyak = $request->banyak;
        $simpanData->harga_satuan = $request->harga_satuan;
        $simpanData->jml_hrg_perolehan = $request->jml_hrg_perolehan;
        $simpanData->umur = $request->umur;
        $simpanData->penghapusan = $request->penghapusan;
        $simpanData->akum_penyusutan = $request->akum_penyusutan;
        $simpanData->penyusutan_bln = $request->penyusutan_bln;
        $simpanData->jml_penyusutan = $request->jml_penyusutan;
        $simpanData->nilai_buku = $request->nilai_buku;
        $simpanData->keterangan = $request->keterangan;

        $simpanData->save();

        return redirect('/laporan-inventaris')->with('message', 'Sukses Menyimpan Data')->withInput();
    }

    public function edit($id, Request $request)
    {
        $dataInventaris = Inventaris::all();
        $data = LaporanInventaris::find($id);
        return view('inventaris.laporan.edit', [
            'data' => $data,
            'dataInventaris' => $dataInventaris
        ]);
    }

    public function update($id, Request $request)
    {
        $laporan = LaporanInventaris::find($id);

        $laporan->inventaris_id = $request->inventaris_id;
        $laporan->nama = $request->nama;
        $laporan->lokasi = $request->lokasi;
        $laporan->kelompok = $request->kelompok;
        $laporan->tgl_perolehan = $request->tgl_perolehan . '-01 00:00:00';
        $laporan->banyak = $request->banyak;
        $laporan->harga_satuan = $request->harga_satuan;
        $laporan->jml_hrg_perolehan = $request->jml_hrg_perolehan;
        $laporan->umur = $request->umur;
        $laporan->penghapusan = $request->penghapusan;
        $laporan->akum_penyusutan = $request->akum_penyusutan;
        $laporan->penyusutan_bln = $request->penyusutan_bln;
        $laporan->jml_penyusutan = $request->jml_penyusutan;
        $laporan->nilai_buku = $request->nilai_buku;
        $laporan->keterangan = $request->keterangan;

        $laporan->save();

        return redirect('/laporan-inventaris')->with('info', 'Sukses Mengupdate Data');
    }

    public function delete($id)
    {
        $data = LaporanInventaris::destroy($id);
        return back()->with('info', 'Sukses Menghapus Data');
    }

    public function export(Request $request)
    {
        $date = Carbon::now();
        $date = date('Y-m-d');
        return Excel::download(new ExportLaporanInventaris, 'laporan-inventaris-' . $date . '.xlsx');
    }

    public function cetak(Request $request)
    {
        $month = $request->tgl_perolehan;
        $startDate = request()->input('startDate');
        $startDate = $startDate . " 00:00";
        $endDate   = request()->input('endDate');
        $endDate = $endDate . " 23:59";
        $laporanInventaris = DB::table('laporan_inventaris')
            ->select()
            ->where('tgl_perolehan', 'LIKE', '%' . $month . '%')
            ->get();
        return view('inventaris.laporan.cetak', ['laporanInventaris' => $laporanInventaris]);
    }
}
