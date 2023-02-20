@extends('User.LayoutUser')
@section('userContent')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <img src="{{ asset('gambar_ruangan/'.$ruangan->gambar_ruangan) }}" alt="" class="img-fluid shadow">
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <h2> Ruang {{ $ruangan->nama_ruangan }} - lantai {{ $ruangan->lantai }}</h2>
                </div>
                <hr>
                {{-- <div class="col-md-3">
                    <p>Lokasi</p>
                </div>
                <div class="col-md-9">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Adipisci temporibus tempora ea accusantium, veniam voluptatibus enim voluptas consequuntur odio nobis!
                </div> --}}

                <div class="col-md-12 d-grid mt-3 mb-3 ">
                    <a href="/user/formPinjam" class="btn btn-warning btn-lg shadow">Pinjam Sekarang</a>
                </div>

                <div class="col-md-12 mt-3">
                    <h5 class="fw-semibold">Fasilitas yang tersedia :</h5>
                </div>
                <div class="col-md-12">
                    <p>{{ $ruangan->fasilitas }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
