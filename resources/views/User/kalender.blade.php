@extends('User.LayoutUser')
@section('userContent')
    <link rel="stylesheet" href="{{ asset('Fullcalendar/fullendar.css') }}">
    <script src="{{ asset('Fullcalendar/fullcalendar.js') }}"></script>
    <div class="container mb-4 mt-5">
        <div id='calendar'></div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                weekday: 'long',
                height: 600,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek'
                },
                events: <?php echo $event; ?>,
            });
            calendar.render();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
@endsection
