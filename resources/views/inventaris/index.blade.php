@extends('layouts.master')

@section('content')
    <title>Data Aktiva</title>
    <main id="main" class="main">
        <section class="section">
            <div class="row">

                <div class="col-lg-12">

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
                            <h5 class="card-title">Data Inventaris</h5>

                            <!-- Table with stripped rows -->
                            <a href="#">
                                <button type="button" class="btn btn-success  mb-2" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"><i class="ri-add-box-line mb-3"></i> Tambah Data</button>
                            </a>
                            <table class="table table-striped table-bordered w-100" id="data">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">#</th>
                                        <th scope="col" class="text-center">Kode</th>
                                        <th scope="col" class="text-center">Nama</th>
                                        <th scope="col" class="text-center"width="15%">*</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($inventaris))
                                        @foreach ($inventaris as $data)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $data->kode }}</td>
                                                <td class="text-center">{{ $data->nama }}</td>
                                                <td class="text-center d-flex">

                                                    <button type="button" class="btn btn-warning btn-edit d-flex h-75"
                                                        data-id="{{ $data->id }}" data-nama="{{ $data->nama }}">
                                                        Edit
                                                        <i class="ri-edit-box-line"></i>
                                                    </button>


                                                    <form action="{{ route('delete.inventaris', ['id' => $data->id]) }}"
                                                        method="POST">
                                                        @csrf

                                                        <button type="submit" class="btn btn-danger ml-2 d-flex">Hapus
                                                            <i class="ri-delete-bin-2-line"> </i>

                                                        </button>

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
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Inventaris</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('simpan.inventaris') }}" method="POST">
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
                                    <h5 class="modal-title" id="editModal">Edit Data Inventaris</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('update.inventaris') }}" method="POST">
                                        @csrf
                                        <div class="row mb-3">
                                            <input type="hidden" name="data_id">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama_edit">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Update</button>

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
