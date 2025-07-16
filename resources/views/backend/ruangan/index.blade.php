@extends('layouts.backend')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-8 grid-margin stretch-card w-100">
                    <div class="card">
                        <div class="card-body performane-indicator-card">
                            <div class="d-sm-flex">
                                <h4 class="card-title flex-shrink-1">Data Ruang</h4>
                            </div>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-15">
                                        <div class="card">

                                            <a href="{{ route('backend.ruang.create') }}" class="btn btn-outline-dark"
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
                                                        <th>Nama Ruangan</th>
                                                        <th>Kapasitas</th>
                                                        <th>Fasilitas</th>
                                                        <th>Ruangan</th>
                                                        <th>Aksi</th>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($ruang as $data)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $data->nama }} </td>
                                                                <td>{{ $data->kapasitas }}</td>
                                                                <td>{{ Str::limit($data->fasilitas, 50) }}</td>
                                                                <td><img src="{{ asset('storage/' . $data->cover) }}"
                                                                        alt="cover"
                                                                        style="width: 150px; height: auto; border-radius: 8px;">
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('backend.ruang.edit', $data->id) }}"
                                                                        class="btn btn-sm btn-warning">Edit</a> |
                                                                    <a href="{{ route('backend.ruang.show', $data->id) }}"
                                                                        class="btn btn-sm btn-primary">Show</a> |
                                                                    <form
                                                                        action="{{ route('backend.ruang.destroy', $data->id) }}"
                                                                        method="POST" style="display:inline;"
                                                                        class="delete-form">
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
            @endsection

            @push('scripts')
                <script>
                    document.querySelectorAll('.btn-delete').forEach(btn => {
                        btn.addEventListener('click', function() {
                            Swal.fire({
                                title: 'Yakin ingin hapus?',
                                text: "Data yang dihapus tidak bisa dikembalikan!",
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
