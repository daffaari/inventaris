<?php

namespace App\Exports;

use App\Models\LaporanInventaris;
use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use DB;


class ExportLaporanInventaris implements FromView, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {

        $inventaris = LaporanInventaris::all();
        return view('inventaris.laporan.excel', ['inventaris' => $inventaris]);
    }
}
