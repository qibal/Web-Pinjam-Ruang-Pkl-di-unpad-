@extends('Admin.LayoutAdmin2')
@section('adminContent')

<div class="row">
    {{-- form --}}
    <div class="col-md-4 tambah-ruangan">
        @if (Session::get('berhasil'))
            <div class="alert alert-success" id="alert">{{ Session::get('berhasil') }}</div>
        @endif
        @if (Session::get('duplicate'))
            <div class="alert alert-warning" id="alert">{{ Session::get('duplicate') }}</div>
        @endif
        @if (Session::get('gagal'))
            <div class="alert alert-danger" id="alert">{{ Session::get('gagal') }}</div>
        @endif
        <h2>Tambah Lantai</h2>
        <form action="{{ route('admin.tableLantaiAdd') }}" method="POST">
            @csrf
            {{-- masukan lantai --}}
            <p class="mt-3">Hanya bisa masukan angka</p>
            <div class="form-floating">
                <input type="number" name="lantai" class="form-control" id="floatingPassword" placeholder="Masukan Lantai"
                    autocomplete="off" value="{{ old('lantai') }}" min="1" pattern="[0,9]">
                <span style="color: red">
                    @error('lantai')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </span>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-warning btn-lg btn-block mt-4">Tambah Lantai</button>
            </div>
        </form>
   </div>

   <div class="col-md-8">
    <table class="table table-hover align-middle text-center">
        <thead class="table-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Lantai</th>
                <th scope="col">Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lantai as $no => $item)
                <tr>
                    <td>{{ $no + $lantai->firstitem() }}</td>
                    <td>{{ $item->lantai }}</td>
                    <td class="">
                        <a href="/admin/TableLantai/delete/{{ $item->id }}" class="btn btn-danger btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Hapus</span>
                        </a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
   </div>
   <script src="https://code.jquery.com/jquery-3.6.1.min.js"
   integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
   <script>
    $("#alert").fadeTo(1000, 500).slideUp(500, function() {
        $("#alert").slideUp(500);
    });
</script>
</div>
@endsection
