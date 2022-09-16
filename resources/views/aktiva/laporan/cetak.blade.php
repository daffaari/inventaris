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
<title>Cetak Laporan Aktiva</title>
<table class="table table-striped table-bordered table-responsive" id="data">
    <thead>
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Jenis Aktiva</th>
            <th scope="col" class="text-center">Nama</th>
            <th scope="col" class="text-center">Tanggal Perolehan</th>
            <th scope="col" class="text-center">Harga Perolehan</th>
            <th scope="col" class="text-center">Umur Teknis</th>
            <th scope="col" class="text-center" width="10%">Penghapusan</th>
            <th scope="col" class="text-center">Akumulasi Penyusutan</th>
            <th scope="col" class="text-center">Penyusutan (dalam bulan)</th>
            <th scope="col" class="text-center">Jumlah Penyusutan</th>
            <th scope="col" class="text-center">Nilai Buku</th>
            <th scope="col" class="text-center">Keterangan</th>

        </tr>
    </thead>
    <tbody>
        @if (!empty($laporanAktiva))
            @foreach ($laporanAktiva as $data)
                <tr>
                    <td class="text-center">
                        {{ $loop->iteration }}</td>
                    <td class="text-center">
                        {{ \App\Models\Aktiva::find($data->aktiva_id)['nama'] }}
                    </td>
                    <td class="text-center">{{ $data->nama }}</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($data->tgl_perolehan)->format('F Y') }}</td>
                    <td class="text-center">Rp. {{ number_format($data->harga_perolehan) }}
                    </td>
                    <td class="text-center">{{ $data->umur_teknis }}</td>
                    <td class="text-center">{{ $data->penghapusan }}%</td>
                    <td class="text-center">Rp. {{ number_format($data->ak_penyusutan) }}</td>
                    <td class="text-center">Rp. {{ number_format($data->penyusutan_bln) }}</td>
                    <td class="text-center">Rp. {{ number_format($data->jml_penyu_bln) }}</td>
                    <td class="text-center">Rp. {{ number_format($data->nilai_buku) }}</td>
                    <td class="text-center">{{ $data->keterangan }}</td>

                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="12" class="text-center">Data tidak ditemukan</td>
            </tr>
        @endif
    </tbody>
</table>


<script>
    window.print();
</script>
