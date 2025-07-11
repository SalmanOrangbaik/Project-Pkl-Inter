@extends('layouts.frontend')
@section('content')
    <div class="container-fluid contact bg-light py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                    <h1 class="display-4 mb-4">Booking Ruangan</h1>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                    <form action="{{ route('booking.store') }}" method="POST">

                        @csrf
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="date" class="form-control" name="tanggal" required>
                                    <label for="tanggal">Tanggal</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="time" class="form-control" name="jam_mulai" required>
                                    <label for="jam_mulai">Jam Mulai</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="time" class="form-control" name="jam_selesai" required>
                                    <label for="jam_selesai">Jam Selesai</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <select name="ruang_id" class="form-select" required>
                                        <option selected disabled>Pilih Ruangan</option>
                                        @foreach ($ruang as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                    <label for="ruang_id">Ruangan</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary w-100 py-3">Booking Sekarang</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
