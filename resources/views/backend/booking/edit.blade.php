@extends('layouts.backend')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4>Edit Booking</h4>
                <form action="{{ route('backend.booking.update', $booking->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>Ruangan</label>
                        <select name="ruang_id" class="form-control">
                            @foreach($ruangs as $ruang)
                                <option value="{{ $ruang->id }}" {{ $booking->ruang_id == $ruang->id ? 'selected' : '' }}>
                                    {{ $ruang->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>User</label>
                        <select name="user_id" class="form-control">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $booking->user_id == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" value="{{ $booking->tanggal }}">
                    </div>

                    <div class="mb-3">
                        <label>Jam Mulai</label>
                        <input type="time" name="jam_mulai" class="form-control" value="{{ $booking->jam_mulai }}">
                    </div>

                    <div class="mb-3">
                        <label>Jam Selesai</label>
                        <input type="time" name="jam_selesai" class="form-control" value="{{ $booking->jam_selesai }}">
                    </div>

                    <div class="mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="selesai" {{ $booking->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="ditolak" {{ $booking->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                            <option value="diterima" {{ $booking->status == 'ditolak' ? 'selected' : '' }}>Diterima</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
