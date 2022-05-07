@extends('layouts.dashboard')

@section('content')
<div class="page-info">
    <h1>
        <strong>Manajemen Riwayat Pendidikan</strong>
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Manajemen</li>
            <li class="breadcrumb-item"><a href="{{ route('educations.index') }}">Riwayat Pendidikan</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                Ubah
            </li>
        </ol>
    </nav>
</div>
<div class="main-wrapper">
    <form action="{{ route('educations.update', $education) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="college">Perguruan Tinggi</label>
                    <input type="text" class="form-control @error('college') is-invalid @enderror" id="college"
                        name="college" value="{{ old('college',$education->college) }}" placeholder="Tulis Perguruan Tinggi" required>
                    @error('college')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="level">Jenjang</label>
                    <select class="form-control @error('level') is-invalid @enderror" id="level" name="level">
                        <option value="D1" @selected(old('level',$education->level)=='D1')>D1</option>
                        <option value="D2" @selected(old('level',$education->level)=='D2')>D2</option>
                        <option value="D3" @selected(old('level',$education->level)=='D3')>D3</option>
                        <option value="D4" @selected(old('level',$education->level)=='D4')>D4</option>
                        <option value="S1" @selected(old('level',$education->level)=='S1')>S1</option>
                        <option value="S2" @selected(old('level',$education->level)=='S2')>S2</option>
                        <option value="S3" @selected(old('level',$education->level)=='S3')>S3</option>
                    </select>
                    @error('level')
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
                    <label for="degree">Gelar Akademik</label>
                    <input type="text" maxlength="20" class="form-control @error('degree') is-invalid @enderror" id="degree" name="degree"
                        aria-describedby="degreeHelp" value="{{ old('degree',$education->degree) }}" placeholder="Tulis Gelar Akademik" required>
                    @error('degree')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <small id="degreeHelp" class="form-text text-muted">
                        Contoh S.ST
                    </small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="year">Tahun Ijazah</label>
                    <input type="number" min="1900" max="2099" step="1" class="form-control @error('year') is-invalid @enderror" id="year" name="year"
                        value="{{ old('year',$education->year) }}" placeholder="Tulis Tahun Ijazah" required>
                    @error('year')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection