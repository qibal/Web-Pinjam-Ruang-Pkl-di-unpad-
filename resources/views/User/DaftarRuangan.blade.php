@extends('User.LayoutUser')
@section('userContent')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="row">
                <div class="col-md-12 d-flex">

                        <div class="">
                            <h2>Daftar ruangan</h2>
                        </div>
                        <div class="ms-auto d-flex">
                            {{-- pagination --}}
                            {{-- <form action="" class="me-2">
                                <select name="pagination" id="pagination" class="form-select shadow-none" onchange="this.form.submit()">
                                    <option value="5"  @if (old('pagination') == "5") {{ 'selected' }} @endif>5</option>
                                    <option value="10" @if (old('pagination')=='10'){{ 'selected' }}@endif>10</option>
                                    <option value="25" @if (old('pagination')=='25'){{ 'selected' }}@endif>25</option>
                                </select>
                            </form> --}}
                            <form action="" class="btn-group mb-3">
                                <input type="text" name="search" placeholder="Cari ruangan / lantai / fasilitas" class="btn border-dark border-opacity-50">

                                <button type="submit" class="btn btn-dark ">Cari</button>
                            </form>
                        </div>

                </div>
                <div class="col-md-12">
                    @if (Session::get('gagal'))
                        <div class="alert alert-danger" id="alert">{{ Session::get('gagal') }}</div>
                    @endif
                    <table class="table table-hover align-middle text-center">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama ruangan</th>
                                <th scope="col">Lantai</th>
                                <th scope="col">Fasilitas</th>
                                <th scope="col ">Opsi</th>
                            </tr>
                        </thead>

                        @foreach ($ruangan as $no => $item)
                            <tbody>
                                <tr>
                                    <th scope="row">{{ $no +$ruangan->firstitem() }}</th>
                                    <td>{{ $item->nama_ruangan }}</td>
                                    <td>{{ $item->lantai }}</td>
                                    <td>{{ Str::limit($item->fasilitas,20) }}</td>
                                    <td class="">
                                        <a href="/user/detailRuangan/{{ $item->id }}" class="btn btn-warning btn-sm">
                                            Detail Ruangan
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                    {{ $ruangan->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
