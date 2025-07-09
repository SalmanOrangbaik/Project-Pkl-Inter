@extends('layouts.backend')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-8 grid-margin stretch-card w-100">
                    <div class="card">
                        <div class="card-body performane-indicator-card">
                            <h1 class="card-title flex-shrink-1"><strong>Detail Ruangan</strong></h1>
                            
                            <div class="mb-3 mt-5">
                                <strong>Nama Ruangan:</strong>
                                <p>{{ $ruang->nama }}</p>
                            </div>

                            <div class="mb-3">
                                <strong>Kapasitas:</strong>
                                <p>{{ $ruang->kapasitas }}</p>
                            </div>

                            <div class="mb-3">
                                <strong>Fasilitas:</strong>
                                <p>{{ $ruang->fasilitas }}</p>
                            </div>

                            <div class="mb-3">
                                <strong>Gambar Ruangan:</strong><br>
                                <img src="{{ asset('storage/' . $ruang->cover) }}" alt="cover"
                                     style="width: 300px; height: auto; border-radius: 10px;">
                            </div>
                            <a href="{{ route('backend.ruang.index') }}" class="btn btn-primary mb-3">Kembali</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
