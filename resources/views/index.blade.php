@extends('layouts.frontend')
@section('content')

    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h4 class="modal-title mb-0" id="exampleModalLabel">Search by keyword</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->

    <!-- Carousel Start -->
    <div class="header-carousel owl-carousel">
        @foreach ($ruang as $index => $data)
            <div class="header-carousel-item {{ $index == 0 ? 'active' : '' }}">
                <div class="header-carousel-item-img-{{ $index + 1 }}">
                    <img 
                        src="{{ asset('storage/' . $data->cover) }}" 
                        class="img-fluid w-100" 
                        alt="{{ $data->nama }}" 
                        style="height: 800px; object-fit: cover;"
                    >
                </div>
                <div class="carousel-caption">
                    <div class="carousel-caption-inner text-start p-3">
                        <h1 class="display-1 text-capitalize text-white mb-4">SIRUANG</h1>
                        <h3 class="mb-4 text-white">
                            Sistem Penjadwalan Ruangan Kelas dan Laboratorium. Digital, efisien, dan bebas bentrok jadwal.
                        </h3>
                        <a href="{{route ('booking.create')}}" class="btn btn-outline-primary px-4 py-2 rounded-pill">Booking Sekarang</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    
    
    <!-- Carousel End -->


    <!-- Calender Start -->
  <section class="py-5">
    <div class="container">
      <div class="card border-0 shadow rounded-4">
        <div class="card-body">
          <h4 class="fw-semibold text-center mb-4">Kalender Jadwal & Booking</h4>
          <div id="calendar"></div>
        </div>
      </div>
    </div>
  </section>
</div>
    {{-- Calender End --}}

<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');
    const calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      height: 'auto',
      aspectRatio: 1.6,
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,listMonth'
      },
      events: @json($events),
      eventColor: '#3A87AD',
      eventDisplay: 'block',
      eventTextColor: '#fff'
    });
    calendar.render();
  });
</script>


@endsection
