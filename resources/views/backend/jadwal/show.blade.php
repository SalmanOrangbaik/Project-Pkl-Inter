@extends('layouts.backend')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title flex-shrink-1"><strong>Detail Jadwal</strong></h1>


                    <table class="table">
                        <tr>
                            <th>Nama Ruangan</th>
                            <td>{{ $jadwal->ruang->nama }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>{{ $jadwal->tanggal }}</td>
                        </tr>
                        <tr>
                            <th>Jam Mulai</th>
                            <td>{{ $jadwal->jam_mulai }}</td>
                        </tr>
                        <tr>
                            <th>Jam Selesai</th>
                            <td>{{ $jadwal->jam_selesai }}</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>{{ $jadwal->keterangan }}</td>
                        </tr>
                    </table>
                    <a href="{{ route('backend.jadwal.index') }}" class="btn btn-primary mb-3 mt-3">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
