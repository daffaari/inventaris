<?php

namespace App\Http\Controllers;

use App\Models\Aktiva;
use App\Models\Inventaris;
use App\Models\LaporanAktiva;
use App\Models\LaporanInventaris;
use Illuminate\Http\Request;

use DB;

class RekapController extends Controller
{
    public function index()
    {

        $laporanAktiva = DB::table('laporan_aktiva')->select()
            ->selectRaw('sum(harga_perolehan) as harga_perolehan')
            ->selectRaw('sum(ak_penyusutan) as akumulasi_penyusutan')
            ->selectRaw('sum(penyusutan_bln) as penyusutan_bulan')
            ->selectRaw('sum(jml_penyu_bln) as jml_penyusutan_bln')
            ->selectRaw('sum(nilai_buku) as nilai_buku')
            ->groupBy('aktiva_id')
            ->get();

        $resultAktiva = DB::table('laporan_aktiva')
            ->select(DB::raw('SUM(harga_perolehan) as hrg_perolehan,
            SUM(ak_penyusutan) as akumulasi_penyusutan,
            SUM(penyusutan_bln) as penyusutan_bulan,
            SUM(jml_penyu_bln) as jml_penyusutan_bln,
            SUM(nilai_buku) as nl_buku,
            keterangan as ket '))
            ->get();

        $laporanInventaris = DB::table('laporan_inventaris')->select()
            ->selectRaw('sum(jml_hrg_perolehan) as jml_hrg_perolehan')
            ->selectRaw('sum(akum_penyusutan) as akm_penyusutan')
            ->selectRaw('sum(penyusutan_bln) as penyusutan_bln_inv')
            ->selectRaw('sum(jml_penyusutan) as jml_penyusutan_inv')
            ->selectRaw('sum(nilai_buku) as nl_buku_inv')
            ->groupBy('inventaris_id')
            ->get();

        $resultInventaris = DB::table('laporan_inventaris')
            ->select(DB::raw('SUM(jml_hrg_perolehan) as jml_hrg_perolehan,
            SUM(akum_penyusutan) as akm_penyusutan,
            SUM(penyusutan_bln) as penyusutan_bln_inv,
            SUM(jml_penyusutan) as jml_penyusutan_inv,
            SUM(nilai_buku) as nl_buku_inv,
            keterangan as ket '))
            ->get();

        $aktiva = LaporanAktiva::all();
        return view(
            'rekap.index',
            [
                'laporanAktiva' => $laporanAktiva,
                'laporanInventaris' => $laporanInventaris
            ],
            compact('resultAktiva', 'resultInventaris')

        );
    }

    public function print()
    {
        $laporanAktiva = DB::table('laporan_aktiva')->select()
            ->selectRaw('sum(harga_perolehan) as harga_perolehan')
            ->selectRaw('sum(ak_penyusutan) as akumulasi_penyusutan')
            ->selectRaw('sum(penyusutan_bln) as penyusutan_bulan')
            ->selectRaw('sum(jml_penyu_bln) as jml_penyusutan_bln')
            ->selectRaw('sum(nilai_buku) as nilai_buku')
            ->groupBy('aktiva_id')
            ->get();

        $resultAktiva = DB::table('laporan_aktiva')
            ->select(DB::raw('SUM(harga_perolehan) as hrg_perolehan,
        SUM(ak_penyusutan) as akumulasi_penyusutan,
        SUM(penyusutan_bln) as penyusutan_bulan,
        SUM(jml_penyu_bln) as jml_penyusutan_bln,
        SUM(nilai_buku) as nl_buku,
        keterangan as ket '))
            ->get();

        $laporanInventaris = DB::table('laporan_inventaris')->select()
            ->selectRaw('sum(jml_hrg_perolehan) as jml_hrg_perolehan')
            ->selectRaw('sum(akum_penyusutan) as akm_penyusutan')
            ->selectRaw('sum(penyusutan_bln) as penyusutan_bln_inv')
            ->selectRaw('sum(jml_penyusutan) as jml_penyusutan_inv')
            ->selectRaw('sum(nilai_buku) as nl_buku_inv')
            ->groupBy('inventaris_id')
            ->get();

        $resultInventaris = DB::table('laporan_inventaris')
            ->select(DB::raw('SUM(jml_hrg_perolehan) as jml_hrg_perolehan,
        SUM(akum_penyusutan) as akm_penyusutan,
        SUM(penyusutan_bln) as penyusutan_bln_inv,
        SUM(jml_penyusutan) as jml_penyusutan_inv,
        SUM(nilai_buku) as nl_buku_inv,
        keterangan as ket '))
            ->get();

        $sumAktiva = DB::table('laporan_aktiva')->select()
            ->selectRaw('sum(harga_perolehan) as harga_peroleh')
            ->selectRaw('sum(ak_penyusutan) as akumulasi_penyusutan')
            ->selectRaw('sum(penyusutan_bln) as penyusutan_bulan')
            ->selectRaw('sum(jml_penyu_bln) as jml_penyusutan_bln')
            ->selectRaw('sum(nilai_buku) as nilai_buku')
            ->first();

        $sumInventaris = DB::table('laporan_inventaris')->select()
            ->selectRaw('sum(jml_hrg_perolehan) as jml_hrg_perolehan')
            ->selectRaw('sum(akum_penyusutan) as akm_penyusutan')
            ->selectRaw('sum(penyusutan_bln) as penyusutan_bln_inv')
            ->selectRaw('sum(jml_penyusutan) as jml_penyusutan_inv')
            ->selectRaw('sum(nilai_buku) as nl_buku_inv')
            ->first();


        // $totalHargaPerolehan = $getDataAktiva->harga_perolehan + $getDataInventaris->jml_hrg_perolehan;

        $aktiva = LaporanAktiva::all();
        return view(
            'print.index',
            [
                'laporanAktiva' => $laporanAktiva,
                'laporanInventaris' => $laporanInventaris,
                'sumAktiva' => $sumAktiva,
                'sumInventaris' => $sumInventaris,


            ],
            compact('resultAktiva', 'resultInventaris')

        );
    }
}
