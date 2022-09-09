@extends('layouts.master')

@section('content')
    <main id="main" class="main">
        <section class="section">
            <div class="row justify-content-center">

                <div class="col-md-12">

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
                            <h5 class="card-title">Laporan Data Aktiva</h5>

                            <!-- Table with stripped rows -->
                            <a href="#">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"><i class="ri-add-box-line mb-3"></i></button>
                            </a>
                            <table class="table table-striped table-bordered" id="data">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">#</th>
                                        <th scope="col" class="text-center">Jenis Aktiva</th>
                                        <th scope="col" class="text-center">Tanggal Perolehan</th>
                                        <th scope="col" class="text-center">Harga Perolehan</th>
                                        <th scope="col" class="text-center">Umur Teknis</th>
                                        <th scope="col" class="text-center">Penghapusan</th>
                                        <th scope="col" class="text-center">Akumulasi Penyusutan</th>
                                        <th scope="col" class="text-center">Penyusutan (dalam bulan)</th>
                                        <th scope="col" class="text-center">Jumlah Penyusutan</th>
                                        <th scope="col" class="text-center">Nilai Buku</th>
                                        <th scope="col" class="text-center">Keterangan</th>
                                        <th scope="col" class="text-center"width=10%">*</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($aktiva))
                                        @foreach ($aktiva as $data)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $data->aktiva_id }}</td>
                                                <td class="text-center">{{ $data->tgl_perolehan }}</td>
                                                <td class="text-center">{{ $data->harga_perolehan }}</td>
                                                <td class="text-center">{{ $data->umur_teknis }}</td>
                                                <td class="text-center">{{ $data->penghapusan }}</td>
                                                <td class="text-center">{{ $data->ak_penyusutan }}</td>
                                                <td class="text-center">{{ $data->penyusutan_bln }}</td>
                                                <td class="text-center">{{ $data->jml_penyu_bln }}</td>
                                                <td class="text-center">{{ $data->nilai_buku }}</td>
                                                <td class="text-center">{{ $data->keterangan }}</td>
                                                <td class="text-center">
                                                    <form action="#" method="POST">
                                                        @csrf
                                                        <a href="#">
                                                            <button type="button" class="btn btn-warning"
                                                                data-bs-toggle="modal" data-bs-target="#editModal"
                                                                data-target-id="{{ $data->nama }}">
                                                                <i class="ri-add-box-line mb-3"></i></button>
                                                        </a>

                                                        <a href="#">
                                                            <button type="submit" class="btn btn-danger"><i
                                                                    class="ri-delete-bin-2-line"></i></button>
                                                        </a>
                                                    </form>

                                                </td>

                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center">Data tidak ditemukan</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Aktiva</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('simpan.aktiva') }}" method="POST">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Submit</button>

                                        </div>
                                    </form><!-- End Horizontal Form -->

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModal">Edit Data Aktiva</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('update.aktiva', ['id' => $data->id]) }}" method="POST">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama"
                                                    id="pass_id">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Submit</button>

                                        </div>
                                    </form><!-- End Horizontal Form -->

                                </div>
                            </div>
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
        $("#editModal").on("show.bs.modal", function(e) {
            var nama = $(e.relatedTarget).data('target-id');
            $('#pass_id').val(nama);
        });
    });
</script>
