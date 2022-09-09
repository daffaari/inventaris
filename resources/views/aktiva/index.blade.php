@extends('layouts.master')

@section('content')
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
                            <h5 class="card-title">Data Aktiva</h5>

                            <!-- Table with stripped rows -->
                            <a href="#">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"><i class="ri-add-box-line mb-3"></i></button>
                            </a>
                            <table class="table table-striped table-bordered" id="data">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">#</th>
                                        <th scope="col" class="text-center">Kode</th>
                                        <th scope="col" class="text-center">Nama</th>
                                        <th scope="col" class="text-center"width="15%">*</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($aktiva))
                                        @foreach ($aktiva as $data)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $data->kode }}</td>
                                                <td class="text-center">{{ $data->nama }}</td>
                                                <td class="text-center">
                                                    <a href="#">
                                                        <button type="button" class="btn btn-warning"><i
                                                                class="ri-edit-box-line" data-bs-toggle="modal"
                                                                data-bs-target="#editModal"
                                                                data-bs-whatever="@edit"></i></button>
                                                    </a>

                                                    <a href="#">
                                                        <button type="button" class="btn btn-danger"><i
                                                                class="ri-delete-bin-2-line"></i></button>
                                                    </a>
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

                    <!-- Modal -->
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Aktiva</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('simpan.aktiva') }}" method="POST">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama" id="name">
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
            </div>
        </section>

    </main><!-- End #main -->
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
    var editModal = document.getElementById('editModal')
    editModal.addEventListener('show.bs.modal', function(event) {
        console.log('modal dibuka')
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var name = button.getAttribute('data-bs-whatever')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalTitle = editModal.querySelector('.modal-title')
        var modalBodyInput = editModal.querySelector('.modal-body input')

        modalTitle.textContent = 'New message to ' + name
        modalBodyInput.value = name
    })
</script>
