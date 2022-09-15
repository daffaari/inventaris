@extends('layouts.master')

@section('content')
    <title>Laporan Inventaris</title>
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
                            <h5 class="card-title">Laporan Inventaris</h5>

                            <!-- Table with stripped rows -->
                            <a href="{{ route('tambah.laporan.inventaris') }}" class="text-decoration-none">
                                <button type="button" class="btn btn-success mb-2"><i class="ri-add-box-line mb-3"></i>
                                    Tambah Data</button>
                            </a>
                            <a href="{{ route('export.laporan.inventaris') }}" class="text-decoration-none">
                                <button type="button" class="btn btn-primary mb-2"><i class="bi-printer mb-3"></i> Export
                                    Excel</button>
                            </a>
                            <a href="#" target="_blank" data-bs-toggle="modal" data-bs-target="#cetakModal">
                                <button type="button" class="btn btn-dark mb-2"><i class="bi-printer mb-3"></i>
                                    Cetak</button>
                            </a>
                            <table class="table table-striped table-bordered w-100 table-responsive" id="data">
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
                                        <th scope="col" class="text-center"width="15%">*</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($lapInven))
                                        @foreach ($lapInven as $data)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">
                                                    {{ \App\Models\Inventaris::find($data->inventaris_id)['nama'] }}</td>
                                                <td class="text-center">{{ $data->nama }}</td>
                                                <td class="text-center">{{ $data->lokasi }}</td>
                                                <td class="text-center">{{ $data->kelompok }}</td>
                                                <td class="text-center">{{ $data->tgl_perolehan }}</td>
                                                <td class="text-center">{{ $data->banyak }}</td>
                                                <td class="text-center">Rp. {{ number_format($data->harga_satuan) }}</td>
                                                <td class="text-center">Rp. {{ number_format($data->jml_hrg_perolehan) }}
                                                </td>
                                                <td class="text-center">{{ $data->umur }}</td>
                                                <td class="text-center">{{ $data->penghapusan }}%</td>
                                                <td class="text-center">Rp. {{ number_format($data->akum_penyusutan) }}
                                                </td>
                                                <td class="text-center">Rp. {{ number_format($data->penyusutan_bln) }}</td>
                                                <td class="text-center">Rp. {{ number_format($data->jml_penyusutan) }}</td>
                                                <td class="text-center">Rp. {{ number_format($data->nilai_buku) }}</td>
                                                <td class="text-center">{{ $data->keterangan }}</td>
                                                <td class="text-center d-flex">

                                                    <a href="{{ route('edit.laporan.inventaris', ['id' => $data->id]) }}"
                                                        class="text-decoration-none">
                                                        <button type="button" class="btn btn-warning d-flex h-75">Edit
                                                            <i class="ri-add-box-line mb-3"></i>
                                                        </button>
                                                    </a>

                                                    <form
                                                        action="{{ route('delete.laporan.inventaris', ['id' => $data->id]) }}"
                                                        method="POST">
                                                        @csrf

                                                        <button type="submit" class="btn btn-danger ml-2 d-flex">Hapus
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
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Inventaris</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('simpan.inventaris') }}" method="POST">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
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

                    <!-- Modal Cetak -->
                    <div class="modal fade" id="cetakModal" tabindex="-1" aria-labelledby="cetakModal"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="cetakModal">Cetak Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>


                                <div class="modal-body">
                                    <div class="row">
                                        <form action="{{ route('cetak.laporan.inventaris') }}" method="GET"
                                            target="_blank">
                                            @csrf
                                            <div class="form-group">
                                                <label for="startDate">Tanggal Awal <span
                                                        class="text-danger">*</span></label>
                                                <input type="date" name="startDate" id="startDate"
                                                    class="form-control" required>

                                                @if ($errors->has('startDate'))
                                                    <span class="text-danger">{{ $errors->first('startDate') }}</span>
                                                @endif

                                            </div>

                                            <div class="form-group">
                                                <label for="endDate">Tanggal Akhir <span
                                                        class="text-danger">*</span></label>
                                                <input type="date" name="endDate" id="endDate" class="form-control"
                                                    required>

                                                @if ($errors->has('endDate'))
                                                    <span class="text-danger">{{ $errors->first('endDate') }}</span>
                                                @endif

                                            </div>


                                            <div class="float-right mr-3">
                                                <button type="submit" class="btn btn-danger text-white">Cetak</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End Modal Cetak -->
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
