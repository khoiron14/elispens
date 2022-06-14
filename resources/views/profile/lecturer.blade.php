@extends('layouts.dashboard')

@push('head')
<link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endpush

@push('script')
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('select').select2({
            placeholder: {
                id: '-1',
                text: 'Pilih Program Studi',
            },
            allowClear: true,
        });
    });
</script>
@endpush

@section('content')
<div class="page-info">
    <h1>
        <strong>Profil Dosen</strong>
    </h1>
</div>
<div class="main-wrapper">
    <form action="{{ route('profile.update', $user) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ old('name', $user->name) }}" placeholder="Tulis Nama" required>
                    @error('name')
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
                    <label for="nip">NIP</label>
                    <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip"
                        value="{{ old('nip', $user->lecturer->nip) }}" placeholder="Tulis NIP" required>
                    @error('nip')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="study_program_id">Program Studi</label>
                    <select class="js-states form-control @error('study_program_id') is-invalid @enderror"
                        id="study_program_id" name="study_program_id" tabindex="-1" style="display: none; width: 100%">
                        <option id="-1" search="" value="{{ null }}" hidden selected>Pilih Program Studi</option>
                        @foreach ($studyPrograms as $studyProgram)
                        <option value="{{ $studyProgram->id }}" @selected(old('study_program_id',$user->lecturer->study_program_id)==$studyProgram->id)>
                            {{ $studyProgram->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('study_program_id')
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
                    <label for="address">Alamat</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                        value="{{ old('address', $user->lecturer->address) }}" placeholder="Tulis Alamat">
                    @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone">No. HP</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="phone" name="phone"
                        value="{{ old('phone', $user->lecturer->phone) }}" placeholder="Tulis No. HP">
                    @error('phone')
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
                        name="password" aria-describedby="passwordHelp" placeholder="Tulis Password"
                        autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <small id="passwordHelp" class="form-text text-muted">
                        Kosongkan jika tidak ingin mengubah password.
                    </small>
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
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="gender">Jenis Kelamin</label>
                    <div class="form-control" id="gender">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender-m" value="M" @checked(old('gender',$user->lecturer->gender)=='M')>
                            <label class="form-check-label" for="gender-m">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender-f" value="F" @checked(old('gender',$user->lecturer->gender)=='F')>
                            <label class="form-check-label" for="gender-f">Perempuan</label>
                        </div>
                    </div>
                    @error('gender')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="photo">Foto</label>
                    <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo" accept="image/*">
                    @error('photo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <small id="passwordHelp" class="form-text text-muted">
                        Kosongkan jika tidak ingin mengubah foto.
                    </small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>
@endsection