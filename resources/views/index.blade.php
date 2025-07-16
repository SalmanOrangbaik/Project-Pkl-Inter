@extends('layouts.frontend')
@section('content')
    <!-- Carousel dan Hero -->
    <div class="header-carousel owl-carousel">
        @foreach ($ruang as $index => $data)
            <div class="header-carousel-item {{ $index == 0 ? 'active' : '' }}">
                <div class="header-carousel-item-img-{{ $index + 1 }}">
                    <img src="{{ asset('storage/' . $data->cover) }}" class="img-fluid w-100" alt="{{ $data->nama }}"
                        style="height: 800px; object-fit: cover;">
                </div>
                <div class="carousel-caption">
                    <div class="carousel-caption-inner text-start p-3">
                        <h1 class="display-1 text-white mb-4">SIRUANG</h1>
                        <h3 class="mb-4 text-white">
                            Sistem Penjadwalan Ruangan.
                        </h3>
                        <a href="{{ route('booking.create') }}"
                            class="btn btn-outline-primary px-4 py-2 rounded-pill">Booking Sekarang</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Kalender -->
    <section class="py-5">
        <div class="container">
            <div class="card border-0 shadow rounded-4">
                <div class="card-body">
                    <h4 class="fw-semibold text-center mb-4">Kalender Jadwal & Booking</h4>
                    <div id="calendar"></div>
                </div>
                <div class="mt-4">
                        <h6>Keterangan:</h6>
                        <ul class="list-unstyled d-flex flex-wrap gap-3">
                            <li><span class="legend-box bg-warning"></span> Booking Diterima / Selesai</li>
                            <li><span class="legend-box bg-info"></span> Jadwal Tetap</li>
                        </ul>
                    </div>
            </div>
        </div>
    </section>

    {{-- FullCalendar --}}
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/locales-all.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'id',
                height: 'auto',
                aspectRatio: 1.6,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,listMonth'
                },
                buttonText: {
                    today: 'Hari ini',
                    month: 'Bulan',
                    list: 'List'
                },
                events: @json($events),
                eventDisplay: 'block',
                eventTextColor: '#fff',
                eventDidMount: function(info) {
                    if (info.event.extendedProps.description) {
                        new bootstrap.Tooltip(info.el, {
                            title: info.event.extendedProps.description,
                            placement: 'top',
                            trigger: 'hover',
                            container: 'body'
                        });
                    }
                }
            });
            calendar.render();
        });
    </script>

    <style>
        .legend-box {
            display: inline-block;
            width: 20px;
            height: 20px;
            border-radius: 4px;
            margin-right: 8px;
        }
    </style>
@endsection
