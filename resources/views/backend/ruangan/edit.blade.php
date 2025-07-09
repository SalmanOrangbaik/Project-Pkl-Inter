@extends('layouts.backend')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-8 grid-margin stretch-card w-100">
                    <div class="card">
                        <div class="card-body performane-indicator-card">
                            <div class="d-sm-flex">
                                <h4 class="card-title flex-shrink-1">Edit Ruangan</h4>
                            </div>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-15">
                                        <div class="card">
                                            <div class="card-body">
                                                <form action="{{ route('backend.ruang.update', $ruang->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="form-group mb-5 mt-3">
                                                        <label>Nama Ruangan</label>
                                                        <input type="text"
                                                            class="form-control @error('nama') is-invalid @enderror"
                                                            name="nama" value="{{ old('nama', $ruang->nama) }}">
                                                        @error('nama')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-5 mt-3">
                                                        <label>Kapasitas</label>
                                                        <input type="number" name="kapasitas"
                                                            class="form-control @error('kapasitas') is-invalid @enderror"
                                                            value="{{ old('kapasitas', $ruang->kapasitas) }}">
                                                        @error('kapasitas')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-5 mt-3">
                                                        <label>Fasilitas</label>
                                                        <input type="text" name="fasilitas"
                                                            class="form-control @error('fasilitas') is-invalid @enderror"
                                                            value="{{ old('fasilitas', $ruang->fasilitas) }}">
                                                        @error('fasilitas')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-5 mt-3">
                                                        <label>Gambar Ruangan</label>
                                                        <input type="file" name="cover"
                                                            class="form-control @error('cover') is-invalid @enderror">
                                                        @error('cover')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror

                                                        @if ($ruang->cover)
                                                            <div class="mt-3">
                                                                <img src="{{ asset('storage/' . $ruang->cover) }}" alt="Gambar" style="width: 150px; border-radius: 8px;">
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <button type="submit" class="btn btn-primary mb-3 mt-2">Update</button>
                                                    <a href="{{ route('backend.ruang.index') }}" class="btn btn-secondary mb-3 mt-2">Kembali</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
