@extends('User.LayoutUser')
@section('userContent')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="col-md-12">
                <h2>Prosedur pinjam</h2>
            </div>
            @foreach ($prosedur_pinjam as $item)
                <div class="col-md-12"><p>{{ $item->prosedur_pinjam }}</p></div>
            @endforeach
        </div>
        <div class="col-md-6"></div>
    </div>
</div>

@endsection