@extends('layouts.master')

@section('content')
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-6 mx-auto">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tambah Data Aktiva</h5>

                            <!-- Horizontal Form -->
                            <form>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputText">
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
        </section>
    </main>
@endsection
