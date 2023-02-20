@extends('Admin.LayoutAdmin2')
@section('adminContent')
    <div class="row">
        <div class="col-md-12 ">
            <div class="row">
            {{-- user --}}
            <div class="col-xl-3 col-md-3 mb-4">
                <div class="card border-left-primary  shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    pengguna</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-users-line fa-2x text-gray-300"></i>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

              {{-- ruangan --}}
              <div class="col-xl-3 col-md-3 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Ruangan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $ruangan }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-house fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

              {{-- lantai --}}
              <div class="col-xl-3 col-md-3 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Lantai</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $lantai }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-layer-group fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

              {{-- user --}}
              <div class="col-xl-3 col-md-3 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Sedang di Pinjam</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $peminjam }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-user-check fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>
@endsection
