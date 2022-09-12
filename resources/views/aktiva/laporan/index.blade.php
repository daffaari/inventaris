@extends('layouts.master')

@section('content')
    <title>Laporan Aktiva</title>
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
                            <h5 class="card-title">Laporan Data Aktiva</h5>

                            <!-- Table with stripped rows -->
                            <a href="{{ route('tambah.laporan.aktiva') }}" class="text-decoration-none">
                                <button type="button" class="btn btn-success mb-2"><i class="ri-add-box-line mb-3"></i>
                                    Tambah
                                    Data</button>
                            </a>
                            <a href="{{ route('export.laporan.aktiva') }}">
                                <button type="button" class="btn btn-dark  mb-2"><i class="bi-printer mb-3">
                                        Export Excel</i></button>
                            </a>
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
                                        <th scope="col" class="text-center">*</th>
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
                                                <td class="text-center">{{ $data->umur_teknis }}</td>
                                                <td class="text-center">{{ $data->penghapusan }}%</td>
                                                <td class="text-center">Rp. {{ number_format($data->ak_penyusutan) }}</td>
                                                <td class="text-center">Rp. {{ number_format($data->penyusutan_bln) }}</td>
                                                <td class="text-center">Rp. {{ number_format($data->jml_penyu_bln) }}</td>
                                                <td class="text-center">Rp. {{ number_format($data->nilai_buku) }}</td>
                                                <td class="text-center">{{ $data->keterangan }}</td>
                                                <td class="text-center d-flex">

                                                    <a href="{{ route('edit.laporan.aktiva', ['id' => $data->id]) }}"
                                                        class="text-decoration-none">
                                                        <button type="button" class="btn btn-warning d-flex h-75"> Edit
                                                            <i class="ri-add-box-line mb-3"></i>
                                                        </button>
                                                    </a>
                                                    <form
                                                        action="{{ route('delete.laporan.aktiva', ['id' => $data->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger ml-2 d-flex"> Hapus
                                                            <i class="ri-delete-bin-2-line"></i>
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
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Aktiva</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('simpan.aktiva') }}" method="POST">
                                        @csrf
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Jenis Aktiva</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>--Pilih Jenis Aktiva--</option>
                                                    @foreach ($dataAktiva as $data)
                                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="tgl_perolehan" class="col-sm-2 col-form-label">Tanggal
                                                Perolehan</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="tgl_perolehan">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="harga_perolehan" class="col-sm-2 col-form-label">Harga
                                                Perolehan</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="harga_perolehan">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="umur_teknis" class="col-sm-2 col-form-label">Umur Teknis</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="umur_teknis">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="penghapusan" class="col-sm-2 col-form-label">Penghapusan</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="penghapusan">
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <label for="ak_penyusutan" class="col-sm-2 col-form-label">Akumulasi
                                                Penyusutan</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="ak_penyusutan">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="penyusutan_bln" class="col-sm-2 col-form-label">
                                                Penyusutan (bln berjalan)</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="penyusutan_bln">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="jml_penyu_bln" class="col-sm-2 col-form-label">Jumlah
                                                Penyusutan</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="jml_penyu_bln">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="nilai_buku" class="col-sm-2 col-form-label">Nilai Buku</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="nilai_buku">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="keterangan">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Submit</button>

                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal"
                        aria-hidden="true">
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
