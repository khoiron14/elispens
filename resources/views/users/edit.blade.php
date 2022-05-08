@extends('layouts.dashboard')

@push('script')
<script>
    $(document).ready(function() {
        $('#identity').attr('disabled', $('#role').val() == '0');
        
        $('#role').change((event) => {
            // if the selected role is admin
            // then input nip or nrp disabled and reset
            $('#identity').attr('disabled', $(event.target).val() == '0');
            $(event.target).val() == '0' ? $('#identity').val('') : '';
        });
    });
</script>
@endpush

@section('content')
<div class="page-info">
    <h1>
        <strong>Manajemen User</strong>
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Manajemen</li>
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                Ubah
            </li>
        </ol>
    </nav>
</div>
<div class="main-wrapper">
    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ old('name', $user->name) }}" placeholder="Tulis Nama Lengkap" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control @error('role') is-invalid @enderror custom-select" id="role"
                        name="role" disabled>
                        <option value="0" @selected(old('role',$user->role)==0)>Admin</option>
                        <option value="1" @selected(old('role',$user->role)==1)>Dosen</option>
                        <option value="2" @selected(old('role',$user->role)==2)>Mahasiswa</option>
                    </select>
                    @error('role')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="identity">NIP / NRP</label>
                    @php
                        if ($user->roleName == 'Dosen') {
                            $identity = $user->lecturer->nip;
                        } elseif ($user->roleName == 'Mahasiswa') {
                            $identity = $user->student->nrp;
                        }
                    @endphp
                    <input type="text" class="form-control @error('identity') is-invalid @enderror" id="identity"
                        name="identity" value="{{ old('identity', $identity) }}" placeholder="Tulis NIP / NRP" required>
                    @error('identity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email', $user->email) }}" placeholder="Tulis Email" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password" aria-describedby="passwordHelp" placeholder="Tulis Password" autocomplete="new-password">
                    <small id="passwordHelp" class="form-text text-muted">Kosongkan jika tidak ingin mengubah password.</small>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password_confirmation">Ulangi Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        placeholder="Tulis Password" autocomplete="new-password">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection