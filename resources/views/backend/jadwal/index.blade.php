@extends('layouts.backend')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-8 grid-margin stretch-card w-100">
                    <div class="card">
                        <div class="card-body performane-indicator-card">
                            <div class="d-sm-flex">
                                <h4 class="card-title flex-shrink-1">Data Jadwal</h4>
                            </div>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-15">
                                        <div class="card">

                                            <a href="{{ route('backend.jadwal.create') }}" class="btn btn-outline-dark"
                                                style="float: right">Tambah Data</a>

                                            <div class="card-body">
                                                <table class="table table-responsive">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Ruangan</th>
                                                            <th>Tanggal</th>
                                                            <th>Jam Mulai</th>
                                                            <th>Jam Selesai</th>
                                                            <th>Keterangan</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($jadwal as $data)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $data->ruang->nama ?? '-' }}</td>
                                                                <td>{{ $data->tanggal }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($data->jam_mulai)->format('h:i A') }}
                                                                </td>
                                                                <td>{{ \Carbon\Carbon::parse($data->jam_selesai)->format('h:i A') }}
                                                                </td>
                                                                <td>{{ $data->keterangan }}</td>
                                                                <td>
                                                                    <a href="{{ route('backend.jadwal.edit', $data->id) }}"
                                                                        class="btn btn-sm btn-warning">Edit</a> |
                                                                    <a href="{{ route('backend.jadwal.show', $data->id) }}"
                                                                        class="btn btn-sm btn-primary">Show</a> |
                                                                    <form
                                                                        action="{{ route('backend.jadwal.destroy', $data->id) }}"
                                                                        method="POST" style="display:inline;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="button"
                                                                            class="btn btn-sm btn-danger btn-delete">Hapus</button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.querySelectorAll('.btn-delete').forEach(btn => {
            btn.addEventListener('click', function() {
                Swal.fire({
                    title: 'Yakin ingin hapus?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.closest('form').submit();
                    }
                });
            });
        });
    </script>
@endpush
