@extends('User.LayoutUser')
@section('userContent')
    <div class="form container mt-4">
        <div class="row">
            <div class="bg-white col-md-7 m-auto mb-5 border shadow-sm rounded-5 p-4">
                <div class="judul text-center mt-3 mb-3">
                    <h3>Form Pinjam Ruang</h3>
                </div>

                @if (Session::get('berhasil'))
                    <div class="alert alert-danger" id="alert">{{ Session::get('berhasil') }}</div>
                @endif
                @if (Session::get('gagal'))
                    <div class="alert alert-danger" id="alert">{{ Session::get('gagal') }}</div>
                @endif
                @if (Session::get('ruangan-isi'))
                    <div class="alert alert-danger" id="alert">{{ Session::get('ruangan-isi') }}</div>
                @endif

                <form action="{{ route('user.formpinjamAdd') }}" method="post">
                    @csrf
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="row">
                                {{-- nama --}}
                                <div class="col-md-12 pb-6">
                                    <div class="form-group mt-3">
                                        <label for="">Nama-nama Peminjam</label>
                                        <textarea type="text" class="form-control mt-2" name="namapeminjam" style="height: 210px;"
                                            id="exampleFormControlTextarea1" rows="3" ">{{ old('namapeminjam') }}</textarea>
                                        <span style="color: red">
                                            @error('namapeminjam')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                                {{-- alasan --}}
                                <div class="col-md-12 pb-6">
                                    <div class="mt-3">
                                        <label for="" class="form-label">Alasan Peminjaman</label>
                                        <textarea type="text" class="form-control" name="alasan" style="height:210px;" id="exampleFormControlTextarea1"
                                            rows="3" ">{{ old('alasan') }}</textarea>
                                        <span style="color: red">
                                            @error('alasan')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- lantai --}}
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="mt-3">
                                    <label for="" class="form-label">Pilih Lantai</label>
                                    <select class="form-select" name="lantai" id="lantai" class="mt-2">
                                        <option value="" selected hidden>Pilih Lantai</option>
                                        @foreach ($data_lantai as $item)
                                            <option value="{{ $item->lantai }}">{{ $item->lantai }}</option>
                                        @endforeach

                                    </select>
                                    @error('lantai')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- ruangan --}}
                            <div class="col-md-12">
                                <div class="mt-3">
                                    <label for="" class="form-label">Ruangan</label>
                                    <select class="form-select" name="ruangan" id="ruangan" class="mt-2">
                                        <option value="" selected hidden>Pilih Ruangan</option>
                                    </select>
                                    @error('ruangan')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- tanggal peminjaman --}}
                            <div class="col-md-12">
                                <div class="mt-3">
                                    <label for="">Tanggal Peminjaman</label><br>
                                    <input type="date" class="form-control mt-2" id="tanggal" name="tglPinjam"
                                        value="{{ old('tglPinjam') }}">
                                    @error('tglPinjam')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- jam pinjam --}}
                            <div class="col-md-12">
                                <div class="mt-3">
                                    <label for="">Jam Pinjam</label><br>
                                    <input type="time" class="form-control mt-2" id="jamPinjam" name="jamPinjam"
                                        value="{{ old('jamPinjam') }}">
                                    @error('jamPinjam')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- tanggal selesai --}}
                            <div class="col-md-12">
                                <div class="mt-3">
                                    <label for="">Tanggal Selesai Peminjaman</label><br>
                                    <input type="date" class="form-control mt-2" id="tanggal" name="tglSelesai"
                                        value="{{ old('tglSelesai') }}">
                                    @error('tglSelesai')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>



                            {{-- jam selesai --}}
                            <div class="col-md-12">
                                <div class="mt-3">
                                    <label for="">Jam Selesai</label><br>
                                    <input type="time" class="form-control mt-2" id="jamSelesai" name="jamSelesai"
                                        value="{{ old('jamSelesai') }}">
                                    @error('jamSelesai')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-2 mt-3 d-grid">
                        <button type="submit" class="btn btn-lg btn-warning mt-3">Pinjam</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
        jQuery(document).ready(function() {
            jQuery('#lantai').change(function() {
                let cid = jQuery(this).val();
                jQuery.ajax({
                    url: '/user/getRuangan',
                    type: 'post',
                    data: 'cid=' + cid +
                        '&_token={{ csrf_token() }}',
                    success: function(result) {
                        jQuery('#ruangan').html(result)
                    }
                });
            });
        });
    </script>
    <script>
        $("#alert").fadeTo(1000, 500).slideUp(500, function() {
            $("#alert").slideUp(500);
        });
    </script>

    <script type="text/javascript">
        window.onload = function() { //from ww  w . j  a  va2s. c  o  m
            var today = new Date().toISOString().split('T')[0];
            document.getElementsByName("tglPinjam")[0].setAttribute('min', today);
        }
    </script>
@endsection
