@extends('Admin.LayoutAdmin2')
@section('adminContent')
    <div class="row">
        <div class="col-md-5 m-auto border bg-light shadow-sm p-4 rounded">
            <div class="form">
                <h2>Ubah password</h2>
                @if (Session::get('berhasil'))
                    <div class="alert alert-success">{{ Session::get('berhasil') }}</div>
                @endif
                @if (Session::get('gagal'))
                    <div class="alert alert-danger">{{ Session::get('gagal') }}</div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                    </div>
                @endif
                <form method="POST" action="{{ route('admin.changePassword') }}" class="mt-4   ">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="password" name="password_lama" id="password_lama" placeholder="Password lama"
                                class="form-control" value="{{ old('password_lama') }}">
                            <span>
                                @error('password_lama')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-12 mt-3">
                            <input type="password" name="password_baru" id="password_baru" placeholder="Password baru"
                                class="form-control" value="{{ old('password_baru') }}">
                            @error('password_baru')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mt-3">
                            <input type="password" name="password_konfirmasi" id="password_konfirmasi"
                                placeholder="Konfirmasi pasword" class="form-control"
                                value="{{ old('password_konfirmasi') }}">
                            @error('password_konfirmasi')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mt-5">
                            <button class="btn btn-warning btn-lg btn-block">Ubah password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
