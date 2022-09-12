<table>
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
        @if (!empty($aktiva))
            @foreach ($aktiva as $data)
                <tr>
                    <td class="text-center">
                        {{ $loop->iteration }}</td>
                    <td class="text-center">
                        {{ \App\Models\Aktiva::find($data->aktiva_id)['nama'] }}
                    </td>
                    <td class="text-center">{{ $data->nama }}</td>
                    <td class="text-center">{{ $data->tgl_perolehan }}</td>
                    <td class="text-center">Rp. {{ number_format($data->harga_perolehan) }}
                    </td>
                    <td class="text-center">{{ $data->umur_teknis }} bln</td>
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
                <td colspan="5" class="text-center">Data tidak ditemukan</td>
            </tr>
        @endif
    </tbody>
</table>
