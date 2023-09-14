<div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
        <h6 class="font-weight-bolder mb-0 text-white">{{ $titlePage }}</h6>
    </nav>

    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">

        </div>
        <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
                @if (session('user') !== null)
                    <div class="dropdown">
                        <button class="btn dropdown-toggle btn-tigerEyes" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="me-2" style="width: 35px; border-radius: 100%;" alt="Image placeholder" src="{{ asset('assets/img/user.jpeg') }}">
                            {{ session('user.namaLengkap') }} ( {{ session('user.roles') }} )
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a class="dropdown-item py-3" href="#">
                                    <i class="fa-solid fa-user me-2"></i>
                                    Pengaturan Akun
                                </a>
                            </li>
                            <hr>
                            <li>
                                <a class="dropdown-item py-3" href="{{ route('logout') }}">
                                    <i class="fa-solid fa-right-from-bracket me-3"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ asset('dashboard/pages/authentication/signin/illustration.html') }}"
                        class="nav-link text-white font-weight-bold px-0" target="_blank">
                        <i class="fa fa-user me-sm-1"></i>
                        <span class="d-sm-inline d-none">
                            Silakan Login
                        </span>
                    </a>
                @endif
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line bg-white"></i>
                        <i class="sidenav-toggler-line bg-white"></i>
                        <i class="sidenav-toggler-line bg-white"></i>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    
</div>
