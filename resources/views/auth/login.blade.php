<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Halaman Login</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('template') }}/assets/img/favicon.png" rel="icon">
    <link href="{{ asset('template') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('template') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('template') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('template') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('template') }}/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('template') }}/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="{{ asset('template') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{ asset('template') }}/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('template') }}/assets/css/style.css" rel="stylesheet">
</head>

<body>

    <main>
        <div class="container">
            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="#" class="logo d-flex align-items-center w-auto">
                                    <img src="{{ asset('template') }}/assets/img/logo.png" alt="">

                                </a>
                            </div><!-- End Logo -->


                            <div class="card mb-3">
                                <div class="float-end">
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

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login ke akun anda</h5>
                                        <p class="text-center small">Masukkan Username dan Password</p>
                                    </div>

                                    <form class="row g-3 needs-validation" action="{{ route('loginHandler') }}"
                                        method="post">
                                        @csrf
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group has-validation">

                                                <input type="text" name="username" class="form-control" required>
                                                <div class="invalid-feedback">Please enter your username.</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>


                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Login</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->


    <!-- Template Main JS File -->
    <script src="{{ asset('template') }}/assets/js/main.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</body>

</html>
