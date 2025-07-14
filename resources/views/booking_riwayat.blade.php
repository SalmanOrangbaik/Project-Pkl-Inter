@extends('layouts.frontend')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4 fw-bold text-center">Riwayat Booking Anda</h2>

        @if ($booking->count())
            <div class="table-responsive shadow-sm rounded">
                <table class="table table-hover align-middle text-center">
                    <div class="d-flex justify-content-end mb-2">
                        <a href="{{ route('backend.booking.export') }}" class="btn btn-sm btn-danger">
                            <i class="fa fa-file-pdf"></i> Export PDF
                        </a>
                    </div>
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Ruangan</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($booking as $index => $data)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $data->ruang->nama }}</td>
                                <td>{{ \Carbon\Carbon::parse($data->tanggal)->translatedFormat('l, d F Y') }}</td>
                                <td>
                                    {{ \Carbon\Carbon::parse($data->jam_mulai)->format('h:i A') }} -
                                    {{ \Carbon\Carbon::parse($data->jam_selesai)->format('h:i A') }}
                                </td>
                                <td>
                                    @switch($data->status)
                                        @case('pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @break

                                        @case('diterima')
                                            <span class="badge bg-primary">Diterima</span>
                                        @break

                                        @case('ditolak')
                                            <span class="badge bg-danger">Ditolak</span>
                                        @break

                                        @case('selesai')
                                            <span class="badge bg-success">Selesai</span>
                                        @break

                                        @default
                                            <span class="badge bg-secondary">Tidak Diketahui</span>
                                    @endswitch
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info text-center">
                Belum ada riwayat booking ruangan.
            </div>
        @endif
    </div>
@endsection
