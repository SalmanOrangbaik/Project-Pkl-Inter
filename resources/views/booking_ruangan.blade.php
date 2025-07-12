@extends('layouts.frontend')
@section('content')

<div class="container py-5">
    <h2 class="text-center mb-5 fw-bold">Daftar Ruangan</h2>

    <div class="row">
        @forelse($ruang as $data)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0 rounded-4">
                    @if($data->cover)
                        <img src="{{ asset('storage/' . $data->cover) }}" class="card-img-top rounded-top" style="height: 200px; object-fit: cover;" alt="{{ $data->nama }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $data->nama }}</h5>
                        <p class="card-text"><strong>Kapasitas:</strong> {{ $data->kapasitas }} orang</p>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach(explode(',', $data->fasilitas) as $fasilitas)
                            <span class="badge bg-light text-dark border">
                                <i class="bi  me-1"></i>
                                {{ trim($fasilitas) }}
                            </span>
                            @endforeach
                        </div>
                        
                        <a href="{{ route('detail_ruangan', $data->id) }}" class="btn btn-primary mt-2">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="alert alert-info">Belum ada ruangan tersedia.</p>
            </div>
        @endforelse
    </div>
</div>

@endsection