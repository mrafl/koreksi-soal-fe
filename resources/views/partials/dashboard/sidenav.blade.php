{{-- <div class="sidenav-header">
    
</div> --}}
<hr class="horizontal dark mt-0">
<div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">

        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="{{ route('kunciJawaban') }}">
                <img src="{{ asset('assets/img/UNJLogo.png') }}" style="width: 200px;" alt="main_logo">
            </a>
        </div>

        <hr class="horizontal dark mt-2">

        <li class="nav-item mt-1">
            <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder opacity-6">@lang('dashboard.sidenav.menu')</h6>
        </li>

        @php
            $menuItems = [
                [
                    'route' => 'kunciJawaban',
                    'icon' => 'fa-users',
                    'text' => 'Kunci Jawaban',
                    'activeRoutes' => ['kunciJawaban'],
                    'color' => 'text-warning',
                ],
                [
                    'route' => 'jawabanSiswa',
                    'icon' => 'fa-file-arrow-up',
                    'text' => 'Jawaban Siswa',
                    'activeRoutes' => ['jawabanSiswa'],
                    'color' => 'text-success',
                ]
            ];
        @endphp

        @foreach ($menuItems as $item)
            <li class="nav-item">
                <a class="nav-link {{ in_array($active, $item['activeRoutes']) ? 'active' : '' }}"
                    href="{{ route($item['route']) }}">
                    <div
                        class="icon icon-shape icon-sm text-center  me-2 d-flex align-items-center justify-content-center">
                        <i class="fa {{ $item['icon'] }} {{ $item['color'] }} text-sm" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">{{ $item['text'] }}</span>
                </a>
            </li>
        @endforeach

    </ul>
</div>

<hr class="horizontal dark mt-2">

<div class="sidenav-footer mx-3 my-3">
    <div class="card card-plain shadow-none" id="sidenavCard">
        <div class="card-body text-center p-3 w-100 pt-0">
            <div class="docs-info">
                <h6 class="mb-0">@lang('dashboard.sidenav.needHelp')</h6>
            </div>
        </div>
    </div>
    <a class="btn btn-sm mb-0 mt-2 w-100 text-white" style="background-color: #4fce5d;"
        href="https://wa.me/6285155335112" target="_blank" type="button">
        <i class="fa-brands fa-whatsapp me-1"></i>
        @lang('dashboard.sidenav.contactUs')
    </a>
</div>
