@extends('Admin.LayoutAdmin2')
@section('adminContent')
<div class="row">
     {{-- form --}}
     <div class="col-md-4 tambah-ruangan">
        @if (Session::get('berhasil'))
            <div class="alert alert-success" id="alert">{{ Session::get('berhasil') }}</div>
        @endif
        @if (Session::get('gagal'))
            <div class="alert alert-danger" id="alert">{{ Session::get('gagal') }}</div>
        @endif
        <h2 class="mb-4">Prosedur Pinjam</h2>

        <form action="{{ route('admin.prosedurPinjamAdd') }}" method="post">
            @csrf
            {{-- nama ruangan --}}
           <textarea name="prosedur" class="form-control mb-3" id="" placeholder="Masukan prosedur" cols="40" rows="10">{{ old('prosedur') }}</textarea>
            @error('prosedur')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-warning btn-lg btn-block submit mt-4">
                Submit
            </button>
        </form>
    </div>

    <div class="col-md-8">
        <h2>Table Prosedur Pinjam</h2>
        <table class="table table-hover align-middle text-center">
            <thead class="table-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Prosedur</th>
                    <th scope="col">opsi</th>
                </tr>
            </thead>
            @foreach ($prosedur as $no => $item)
                <tbody>
                    <tr>
                        <th scope="row">{{ $no +$prosedur->firstitem() }}</th>
                        <td class="text-left">{{ $item->prosedur_pinjam }}</td>
                        <td class="">
                            <a href="/admin/ProsedurPinjam/Delete/{{ $item->id }}" class="btn btn-danger btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Hapus</span>
                            </a>
                            <a href="/admin/ProsedurPinjam/Edit/{{ $item->id }}" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <img src="{{ asset('icon/pencil-square.svg') }}" alt="">
                                </span>
                                <span class="text">Edit</span>

                            </a>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"
integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
$("#alert").fadeTo(2500, 500).slideUp(500, function() {
    $("#alert").slideUp(500);
});
</script>
@endsection


