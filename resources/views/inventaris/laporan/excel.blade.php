<table>
    <thead>
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Jenis</th>
            <th scope="col" class="text-center">Nama</th>
            <th scope="col" class="text-center">Lokasi</th>
            <th scope="col" class="text-center">Kelompok</th>
            <th scope="col" class="text-center">Tgl Peroleh</th>
            <th scope="col" class="text-center">Banyak</th>
            <th scope="col" class="text-center">Harga Satuan</th>
            <th scope="col" class="text-center">Jml Harga Peroleh</th>
            <th scope="col" class="text-center">Umur</th>
            <th scope="col" class="text-center">Penghapusan</th>
            <th scope="col" class="text-center">Akumulasi Penyusutan</th>
            <th scope="col" class="text-center">Penyusutan (dlm bln berjalan)</th>
            <th scope="col" class="text-center">Jml Penyusutan (s/d bln berjalan)</th>
            <th scope="col" class="text-center">Nilai Buku</th>
            <th scope="col" class="text-center">Ket</th>

        </tr>
    </thead>
    <tbody>
        @if (!empty($inventaris))
            @foreach ($inventaris as $data)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">
                        {{ \App\Models\Inventaris::find($data->inventaris_id)['nama'] }}</td>
                    <td class="text-center">{{ $data->nama }}</td>
                    <td class="text-center">{{ $data->lokasi }}</td>
                    <td class="text-center">{{ $data->kelompok }}</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($data->tgl_perolehan)->format('F Y') }}</td>
                    <td class="text-center">{{ $data->banyak }}</td>
                    <td class="text-center">Rp. {{ number_format($data->harga_satuan) }}</td>
                    <td class="text-center">Rp. {{ number_format($data->jml_hrg_perolehan) }}
                    </td>
                    <td class="text-center">{{ $data->umur }}</td>
                    <td class="text-center">{{ $data->penghapusan }}%</td>
                    <td class="text-center">Rp. {{ number_format($data->akum_penyusutan) }}
                    </td>
                    <td class="text-center">{{ $data->penyusutan_bln }}</td>
                    <td class="text-center">Rp. {{ number_format($data->jml_penyusutan) }}</td>
                    <td class="text-center">{{ $data->nilai_buku }}</td>
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
