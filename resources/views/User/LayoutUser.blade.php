<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- drop down --}}
    <link rel="stylesheet" href="{{ asset('css/dropdown_home_user.css') }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.2.2-dist/css/bootstrap.css') }}">

    <!-- Scripts -->
    {{-- 'resources/sass/app.scss' --}}
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="me-3" href="{{ url('/user/home') }}">
                    <img src="{{ asset('img/logounpad.png') }}" alt="" width="50px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a href="{{ url('/user/kalender') }}" class="nav-link">Kalender</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/user/daftarRuangan') }}" class="nav-link">Daftar Ruangan</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/user/prosedur_pinjam') }}" class="nav-link">Prosedur Pinjam</a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="drop nav-link">Pinjam Ruangan
                                    <img src="{{ asset('icon/caret-down-fill.svg') }}" alt="">
                                </button>
                                <div class="drop-content">
                                    <a href="{{ url('/user/formPinjam') }}" class="nav-link arrow">Pinjam Ruangan
                                        <img src="{{ asset('icon/arrow-right.svg') }}" alt=""
                                            class="img-history-1 arrow ">
                                    </a>
                                    <a href="{{ url('/user/history_pinjam') }}" class="nav-link arrow">History
                                        <img src="{{ asset('icon/arrow-right.svg') }}" alt=""
                                            class="img-history-2 arrow">
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">

                        @guest
                            <div>
                                @if (Route::has('login'))
                                    <li class="rounded">
                                        <a class="btn btn-outline-warning fw-semibold"
                                            href="{{ route('login') }}">masuk</a>
                                    </li>
                                @endif
                            </div>
                            <div>
                                @if (Route::has('register'))
                                    <li class="rounded">
                                        <a class="btn btn-warning ms-2 fw-semibold"
                                            href="{{ route('register') }}">daftar</a>
                                    </li>
                                @endif
                            </div>
                        @else
                            <li class="nav-item dropdown">

                                <div class="drop">

                                    <button class="btn  d-flex">
                                        <div class="text-secondary">{{ Auth::user()->name }}</div>
                                        <div>
                                            <img src="{{ asset('fontawesome-free-6.2.0-web/svgs/solid/caret-down.svg') }}"
                                                alt="" width="10" class="ms-2 mb-1">
                                        </div>
                                    </button>
                                    <div class="drop-content">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>



                            </li>
                        @endguest

                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('userContent')
        </main>
    </div>
</body>

</html>
