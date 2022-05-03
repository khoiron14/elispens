@extends('layouts.app')

@push('head')
<style>
    .have {
        margin-top: 1.25rem;
    }

    .have a {
        text-decoration: none;
        columns: var(--color-main-brand);
        font-weight: 600;
    }

    .side-background {
        background-image: url(../images/side-background.png);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        width: 100%;
        height: 100vh;
    }
</style>
@endpush

@section('content')
<div class="row">
    <div class="col-md-6 d-none d-md-block">
        <div class="side-background"></div>
    </div>
    <div class="col-12 col-md-6">
        <div class="container">
            <div class="row vh-100 justify-content-center align-items-center">
                <div class="col-10 col-md-8">
                    <a href="{{ route('home') }}"><img src="{{ asset('images/logo2.png') }}" alt="elispens"
                            height="40" /></a>
                    <h3 class="my-4"><strong>Daftar Akun ELIS</strong></h3>
                    <form method="POST" action="{{ route('register.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}" placeholder="Masukkan Nama Lengkap" required>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        @if (request()->type == 'lecturer')
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip"
                                name="nip" value="{{ old('nip') }}" placeholder="Masukkan NIP" required>
                            @error('nip')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        @elseif (request()->type == 'student')
                        <div class="form-group">
                            <label for="nrp">NRP</label>
                            <input type="text" class="form-control @error('nrp') is-invalid @enderror" id="nrp"
                                name="nrp" value="{{ old('nrp') }}" placeholder="Masukkan NRP" required>
                            @error('nrp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="email">Alamat Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" placeholder="Masukkan Email" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="Masukkan Password" required
                                autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Ulangi Password</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" placeholder="Tulis Password" required
                                autocomplete="new-password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            <strong>{{ __('Register') }} sebagai {{ (request()->type == 'lecturer') ? 'Dosen' :
                                'Mahasiswa' }}</strong>
                        </button>
                        <p class="have text-right">
                            Sudah Punya Akun? <a href="{{ route('login') }}">Masuk</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection