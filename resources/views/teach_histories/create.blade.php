@extends('layouts.dashboard')

@push('head')
<link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endpush

@push('script')
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('select').select2();
    });
</script>
@endpush

@section('content')
<div class="page-info">
    <h1>
        <strong>Manajemen Riwayat Mengajar</strong>
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Manajemen</li>
            <li class="breadcrumb-item"><a href="{{ route('teaches.index') }}">Riwayat Mengajar</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                Tambah
            </li>
        </ol>
    </nav>
</div>
<div class="main-wrapper">
    <form action="{{ route('teaches.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="course_id">Mata Kuliah</label>
                    <select class="js-states form-control @error('course_id') is-invalid @enderror"
                        id="course_id" name="course_id" tabindex="-1" style="display: none; width: 100%">
                        @foreach ($courses as $course)
                        <option value="{{ $course->id }}" @selected(old('course_id')==$course->id)>
                            {{ $course->code . ' - ' . $course->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('course_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="semester">Semester</label>
                    <div class="form-control" id="semester">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="semester" id="semester-o" value="O" @checked(old('semester','O')=='O')>
                            <label class="form-check-label" for="semester-o">Ganjil</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="semester" id="semester-e" value="E" @checked(old('semester')=='E')>
                            <label class="form-check-label" for="semester-e">Genap</label>
                        </div>
                    </div>
                    @error('semester')
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
                    <label for="year">Tahun</label>
                    <input type="number" min="1900" max="2099" step="1" class="form-control @error('year') is-invalid @enderror" id="year" name="year"
                        value="{{ old('year') }}" placeholder="Tulis Tahun" required>
                    @error('year')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection