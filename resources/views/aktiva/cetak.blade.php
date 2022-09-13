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
<title>Cetak Aktiva</title>
<table style="width:100%">
    <thead>
        <tr>

            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Kode</th>
            <th scope="col" class="text-center">Nama</th>


        </tr>
    </thead>


    <tbody>
        @if (!empty($aktiva))
            @foreach ($aktiva as $data)
                <tr>
                    <td class="text-center"> <b>{{ $loop->iteration }}</b></td>
                    <td class="text-center"><b>{{ $data->kode }}</b></td>
                    <td class="text-center"><b>{{ $data->nama }}</b></td>



                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="12" class="text-center">Data tidak ditemukan</td>
            </tr>
        @endif
    <tbody>


</table>


<script>
    window.print();
</script>
