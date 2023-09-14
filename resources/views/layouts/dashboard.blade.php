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
        {{$titlePage}} | Aplikasi Koreksi Jawaban
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ templateDashboard('css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ templateDashboard('css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/b353cd4e10.js" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    
    <!-- WYSWYG Editor -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" integrity="sha512-ZbehZMIlGA8CTIOtdE+M81uj3mrcgyrh6ZFeG33A4FHECakGrOsTPlPQ8ijjLkxgImrdmSVUHn1j+ApjodYZow==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js" integrity="sha512-lVkQNgKabKsM1DA/qbhJRFQU8TuwkLF2vSN3iU/c7+iayKs08Y8GXqfFxxTZr1IcpMovXnf2N/ZZoMgmZep1YQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- MapBox --}}
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.4.2/mapbox-gl-draw.js'></script>
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.4.2/mapbox-gl-draw.css' type='text/css' />

    <link href="{{ templateDashboard('css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ templateDashboard('css/argon-dashboard.css?v=2.0.1') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <script>
        window.apiEndpoint = "{{ env('BACKEND_URL') }}";
        window.accessTokenMapBox = "{{ env('MAPBOX_ACCESS_TOKEN') }}";
    </script>
</head>

<body class="g-sidenav-show bg-gray-100">
    @include('sweetalert::alert')

    <div class="min-height-300 position-absolute w-100" style="background-color: #283618 !important;"></div>

<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
        @include('partials.dashboard.sidenav')
    </aside>

    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg  px-0 mx-4 shadow-none border-radius-xl z-index-sticky" id="navbarBlur" data-scroll="false">
            @include('partials.dashboard.navbar')
        </nav>
        <!-- End Navbar -->

        <!-- Container  -->
        <div class="container-fluid py-4">
            @yield('container')
        </div>
        <!-- End Container  -->

    </main>

    <script>
        // Ambil nilai access token dari sesi Laravel
        const accessToken = "{{ session('accessToken') }}";
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!--   Core JS Files   -->
    <script src="{{ templateDashboard('js/core/popper.min.js') }}"></script>
    <script src="{{ templateDashboard('js/core/bootstrap.min.js') }}"></script>
    <script src="{{ templateDashboard('js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ templateDashboard('js/plugins/smooth-scrollbar.min.js') }}"></script>
    <!-- Kanban scripts -->
    <script src="{{ templateDashboard('js/plugins/dragula/dragula.min.js') }}"></script>
    <script src="{{ templateDashboard('js/plugins/jkanban/jkanban.js') }}"></script>
    <script src="{{ templateDashboard('js/plugins/flatpickr.min.js') }}"></script>
    <script src="{{ templateDashboard('js/plugins/chartjs.min.js') }}"></script>
    <script src="{{ templateDashboard('js/plugins/datatables.js') }}"></script>
    <script src="{{ templateDashboard('js/plugins/choices.min.js') }}"></script>
    <script src="{{ templateDashboard('js/plugins/dropzone.min.js') }}"></script>

    <script src="{{ asset('assets/js/globalFunction.js') }}"></script>
    
    
    @yield('scriptAddon')

    <script>
        if (document.getElementById('pilih-pendamping')) {
            var pendamping = document.getElementById('pilih-pendamping');
            const example = new Choices(pendamping);
        }
        if (document.getElementById('pilih-pendamping2')) {
            var pendamping = document.getElementById('pilih-pendamping2');
            const example = new Choices(pendamping);
        }
        if (document.getElementById('pilih-desa')) {
            var pendamping = document.getElementById('pilih-desa');
            const example = new Choices(pendamping);
        }
        if (document.getElementById('pilih-roles')) {
            var roles = document.getElementById('pilih-roles');
            const example = new Choices(roles);
        }
    </script>
    
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
    <script src="{{ templateDashboard('js/argon-dashboard.min.js?v=2.0.1') }}"></script>
</body>

</html>
