@extends('Admin.LayoutAdmin2')
@section('adminContent')
<div class="row">
     {{-- form --}}
     <div class="col-md-5 tambah-ruangan m-auto">
        @if (Session::get('berhasil'))
            <div class="alert alert-danger" id="alert">{{ Session::get('berhasil') }}</div>
        @endif
        @if (Session::get('gagal'))
            <div class="alert alert-danger" id="alert">{{ Session::get('gagal') }}</div>
        @endif
        <div class="row">
            <div class="col-md-10 col-10">
                <h2 class="mb-4"> EditProsedur Pinjam</h2>
            </div>
            <div class="col-md-2 mt-2 col-2">
                <a href="{{ url('/admin/ProsedurPinjam') }}">Batal edit</a>
            </div>
        </div>

        <form action="{{ route('admin.prosedurPinjamUpdateData') }}" method="post">
            <input type="hidden" name="id" value="{{ $prosedur->id }}">
            @csrf
            {{-- nama ruangan --}}
           <textarea name="prosedur" class="form-control mb-3" id="" placeholder="Masukan prosedur" cols="40" rows="10">{{ $prosedur->prosedur_pinjam }}</textarea>
            @error('prosedur')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-warning btn-lg btn-block submit mt-4">
                Submit
            </button>
        </form>

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
