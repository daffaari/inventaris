<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    pj {
        float: right;
    }
</style>
<script src="https://cdn.tailwindcss.com"></script>
<title>Halaman Cetak</title>
<table style="width: 100%">
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
            <th class="text-center"> Aktiva Tetap</th>
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
                    <td class="text-center">Rp. {{ number_format($data->penyu_bln) }}
                    </td>
                    <td class="text-center">Rp.
                        {{ number_format($data->jml_penyusutan_bln) }}
                    </td>
                    <td class="text-center">Rp.
                        {{ number_format($data->nilai_buku) }}
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
                    <td class="text-center">Rp. {{ number_format($data->penyusutan_bln_inv) }}
                    </td>
                    <td class="text-center">Rp.
                        {{ number_format($data->jml_penyusutan_inv) }}
                    </td>
                    <td class="text-center">Rp.
                        {{ number_format($data->nl_buku_inv) }}
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
    </tbody>

    </tbody>


</table>
<div class="float-right my-3 mx-2">
    <p> <b> Ambon , {{ Carbon\Carbon::now()->format('d-m-Y') }} </b></p>
    <br>
    <p class="my-12"><b>{{ $pj }}</b> </p>

</div>

<script>
    // window.print();
</script>
