@extends('layouts.dashboard')

@section('content')
<div class="page-info">
    <h1>
        <strong>Manajemen Mata Kuliah</strong>
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Manajemen</li>
            <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">Mata Kuliah</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                Ubah
            </li>
        </ol>
    </nav>
</div>
<div class="main-wrapper">
    <form action="{{ route('courses.update', $course) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="code">Kode</label>
                    <input type="text" class="form-control @error('code') is-invalid @enderror" id="code"
                        name="code" value="{{ old('code', $course->code) }}" placeholder="Tulis Kode Mata Kuliah" required>
                    @error('code')
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
                    <label for="name">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ old('name', $course->name) }}" placeholder="Tulis Nama Mata Kuliah" required>
                    @error('name')
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