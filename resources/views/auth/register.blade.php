<!--
=========================================================
* Argon Dashboard 2 PRO - v2.0.1
=========================================================

* Product Page:  https://www.creative-tim.com/product/argon-dashboard-pro
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/logo-rotanwallacea.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo-rotanwallacea.png') }}">
    <title>
        Daftarkan Akun Anda | Aplikasi Koreksi Jawaban
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    {{-- <link href="{{ asset('dashboard/assets/css/nucleo-icons.css') }}" rel="stylesheet" /> --}}
    {{-- <link href="{{ asset('dashboard/assets/css/nucleo-svg.css') }}" rel="stylesheet" /> --}}
    <!-- Font Awesome Icons -->
    {{-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> --}}
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('dashboard/assets/css/argon-dashboard.css?v=2.0.1') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">

    <script>
        window.apiEndpoint = "{{ env('BACKEND_URL') }}";
    </script>

</head>

<body class="bg-gray-100">
    @include('sweetalert::alert')

    <!-- Navbar -->
    <nav
        class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
        <div class="container ps-2 pe-0">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white"
                href="#">
                Daftarkan Akun Anda | Aplikasi Koreksi Jawaban
            </a>
        </div>
    </nav>
    <!-- End Navbar -->
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
            style="background-image: url('{{ asset('assets/img/kelas.jpeg')}}'); background-position: top;">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Selamat Datang di Aplikasi Koreksi Jawaban</h1>
                        <p class="text-lead text-white">Silakan lengkapi data diri anda untuk melakukan Pendaftaran Akun!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
                <div class="col-xl-7 col-lg-7 col-md-7 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-body">
                            @if (session('error') !== null)
                                <div class="alert alert-danger text-white" role="alert">
                                    <strong>Terjadi Kesalahan!</strong> {{ session('error') }}
                                </div>
                            @endif
                            <form id="registerForm" role="form">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="namaLengkap" class="form-control-label">Nama Lengkap<span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" placeholder="Nama Lengkap" aria-label="Nama Lengkap" id="namaLengkap" name="namaLengkap">
                                            <small id="namaLengkapError" class="text-danger" style="display: none;">Nama Lengkap setidaknya berisi 3 huruf.</small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="noTelp" class="form-control-label">No. Telepon<span style="color: red;">*</span></label>
                                            <input type="number" class="form-control" placeholder="No. Telepon" aria-label="No. Telepon" id="noTelp" name="noTelp">
                                            <small id="noTelpLengthError" class="text-danger" style="display: none;">No. Telepon harus terdiri dari 10 digit.</small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-control-label">Email<span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" placeholder="Email" aria-label="Email" id="email" name="email">
                                            <small id="emailError" class="text-danger" style="display: none;">Email tidak valid.</small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="username" class="form-control-label">Username<span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" placeholder="Username" name="username" aria-label="Username" id="username">
                                            <small id="usernameError" class="text-danger" style="display: none;">Username setidaknya berisi 6 huruf.</small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="password" class="form-control-label">Password<span style="color: red;">*</span></label>
                                            <input type="password" class="form-control" placeholder="Password" name="password" aria-label="Password" id="password">
                                            <small id="passwordError" class="text-danger" style="display: none;">Password setidaknya berisi 8 karakter.</small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="retype_password" class="form-control-label">Re-Password<span style="color: red;">*</span></label>
                                            <input type="password" class="form-control" placeholder="Re-Password" name="retype_password" aria-label="Re-Password" id="retype_password">
                                            <small id="retypePasswordError" class="text-danger" style="display: none;">Password tidak sama.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn w-100 my-4 mb-2" id="btn-signup" disabled>Daftar</button>
                                </div>
                                <p class="text-sm mt-3 mb-0">Sudah memiliki akun? <a href="{{ route('login') }}" class="text-dark font-weight-bolder">Login</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <footer class="footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-8 mx-auto text-center mt-1">
                    <p class="mb-0 text-secondary">
                        Copyright ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script> Aplikasi Koreksi Jawaban
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/js/register.js') }}"></script>

    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <!--   Core JS Files   -->
    <script src="{{ asset('dashboard/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/core/bootstrap.min.js') }}"></script>
    {{-- <script src="{{ asset('dashboard/assets/js/plugins/perfect-scrollbar.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('dashboard/assets/js/plugins/smooth-scrollbar.min.js') }}"></script> --}}
    <!-- Kanban scripts -->
    <script src="{{ asset('dashboard/assets/js/plugins/dragula/dragula.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/plugins/jkanban/jkanban.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('dashboard/assets/js/argon-dashboard.min.js?v=2.0.1') }}"></script>
</body>

</html>
