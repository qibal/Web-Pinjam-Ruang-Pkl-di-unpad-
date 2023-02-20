@extends('Admin.LayoutAdmin2')
@section('adminContent')
    <div class="row">
        {{-- form --}}
        {{-- <div class="col-md-4 tambah-ruangan">
            @if (Session::get('berhasil'))
                <div class="alert alert-danger" id="alert">{{ Session::get('berhasil') }}</div>
            @endif
            @if (Session::get('duplicate'))
                <div class="alert alert-danger" id="alert">{{ Session::get('duplicate') }}</div>
            @endif
            @if (Session::get('gagal'))
                <div class="alert alert-danger" id="alert">{{ Session::get('gagal') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                           {{ $error }}
                        @endforeach
                </div>
            @endif


        </div> --}}

        <div class="col-md-8">
            @if (Session::get('berhasil'))
            <div class="alert alert-success" id="alert">{{ Session::get('berhasil') }}</div>
        @endif
        @if (Session::get('duplicate'))
            <div class="alert alert-danger" id="alert">{{ Session::get('duplicate') }}</div>
        @endif
        @if (Session::get('gagal'))
            <div class="alert alert-danger" id="alert">{{ Session::get('gagal') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                       {{ $error }}
                    @endforeach
            </div>
        @endif
            <h2>Table User</h2>
            {{-- <form action="" class="btn-group">
                <input type="text" name="search" class="btn border-dark" placeholder="Cari ruangan / lantai"
                    onchange="this.form.submit()" value="{{ old('search') }}">
                <button type="submit" class="btn btn-dark">Cari</button>
            </form> --}}
            <table class="table table-hover align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Email</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>

                @foreach ($user as $no => $item)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $no + $user->firstitem() }}</th>
                            <td>{{ $item->email }}</td>
                            <td>
                                <a href="/admin/daftarUser/delete/{{ $item->id }}" class="btn btn-danger btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text">Hapus</span>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
            {{ $user->links() }}
        </div>


    </div>
@endsection
