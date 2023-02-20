<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.2.2-dist/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light fixed-top">
        <div class="container-fluid">
            <a class="" href="{{ url('/') }}">
                <img src="{{ asset('img/logounpad.png') }}" alt="" width="50px">
            </a>
            {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button> --}}

            <div class="" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->

                    <li class="nav-item d-flex">
                        <p class="nav-link">Belum punya akun?</p>
                        <a href="{{ url('register') }}" class="nav-link text-success "> daftar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid p-0 con">
        <div class="con-gambar">
            {{-- photo harus ukuran 1080 x 1920 potrait --}}
            <img src="{{ asset('img/texture2.jpeg') }}" alt="" class="gambar img-fluid">
            <div class="centered">
                <h1 class="judul-auth">Welcome </h1>
                <br>
                <h4></h4>
            </div>
        </div>
        <div class="form">
            @if (Session::get('gagal'))
                <div class="alert alert-danger" id="alert">{{ Session::get('gagal') }}</div>
            @endif
            @if (Session::get('berhasil'))
                <div class="alert alert-danger" id="alert">{{ Session::get('berhasil') }}</div>
            @endif
            <h2>Masuk</h2>
            <form method="POST" action="{{ route('login') }}" class="mt-5">
                @csrf
                <div class="row mb-3">
                    {{-- email --}}
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="email" name="email"
                                class="form-control  @error('email') is-invalid @enderror" id="floatingInput"
                                placeholder="name@example.com" value="{{ old('email') }}" required
                                autocomplete="email" autofocus>
                            <label for="floatingInput">Email address</label>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                {{-- password --}}
                <div class="row mb-4">
                    {{-- <label for="password"
                        class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> --}}
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                id="floatingPassword" placeholder="Password" required
                                autocomplete="current-password">
                            <label for="floatingPassword">Password</label>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- <div class="row mb-3">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div> --}}

                <div class="row mb-5">
                    <div class="d-grid col-md-12">
                        {{-- tombol login --}}
                        <button type="submit" class="btn btn-warning btn-lg">
                            Login
                        </button>

                        {{-- <a href="">Lupa password</a> --}}
                        {{-- @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif --}}
                    </div>
                </div>
            </form>
        </div>
    </div>



    <script src="{{ asset('bootstrap-5.2.2-dist/js/bootstrap.bundle.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        $("#alert").fadeTo(2500, 500).slideUp(500, function() {
            $("#alert").slideUp(500);
        });
    </script>
</body>
</html>






