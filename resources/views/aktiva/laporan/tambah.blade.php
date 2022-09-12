@extends('layouts.master')

@section('content')
    <title>Laporan Aktiva</title>
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12 mx-auto">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tambah Laporan Aktiva</h5>

                            <!-- Horizontal Form -->
                            <form action="{{ route('simpan.laporan.aktiva') }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Jenis Aktiva</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="aktiva_id">
                                            <option selected>--Pilih Jenis Aktiva--</option>
                                            @foreach ($aktiva as $data)
                                                <option value="{{ $data->id }}">{{ $data->nama }} -
                                                    ({{ $data->kode }})
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('aktiva_id') }}</span>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama"
                                            value="{{ old('nama') }}">
                                    </div>
                                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                                </div>

                                <div class="row mb-3">
                                    <label for="tgl_perolehan" class="col-sm-2 col-form-label">Tanggal
                                        Perolehan</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tgl_perolehan"
                                            value="{{ old('tgl_perolehan') }}">
                                    </div>
                                    <span class="text-danger">{{ $errors->first('tgl_perolehan') }}</span>
                                </div>

                                <div class="row mb-3">
                                    <label for="harga_perolehan" class="col-sm-2 col-form-label">Harga
                                        Perolehan</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="harga_perolehan"
                                            value="{{ old('harga_perolehan') }}">
                                    </div>
                                    <span class="text-danger">{{ $errors->first('harga_perolehan') }}</span>
                                </div>

                                <div class="row mb-3">
                                    <label for="umur_teknis" class="col-sm-2 col-form-label">Umur Teknis</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="umur_teknis"
                                            value="{{ old('umur_teknis') }}">
                                    </div>
                                    <span class="text-danger">{{ $errors->first('umur_teknis') }}</span>
                                </div>

                                <div class="row mb-3">
                                    <label for="penghapusan" class="col-sm-2 col-form-label">Penghapusan</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="penghapusan"
                                            value="{{ old('penghapusan') }}">
                                    </div>
                                    <span class="text-danger">{{ $errors->first('penghapusan') }}</span>
                                </div>


                                <div class="row mb-3">
                                    <label for="ak_penyusutan" class="col-sm-2 col-form-label">Akumulasi
                                        Penyusutan</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="ak_penyusutan"
                                            value="{{ old('ak_penyusutan') }}">
                                    </div>
                                    <span class="text-danger">{{ $errors->first('ak_penyusutan') }}</span>
                                </div>

                                <div class="row mb-3">
                                    <label for="penyusutan_bln" class="col-sm-2 col-form-label">
                                        Penyusutan (bln berjalan)</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="penyusutan_bln"
                                            value="{{ old('penyusutan_bln') }}">
                                    </div>
                                    <span class="text-danger">{{ $errors->first('penyusutan_bln') }}</span>
                                </div>

                                <div class="row mb-3">
                                    <label for="jml_penyu_bln" class="col-sm-2 col-form-label">Jumlah
                                        Penyusutan</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="jml_penyu_bln"
                                            value="{{ old('jml_penyu_bln') }}">
                                    </div>
                                    <span class="text-danger">{{ $errors->first('jml_penyu_bln') }}</span>
                                </div>

                                <div class="row mb-3">
                                    <label for="nilai_buku" class="col-sm-2 col-form-label">Nilai Buku</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="nilai_buku"
                                            value="{{ old('nilai_buku') }}">
                                    </div>
                                    <span class="text-danger">{{ $errors->first('nilai_buku') }}</span>
                                </div>

                                <div class="row mb-3">
                                    <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="keterangan"
                                            value="{{ old('keterangan') }}">
                                    </div>
                                    <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                                </div>

                                <div class="text-center">
                                    <a href="{{ route('laporan.aktiva') }}">
                                        <button type="button" class="btn btn-danger">Kembali</button>
                                    </a>
                                    <button type="submit" class="btn btn-primary">Submit</button>

                                </div>
                            </form>

                        </div>
                    </div>


                </div>
            </div>
        </section>
    </main>
@endsection
