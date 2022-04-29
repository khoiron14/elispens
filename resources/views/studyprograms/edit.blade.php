@extends('layouts.dashboard')


@section('content')
<div class="page-info">
    <h1>
        <strong>Program Studi</strong>
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">M</li>
            <li class="breadcrumb-item"><a href="{{ route('studyprograms.index') }}">Program Studi</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                Ubah
            </li>
        </ol>
    </nav>
</div>
<div class="main-wrapper">
    <form action="{{ route(studyPrograms.update', $studyProgram) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ old('name', $studyProgram->name) }}" placeholder="Tulis Nama" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                   
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection