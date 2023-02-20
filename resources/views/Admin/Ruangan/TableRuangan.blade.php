@extends('Admin.LayoutAdmin2')
@section('adminContent')
    <div class="row">
        {{-- form --}}
        <div class="col-md-4 tambah-ruangan  ">
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
            <h2 class="mb-4">Form Ruangan</h2>

            <form action="{{ route('admin.RuanganAdd') }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- nama ruangan --}}
                <input type="text" name="nama_ruangan" id="nama_ruangan" placeholder="Nama ruangan"
                    class="form-control mb-3" value="{{ old('nama_ruangan') }}">
                @error('nama_ruangan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                {{-- Lantai --}}
                <select class="form-control form mb-3" name="lantai">
                    <option value="" hidden>Pilih lantai</option>
                    @foreach ($lantai as $item)
                        <option value="{{ $item->lantai }}" @if (old('lantai') == 'lantai') {{ 'selected' }} @endif>
                            {{ $item->lantai }}</option>
                    @endforeach
                </select>
                <span style="color: red">
                    @error('lantai')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </span>


                {{-- fasilitas --}}
                <textarea name="fasilitas" id="" class="form-control mb-3" placeholder="Fasilitas">{{ old('fasilitas') }}</textarea>
                <span style="color: red">
                    @error('fasilitas')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </span>

                {{-- gambar ruangan --}}
                <label for="gambar_ruangan">Gambar ruangan</label>
                <div class="input-group">
                    <input type="file" name="gambar_ruangan" id="gambar_ruangan" placeholder="gambar ruangan"
                        class="form-control mb-3 gambar_ruangan" value="{{ old('gambar_ruangan') }}">
                </div>
                <span style="color: red">
                    @error('fasilitas')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </span>


                <button type="submit" class="btn btn-warning btn-lg btn-block submit mt-4">
                    Submit
                </button>
            </form>


        </div>

        <div class="col-md-8">
            <h2>Table Ruangan</h2>
            <form action="" class="btn-group">
                <input type="text" name="search" class="btn border-dark" placeholder="Cari ruangan / lantai / fasilitas"
                    onchange="this.form.submit()" value="{{ old('search') }}">
                <button type="submit" class="btn btn-dark">Cari</button>
            </form>
            <table class="table table-hover align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama ruangan</th>
                        <th scope="col">Lantai</th>
                        <th scope="col">Fasilitas</th>
                        <th scope="col">Gambar Ruangan</th>
                        <th scope="col ">Opsi</th>
                    </tr>
                </thead>

                @foreach ($data as $no => $item)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $no + $data->firstitem() }}</th>
                            <td>{{ $item->nama_ruangan }}</td>
                            <td>{{ $item->lantai }}</td>
                            <td>{{ $item->fasilitas }}</td>
                            <td>
                                <img src="{{ asset('gambar_ruangan/' . $item->gambar_ruangan) }}" alt=""
                                    width="100">
                            </td>
                            <td class="">
                                <a href="/admin/TableRuangan/delete/{{ $item->id }}" class="btn btn-danger btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text">Hapus</span>
                                </a>
                                <a href="/admin/TableRuangan/edit/{{ $item->id }}" class="btn btn-primary btn-icon-split">
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
            {{ $data->links() }}
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
