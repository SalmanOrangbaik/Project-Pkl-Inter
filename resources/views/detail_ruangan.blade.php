@extends('layouts.frontend')

@section('content')
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    @if($ruang->cover)
                        <img src="{{ asset('storage/' . $ruang->cover) }}" class="img-fluid rounded" alt="Foto Ruangan">
                    @else
                        <img src="https://via.placeholder.com/500x300?text=No+Image" class="img-fluid rounded" alt="Foto Ruangan">
                    @endif
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h2"><b>{{ $ruang->nama }}</b></h1>

                        <ul class="list-inline mt-3">
                            <li class="list-inline-item">
                                <h6>Fasilitas:</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong>{{ $ruang->fasilitas }}</strong></p>
                            </li>
                            <br>
                            <li class="list-inline-item">
                                <h6>Kapasitas:</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong>{{ $ruang->kapasitas }} orang</strong></p>
                            </li>
                        </ul>

                        <div class="row pt-4">
                            <div class="col d-grid">
                                <a href="{{ route('booking_ruangan') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                            <div class="col d-grid">
                                <a href="{{ route('booking.create', ['ruang_id' => $ruang->id]) }}" class="btn btn-primary">Booking Sekarang</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
