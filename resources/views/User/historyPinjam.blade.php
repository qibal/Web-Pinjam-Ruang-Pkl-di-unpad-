@extends('User.LayoutUser')
@section('userContent')
<div class="container mt-3">
    @if (Session::get('berhasil'))
    <div class="alert alert-primary" id="alert">{{ Session::get('berhasil') }}</div>
    @endif
    @foreach ($peminjam as $item)
    <div class="row">
        <div class="col-md-8 mt-4 m-auto shadow-sm p-3 mb-5 bg-body rounded border">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12 text-center"><h2>{{ $item->nama_ruangan }} - {{ $item->lantai }}</h2></div>
                        <div class="col-md-12 mt-3 pt-3 pb-3  border-bottom text-left">{{ $item->alasan }}</div>
                        <div class="col-md-12 mt-3 pt-3 pb-3  border-bottom text-left">{{ $item->nama_peminjam }}</div>
                        <div class="col-md-12  mt-3 pt-3 pb-3  border-bottom">
                            <div class="row">
                                <div class="col-md-6 mt-2 ">Tanggal Pinjam</div>
                                <div class="col-md-6 mt-2 "> {{ $item->tanggal_pinjam }} - {{ $item->tanggal_selesai }}</div>
                                <div class="col-md-6 mt-2">Jam Pinjam</div>
                                <div class="col-md-6 mt-2"> {{ $item->jam_pinjam }} {{ $item->jam_selesai }}</div>
                            </div>
                        </div>
                        @if ($item->status == "setuju")
                        <div class="col-md-12 mt-3 mb-2">
                            <div class="row">
                                <div class="col-md-6">No peminjaman</div>
                                <div class="col-md-6 "> {{ $item->no_peminjaman }}</div>
                            </div>
                        </div>

                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    @if ($item->status == "permohonan")
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning" role="alert">
                               Sedang di ajukan
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a href="/user/history_pinjam/batalPermohonan/{{ $item->id }}" class="btn btn btn-danger p-3 btn-block">Batalkan permohonan</a>
                        </div>
                    </div>
                    @elseif ($item->status == "setuju")
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning" role="alert">
                                Di setujui
                            </div>
                        </div>
                        <div class="col-md-12 btn-group">
                            <a href="/user/history_pinjam/selesaiPinjam/{{ $item->id }}" class="btn btn btn-success  btn-block">Selesai Pinjam</a>
                            <a href="/user/history_pinjam/batalPinjam/{{ $item->id }}" class="btn btn btn-danger  btn-block">batal pinjam</a>
                        </div>
                    </div>
                    @elseif ($item->status == "selesai")
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success" role="alert">
                                Selesai
                            </div>
                        </div>
                    </div>
                    @elseif ($item->status == "batal_pinjam")
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning" role="alert">
                                Batal Pinjam
                            </div>
                        </div>
                    </div>
                    @elseif ($item->status == "tolak")
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger" role="alert">
                                Permohonan di Tolak
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
     $("#alert").fadeTo(1000, 500).slideUp(500, function() {
         $("#alert").slideUp(500);
     });
 </script>
</div>
@endsection
