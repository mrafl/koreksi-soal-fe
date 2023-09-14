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
    @lang('login.title') | Aplikasi Koreksi Jawaban
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  {{-- <link href="{{ asset('dashboard/assets/css/nucleo-icons.css') }}" rel="stylesheet" /> --}}
  {{-- <link href="{{ asset('dashboard/assets/css/nucleo-svg.css') }}" rel="stylesheet" /> --}}
  <!-- Font Awesome Icons -->
  {{-- <script src="https://kit.fontawesome.com/42d5adcbca.js') }}" crossorigin="anonymous"></script> --}}
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('dashboard/assets/css/argon-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
          <div class="container-fluid ps-2 pe-0">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="#">
              @lang('login.title') | Aplikasi Koreksi Jawaban
            </a>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Selamat datang di Aplikasi Koreksi Jawaban</h4>
                  <p class="mb-0">Silakan masuk dengan akun anda!</p>
                </div>
                <div class="card-body">
                  @if (session('error') !== null)
                  <div class="alert alert-danger text-white" role="alert">
                      <strong>@lang('login.error')</strong> {{ session('error') }}
                  </div>
                  @endif

                  @if (session('success') !== null)
                  <div class="alert alert-success text-white" role="alert">
                      <strong>@lang('login.success')</strong> {{ session('error') }}
                  </div>
                  @endif

                  <form role="form" action="{{ route('authenticate') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <input type="text" name="usernameOrEmail" class="form-control form-control-lg" placeholder="@lang('login.usernamePlaceholder')" aria-label="@lang('login.usernamePlaceholder')">
                    </div>
                    <div class="mb-3">
                      <input type="password" name="password" class="form-control form-control-lg" placeholder="@lang('login.passwordPlaceholder')" aria-label="@lang('login.passwordPlaceholder')">
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-lg w-100 mt-4 mb-0" style="background-color: #bc6c25 !important; color: white;">@lang('login.title')</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    @lang('login.dontHaveAccount')
                    <a href="{{ route('register')}}" class="font-weight-bold" style="color: #606c38 !important;">@lang('login.register')</a>
                  </p>
                </div>
              </div>
            </div>

            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('{{ asset('assets/img/sekolah.jpeg') }}'); background-size: cover;">
                <span class="mask opacity-6" style="background-color: #DDA15E !important;"></span>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="{{ asset('dashboard/assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('dashboard/assets/js/core/bootstrap.min.js') }}"></script>
  {{-- <script src="{{ asset('dashboard/assets/js/plugins/perfect-scrollbar.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('dashboard/assets/js/plugins/smooth-scrollbar.min.js') }}"></script> --}}
  <!-- Kanban scripts -->
  <script src="{{ asset('dashboard/assets/js/plugins/dragula/dragula.min.js') }}"></script>
  <script src="{{ asset('dashboard/assets/js/plugins/jkanban/jkanban.js') }}"></script>
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