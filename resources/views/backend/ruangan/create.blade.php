@extends('layouts.backend')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-8 grid-margin stretch-card w-100">
                    <div class="card">
                        <div class="card-body performane-indicator-card">
                            <div class="d-sm-flex">
                                <h4 class="card-title flex-shrink-1">Data Ruangan</h4>
                            </div>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-15">
                                        <div class="card">

                                            <div class="card-body">
                                                <form action="{{ route('backend.ruang.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group mb-5 mt-3">
                                                <label>Nama Ruangan</label>
                                                <input type="text"
                                                    class="form-control @error('nama') is-invalid @enderror"
                                                    name="nama">
                                                @error('nama')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-5 mt-3">
                                                <label>Kapasitas</label>
                                                <input type="integer" name="kapasitas"
                                                    class="form-control @error('kapasitas') is-invalid @enderror">
                                                @error('kapasitas')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-5 mt-3">
                                                <label>Fasilitas</label>
                                                <input type="text" name="fasilitas"
                                                    class="form-control @error('fasilitas') is-invalid @enderror">
                                                @error('fasilitas')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-5 mt-3">
                                                <label>Ruangan</label>
                                                <input type="file" name="cover"
                                                    class="form-control @error('cover') is-invalid @enderror">
                                                @error('cover') 
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                                <button type="submit" class="btn btn-primary mb-3 mt-2">Simpan</button>
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
