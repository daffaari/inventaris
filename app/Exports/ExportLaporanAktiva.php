<?php

namespace App\Exports;

use App\Models\LaporanAktiva;
use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use DB;

class ExportLaporanAktiva implements FromView, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {

        $aktiva = LaporanAktiva::all();
        return view('aktiva.laporan.excel', ['aktiva' => $aktiva]);
    }
}
