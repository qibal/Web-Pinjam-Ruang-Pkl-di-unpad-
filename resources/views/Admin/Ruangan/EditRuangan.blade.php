@extends('Admin.LayoutAdmin2')
@section('adminContent')
<div class="row">
    {{-- form --}}
    <div class="col-md-4 tambah-ruangan m-auto">
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
       <div class="row">
            <div class="col-md-9 col-9">
                <h2 class="mb-4">Edit Ruangan</h2>
            </div>
            <div class="col-md-2 col-2 mt-2">
                <a href="{{ url('/admin/TableRuangan') }}" class="text-dark">Batal Edit</a>
            </div>
       </div>

       <form action="{{ route('admin.RuanganUpdateData') }}" method="post" enctype="multipart/form-data">
            {{-- cid --}}
            <input type="hidden" name="cid" value="{{ $ruangan->id }}">
           @csrf
           {{-- nama ruangan --}}
          <input type="text" name="nama_ruangan" id="nama_ruangan" placeholder="Nama ruangan" class="form-control mb-3" value="{{ $ruangan->nama_ruangan }}">
           @error('nama_ruangan')
               <div class="text-danger">{{ $message }}</div>
           @enderror

           {{-- Lantai --}}
           <select class="form-control form mb-3" aria-label="Default select example" name="lantai">
               <option value=""  hidden>Pilih lantai</option>
               @foreach ($lantai as $item)
                   <option value="{{ $item->lantai }}"
                       @if (old('lantai') == 'lantai') {{ 'selected' }} @endif>{{ $item->lantai }}</option>
               @endforeach
           </select>
           <span style="color: red">
               @error('lantai')
                   <div class="text-danger">{{ $message }}</div>
               @enderror
           </span>




           {{-- fasilitas --}}
           <textarea name="fasilitas" id="" class="form-control" placeholder="Fasilitas">{{ $ruangan->fasilitas }}</textarea>
           <span style="color: red">
            @error('fasilitas')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </span>
        {{-- gambar ruangan --}}
            <input type="file" name="gambar_ruangan" id="gambar_ruangan" class="form-control mt-3" value="{{ $ruangan->gambar_ruangan }}">
            <div class="mt-2">
                <p>Gambar ruangan</p>
                <img src="{{ asset('gambar_ruangan/'.$ruangan->gambar_ruangan) }}" alt="" width="300px">
            </div>


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

