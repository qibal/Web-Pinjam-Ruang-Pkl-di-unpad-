@extends('Admin.LayoutAdmin2')
@section('adminContent')
    <div class="row">
        <div class="col-md-5">
            <link href='{{ asset('Fullcalendar/fullendar.css') }}' rel='stylesheet' />
            <script src='{{ asset('Fullcalendar/fullcalendar.js') }}'></script>
            <div id='calendar'></div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-6 text-center mt-2">
            <div class="row">
                {{-- <div class="col-md-12 mb-2">
                <div class="col-md-2">
                    <form action="">
                        <select name="status" id="" class="form-control" onchange="this.form.submit()">
                            <option hidden >status</option>
                            <option value="all">all</option>
                            <option value="setuju">Setuju</option>
                            <option value="batal_pinjam">Batal</option>
                        </select>
                    </form>
                </div>
                <div class="col-md-6">
                    <form action="">
                        <input type="text" placeholder="Cari Peminjam">
                        <button type="submit">Cari</button>
                    </form>
                </div>
            </div> --}}
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <h2>Table peminjam</h2>
                        </div>
                        <div class="col-md-8">
                            <form action="" class="btn-group">
                                <input type="text" name="search" placeholder="ruangan / lantai / tanggal "
                                    class="btn border-dark border-opacity-50">

                                <button type="submit" class="btn btn-dark ">Cari</button>
                            </form>
                        </div>
                    </div>

                    @foreach ($peminjam as $item)
                        <div class="row">
                            <div class="col-md-12 mt-3 m-auto shadow-sm p-3 mb-5 bg-body rounded border">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <h2>Ruangan {{ $item->nama_ruangan }} - lantai {{ $item->lantai }}</h2>
                                            </div>
                                            <div class="col-md-12  text-left border-bottom">{{ $item->alasan }}</div>
                                            <div class="col-md-12 mt-3 pt-3 pb-3  mt-3 pt-3 pb-3  border-bottom text-left">
                                                {{ $item->nama_peminjam }}</div>
                                            <div class="col-md-12  mt-3 pt-3 pb-3  border-bottom">
                                                <div class="row">
                                                    <div class="col-md-6 mt-2 ">Tanggal Pinjam</div>
                                                    <div class="col-md-6 mt-2 "> {{ $item->tanggal_pinjam }} -
                                                        {{ $item->tanggal_selesai }}</div>
                                                    <div class="col-md-6 mt-2">Jam Pinjam</div>
                                                    <div class="col-md-6 mt-2"> {{ $item->jam_pinjam }} -
                                                        {{ $item->jam_selesai }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <div class="row">
                                                    <div class="col-md-6">No peminjaman</div>
                                                    <div class="col-md-6 "> {{ $item->no_peminjaman }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <div class="row">
                                                    <div class="col-md-6">Akun Peminjam</div>
                                                    <div class="col-md-6 "> {{ $item->email_user }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <h2>Status</h2>
                                        @if ($item->status == 'setuju')
                                            <div class="alert alert-primary mt-1">sedang di pinjam</div>
                                        @elseif ($item->status == 'tolak')
                                            <div class="alert alert-danger mt-1">Di tolak</div>
                                        @elseif ($item->status == 'batal_pinjam')
                                            <div class="alert alert-danger mt-1">Batal pinjam</div>
                                        @elseif ($item->status == 'selesai')
                                            <div class="alert alert-success mt-1">Selesai</div>
                                        @elseif($item->status == 'permohonan')
                                            <div class="alert alert-warning mt-1">{{ $item->status }}</div>
                                            <div class="btn btn-success">
                                                <a href="/admin/DataPeminjam/setuju/{{ $item->id }}"
                                                    class="text-white">Setuju</a>
                                            </div>
                                            <div class="btn btn-danger">
                                                <a href="/admin/DataPeminjam/delete/{{ $item->id }}"
                                                    class="text-white">Tolak</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>






        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                height: 600,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek'
                },
                events: <?php echo $event; ?>
            });
            calendar.render();
        });
    </script>
@endsection
