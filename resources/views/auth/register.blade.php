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
                        <p class="nav-link">Sudah punya akun?</p>
                        <a href="{{ url('login') }}" class="nav-link text-success"> masuk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid p-0 con">
        <div class="con-gambar">
            {{-- photo harus ukuran 1080 x 1920 potrait --}}
            <img src="{{ asset('img/texture2.jpeg') }}" alt="" class="gambar img-fluid">
            <div class="centered ">
                <h1 class="judul-auth shadow">Yu daftar </h1>
                <br>
                <h4>biar bisa minjem ruangan yang kamu mau</h4>
            </div>
        </div>
        <div class="form">
            @if (Session::get('berhasil'))
            <div class="alert alert-success" id="alert">Akun telah berhasil di buat silahkan login</div>

            @endif
            <h2>Daftar</h2>
            <form method="POST" action="{{ route('register') }}" class="mt-4">
                @csrf
                @if (Session::get('success'))
                    <div class="alert alert-success" id="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if (Session::get('error'))
                    <div class="alert alert-danger" id="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif
                @csrf
                <div class="form-floating mb-3 ">
                    <input type="text" class="form-control  @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" id="name" placeholder="name"
                        autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="name">Nama User</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control  @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" id="email" placeholder="name@example.com"
                        autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control  @error('password') is-invalid @enderror"
                        name="password" id="password" placeholder="Password" autocomplete="password"
                        value="{{ old('password') }}">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="password">Password</label>
                </div>
                <div class="form-floating mb-4">
                    <input type="password"
                        class="form-control  @error('password_confirmation') is-invalid @enderror"
                        name="password_confirmation" autocomplete="new-password"
                        value="{{ old('password_confirmation') }}" id="password-confirm" placeholder="Password">
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="password-confirm">Confirm Password</label>
                </div>
                <div class=" mb-4">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-lg btn-warning">Daftar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src=
"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js">
    </script>
    <script>
        $("#alert").fadeTo(1000, 500).slideUp(500, function() {
            $("#alert").slideUp(500);
        });
    </script>

    <script src="{{ asset('bootstrap-5.2.2-dist/js/bootstrap.bundle.js') }}"></script>
</body>
</html>






