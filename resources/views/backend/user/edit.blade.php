@extends('layouts.backend')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-8 grid-margin stretch-card w-100">
                    <div class="card">
                        <div class="card-body performane-indicator-card">
                            <div class="d-sm-flex">
                                <h4 class="card-title flex-shrink-1">Edit Data User</h4>
                            </div>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-15">
                                        <div class="card">

                                            <div class="card-body">
                                                <form action="{{ route('backend.user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="form-group mb-5 mt-3">
                                                        <label>Nama</label>
                                                        <input type="text" 
                                                            name="name" 
                                                            value="{{ old('name', $user->name) }}"
                                                            class="form-control @error('name') is-invalid @enderror">
                                                        @error('name')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-5 mt-3">
                                                        <label>Email</label>
                                                        <input type="email" 
                                                            name="email" 
                                                            value="{{ old('email', $user->email) }}"
                                                            class="form-control @error('email') is-invalid @enderror">
                                                        @error('email')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-5 mt-3">
                                                        <label>Password</label>
                                                        <input type="password" 
                                                            name="password" 
                                                            class="form-control @error('password') is-invalid @enderror" 
                                                            autocomplete="new-password">
                                                        @error('password')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-5 mt-3">
                                                        <label>Konfirmasi Password</label>
                                                        <input type="password" 
                                                            name="password_confirmation" 
                                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                                            autocomplete="new-password">
                                                        @error('password_confirmation')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>


                                                    <button type="submit" class="btn btn-primary mb-3 mt-2">Update</button>
                                                </form>
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
