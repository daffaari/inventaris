@extends('layouts.master')

@section('content')
    <title>Rekap Data Aktiva</title>
    <main id="main" class="main">
        <section class="section">
            <div class="row">

                <div class="col-lg">

                    <div class="card">
                        <div class="float-right">
                            <script>
                                @if (Session::has('message'))
                                    toastr.options = {
                                        "closeButton": true,
                                        "progressBar": true
                                    }
                                    toastr.success("{{ session('message') }}");
                                @endif

                                @if (Session::has('error'))
                                    toastr.options = {
                                        "closeButton": true,
                                        "progressBar": true
                                    }
                                    toastr.error("{{ session('error') }}");
                                @endif

                                @if (Session::has('info'))
                                    toastr.options = {
                                        "closeButton": true,
                                        "progressBar": true
                                    }
                                    toastr.info("{{ session('info') }}");
                                @endif

                                @if (Session::has('warning'))
                                    toastr.options = {
                                        "closeButton": true,
                                        "progressBar": true
                                    }
                                    toastr.warning("{{ session('warning') }}");
                                @endif
                            </script>


                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Data Rekap</h5>

                            <!-- Table with stripped rows -->
                            <table class="table table-striped table-bordered table-responsive">
                                <thead>
                                    <tr>

                                        <th scope="col" class="text-center">Jenis</th>
                                        <th scope="col" class="text-center">Jumlah Harga Perolehan</th>
                                        <th scope="col" class="text-center">Akumulasi Penyusutan</th>
                                        <th scope="col" class="text-center">Penyusutan (dlm bulan berjalan)</th>
                                        <th scope="col" class="text-center">Jumlah Penyusutan (sampai bln berjalan)</th>
                                        <th scope="col" class="text-center">Nilai Buku</th>
                                        <th scope="col" class="text-center">Keterangan</th>
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
                                                <td class="text-center">Rp. {{ number_format($data->penyusutan_bulan) }}
                                                </td>
                                                <td class="text-center">Rp.
                                                    {{ number_format($data->akumulasi_penyusutan + $data->penyusutan_bulan) }}
                                                </td>
                                                <td class="text-center">Rp.
                                                    {{ number_format($data->harga_perolehan - $data->jml_penyusutan_bln) }}
                                                </td>
                                                <td class="text-center">{{ $data->keterangan }}</td>


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

                                            <td>
                                                <b> Total Aktiva Tetap</b>
                                            </td>

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
                                                <td class="text-center">{{ $data->keterangan }}</td>


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

                                            <td>
                                                <b> Total Inventaris</b>
                                            </td>

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
                            <!-- End Table with stripped rows -->

                        </div>

                    </div>
                </div>
        </section>

    </main><!-- End #main -->
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $(document).ready(function() {
        // $("#editModal").on("show.bs.modal", function(e) {
        //     var nama = $(e.relatedTarget).data('target-id');
        //     $('#pass_id').val(nama);
        // });
        $('.btn-edit').click(function() {
            var data_id = $(this).attr('data-id');
            var data_nama = $(this).attr('data-nama');
            $('[name="data_id"]').val(data_id)
            $('[name="nama_edit"]').val(data_nama)
            $('#editModal').modal('show');
        })
    });
</script>
