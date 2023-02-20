@extends('Admin.LayoutAdmin2')
@section('adminContent')
    <div class="row">
        <div class="col-md-5 m-auto border">
            <div class="row">
                <div class="col-md-12 text-center pt-3 pb-3 border-bottom">
                    <h2>Profile Admin</h2>
                </div>
                {{-- email --}}
                <div class="col-md-12 border-bottom pt-3 pb-2">
                    <div class="row">
                        <div class="col-md-4 ">
                            <p>Email</p>
                        </div>
                        <div class="col-md-4">
                            <p>: {{ auth()->user()->email }}</p>
                        </div>
                    </div>
                </div>

                {{-- Password --}}
                <div class="col-md-12 pt-3 pb-2 border-bottom ">
                    <div class="row">
                        <div class="col-md-4 ">
                            <p>Password</p>
                        </div>
                        <div class="col-md-4">
                            <p>: {{ Str::limit(auth()->user()->password, '5') }}</p>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{ url('/admin/ProfileAdmin/ubahPassword') }}" class="nav-item text-dark">Ubah</a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
