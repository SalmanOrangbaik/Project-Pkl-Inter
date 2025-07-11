@extends('layouts.backend')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-8 grid-margin stretch-card w-100">
                    <div class="card">
                        <div class="card-body performane-indicator-card">
                            <div class="d-sm-flex">
                                <h4 class="card-title flex-shrink-1">Data Booking</h4>
                            </div>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-15">
                                        <div class="card">
                                            <a href="{{ route('backend.booking.export') }}" class="btn btn-sm btn-danger me-2">
                                                <i class="fa fa-file-pdf"></i> Export PDF
                                            </a>
                                            <a href="{{ route('backend.booking.create') }}" class="btn btn-outline-dark"
                                                style="float: right">Tambah Data</a>

                                            <div class="card-body">
                                                @if (session('success'))
                                                    <div class="alert alert-success alert-dismissible fade show"
                                                        role="alert">
                                                        {{ session('success') }}
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                    </div>
                                                @endif
                                                <table class="table table-responsive">
                                                    <thead>
                                                        <th>No</th>
                                                        <th>Ruangan</th>
                                                        <th>Penanggung Jawab</th>
                                                        <th>Tanggal</th>
                                                        <th>Jam Mulai</th>
                                                        <th>Jam Selesai</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($bookings as $data)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $data->ruang->nama ?? '-' }}</td>
                                                                <td>{{ $data->user->name ?? '-' }}</td>
                                                                <td>{{ $data->tanggal }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($data->jam_mulai)->format('h:i A') }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($data->jam_selesai)->format('h:i A') }}</td>
                                                                <td>{{$data->status}}</td>
                                                                <td>
                                                                    <a href="{{route('backend.booking.edit', $data->id)}}"
                                                                        class="btn btn-sm btn-warning">Edit</a> |
                                                                    <a href="{{route('backend.booking.show', $data->id)}}"
                                                                        class="btn btn-sm btn-primary">Show</a> |
                                                                    <form action="{{route('backend.booking.destroy', $data->id)}}"
                                                                        method="POST" style="display:inline;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                                            onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div> {{-- end card-body --}}
                                        </div> {{-- end card --}}
                                    </div>
                                </div>
                            </div> {{-- end container --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
