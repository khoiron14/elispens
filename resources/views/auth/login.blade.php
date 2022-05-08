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
                    <h3 class="my-4"><strong>Masuk ke Akun ELIS</strong></h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
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
                        <div class="form-group form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            <strong>{{ __('Login') }}</strong>
                        </button>
                        <p class="have text-right">
                            Belum Punya Akun? <a href="" data-toggle="modal" data-target="#registerModal">Daftar</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- register modal --}}
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Daftar Sebagai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a href="{{ route('register.create', 'lecturer') }}" class="btn btn-primary btn-block">
                    <strong>Dosen</strong>
                </a>
                <a href="{{ route('register.create', 'student') }}" class="btn btn-primary btn-block">
                    <strong>Mahasiswa</strong>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection