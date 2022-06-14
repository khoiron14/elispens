@extends('layouts.dashboard')

@section('content')
<div class="page-info">
    <h1>
        <strong>Manajemen Laman Personal</strong>
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Manajemen</li>
            <li class="breadcrumb-item"><a href="{{ route('pages.index') }}">Laman Personal</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                Ubah
            </li>
        </ol>
    </nav>
</div>
<div class="main-wrapper">
    <form action="{{ route('pages.update', $page) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                        value="{{ old('title', $page->title) }}" placeholder="Tulis Judul Laman" required>
                    @error('title')
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
                    <label for="url">URL</label>
                    <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url"
                        aria-describedby="urlHelp" value="{{ old('url', $page->url) }}" placeholder="Tulis URL Laman" required>
                    @error('url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <small id="urlHelp" class="form-text text-muted">
                        Harus diawali dengan <mark>http://</mark> atau <mark>https://</mark>
                    </small>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection