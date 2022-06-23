@extends('layouts.dashboard')

@section('content')
<div class="page-info">
    <h1>
        <strong>Manajemen Sertifikat</strong>
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Manajemen</li>
            <li class="breadcrumb-item"><a href="{{ route('certificates.index') }}">Sertifikat</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                Ubah
            </li>
        </ol>
    </nav>
</div>
<div class="main-wrapper">
    <form action="{{ route('certificates.update', $certificate) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="subject">Subjek</label>
                    <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject"
                        name="subject" value="{{ old('subject', $certificate->subject) }}" placeholder="Tulis Subjek" required>
                    @error('subject')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="publisher">Penerbit</label>
                    <input type="text" class="form-control @error('publisher') is-invalid @enderror" id="publisher"
                        name="publisher" value="{{ old('publisher', $certificate->publisher) }}" placeholder="Tulis Penerbit" required>
                    @error('publisher')
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
                    <label for="date">Tanggal Terbit</label>
                    <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date"
                        value="{{ old('date', Carbon\Carbon::parse($certificate->date)->format('Y-m-d')) }}" placeholder="Tulis Tanggal Terbit" required>
                    @error('date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="file">File</label>
                    <input type="file" class="form-control @error('file') is-invalid @enderror" id="file" name="file" aria-describedby="fileHelp" accept="application/pdf">
                    @error('file')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <small id="fileHelp" class="form-text text-muted">
                        Kosongkan jika tidak ingin mengupload file. Hanya anda yang dapat mendownload file yang sudah di upload.
                    </small>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection