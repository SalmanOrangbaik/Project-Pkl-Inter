@extends('layouts.backend')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-8 grid-margin stretch-card w-100">
          <div class="card">
            <div class="card-body performane-indicator-card">
                <div class="d-sm-flex">
                    <h4 class="card-title flex-shrink-1">Data User</h4>
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-15">
                            <div class="card">

                                <a href="{{route('backend.user.create')}}" class="btn btn-outline-dark"
                                    style="float: right">Tambah Data</a>

                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    <table class="table table-responsive">
                                        <thead>
                                            <th>No</th>
                                            <th>Nama User</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($user as $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->name }}</td>
                                                    <td>{{ $data->email }}</td>
                                                    <td>
                                                        <a href="{{ route('backend.user.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a> |
                                                    
                                                        <form action="{{ route('backend.user.destroy', $data->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
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
