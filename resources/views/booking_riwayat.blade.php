@extends('layouts.frontend')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4 fw-bold text-center">Riwayat Booking Anda</h2>

        {{-- Form Filter --}}
        <form method="GET" action="{{ route('booking_riwayat') }}" class="mb-3">
            <div class="row">
                <div class="col-md-3 mb-2">
                    <select name="ruang_id" class="form-select">
                        <option value="">-- Filter Ruangan --</option>
                        @foreach ($ruangs as $data)
                            <option value="{{ $data->id }}" {{ request('ruang_id') == $data->id ? 'selected' : '' }}>
                                {{ $data->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-2">
                    <input type="date" name="tanggal" class="form-control" value="{{ request('tanggal') }}">
                </div>
                <div class="col-md-3 mb-2">
                    <select name="status" class="form-select">
                        <option value="">-- Filter Status --</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="diterima" {{ request('status') == 'diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                        <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>
                <div class="col-md-3 mb-2">
                    <button type="submit" class="btn btn-sm btn-primary me-2">Terapkan Filter</button>
                    <a href="{{ route('booking_riwayat') }}" class="btn btn-sm btn-secondary">Reset</a>
                </div>
            </div>
        </form>

        @if ($booking->count())
            <div class="table-responsive shadow-sm rounded">
                <table class="table table-hover align-middle text-center">
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
