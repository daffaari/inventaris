<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
<title>Halaman Cetak</title>
<table style="width:100%">
    <thead>
        <tr>

            <th scope="col" class="text-center">Jenis</th>
            <th scope="col" class="text-center">Jumlah Harga Perolehan</th>
            <th scope="col" class="text-center">Akumulasi Penyusutan</th>
            <th scope="col" class="text-center">Penyusutan (dlm bulan berjalan)</th>
            <th scope="col" class="text-center">Jumlah Penyusutan (sampai bln berjalan)</th>
            <th scope="col" class="text-center">Nilai Buku</th>

        </tr>
        <tr>
        <tr>
            <th class="text-left">Aktiva Tetap</th>
        </tr>
        </tr>

    </thead>
    <tbody>
        @if (!empty($laporanAktiva))
            @foreach ($laporanAktiva as $data)
                <tr>

                    <td class="text-center">
                        {{ \App\Models\Aktiva::find($data->aktiva_id)['nama'] }}
                    </td>

                    <td class="text-center">Rp. {{ number_format($data->harga_perolehan) }}</td>
                    <td class="text-center">Rp. {{ number_format($data->akumulasi_penyusutan) }}
                    </td>
                    <td class="text-center">Rp. {{ number_format($data->penyusutan_bulan) }}
                    </td>
                    <td class="text-center">Rp.
                        {{ number_format($data->akumulasi_penyusutan + $data->penyusutan_bulan) }}
                    </td>
                    <td class="text-center">Rp.
                        {{ number_format($data->harga_perolehan - $data->jml_penyusutan_bln) }}
                    </td>



                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="12" class="text-center">Data tidak ditemukan</td>
            </tr>
        @endif
    <tbody>
        @foreach ($resultAktiva as $a)
            <tr>
                <td>

                    <b> Total Aktiva Tetap</b>

                <td class="text-center"> <b> Rp. {{ number_format($a->hrg_perolehan) }} </b>
                </td>
                <td class="text-center"> <b> Rp. {{ number_format($a->akumulasi_penyusutan) }}
                    </b></td>
                <td class="text-center"> <b> Rp. {{ number_format($a->penyusutan_bulan) }} </b>
                </td>
                <td class="text-center"> <b> Rp. {{ number_format($a->jml_penyusutan_bln) }}
                    </b></td>
                <td class="text-center"> <b> Rp. {{ number_format($a->nl_buku) }} </b></td>

                </td>
            </tr>

            <tr>
                <td>
                    <b>Inventaris</b>
                </td>
            </tr>
        @endforeach
    </tbody>

    </tbody>
    <tbody>
        @if (!empty($laporanInventaris))
            @foreach ($laporanInventaris as $data)
                <tr>

                    <td class="text-center">
                        {{ \App\Models\Inventaris::find($data->inventaris_id)['nama'] }}
                    </td>

                    <td class="text-center">Rp. {{ number_format($data->jml_hrg_perolehan) }}
                    </td>
                    <td class="text-center">Rp.
                        {{ number_format($data->akm_penyusutan) }}
                    </td>
                    <td class="text-center">Rp. {{ number_format($data->penyusutan_bln) }}
                    </td>
                    <td class="text-center">Rp.
                        {{ number_format($data->akm_penyusutan + $data->jml_penyusutan_inv) }}
                    </td>
                    <td class="text-center">Rp.
                        {{ number_format($data->jml_hrg_perolehan - $data->nl_buku_inv) }}
                    </td>



                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="12" class="text-center">Data tidak ditemukan</td>
            </tr>
        @endif
    <tbody>
        @foreach ($resultInventaris as $a)
            <tr>
                <td>

                    <b> Total Inventaris</b>

                <td class="text-center"> <b> Rp. {{ number_format($a->jml_hrg_perolehan) }}
                    </b>
                </td>
                <td class="text-center"> <b> Rp. {{ number_format($a->akm_penyusutan) }}
                    </b></td>
                <td class="text-center"> <b> Rp. {{ number_format($a->penyusutan_bln_inv) }}
                    </b>
                </td>
                <td class="text-center"> <b> Rp. {{ number_format($a->jml_penyusutan_inv) }}
                    </b></td>
                <td class="text-center"> <b> Rp. {{ number_format($a->nl_buku_inv) }} </b></td>

                </td>
            </tr>
        @endforeach
        <tr>
            <td><b>Total Aktiva Tetap & Inventaris</b></td>
            <td><b>Rp. {{ number_format($sumAktiva->harga_peroleh + $sumInventaris->jml_hrg_perolehan) }}</b></td>
            <td><b>Rp. {{ number_format($sumAktiva->ak_penyusutan + $sumInventaris->akm_penyusutan) }}</b></td>
            <td><b>Rp. {{ number_format($sumAktiva->penyusutan_bln + $sumInventaris->penyusutan_bln_inv) }}</b></td>
            <td><b>Rp. {{ number_format($sumAktiva->jml_penyu_bln + $sumInventaris->jml_penyusutan_inv) }}</b></td>
            <td><b>Rp. {{ number_format($sumAktiva->nilai_buku + $sumInventaris->nl_buku_inv) }}</b></td>

        </tr>
    </tbody>

    </tbody>


</table>
