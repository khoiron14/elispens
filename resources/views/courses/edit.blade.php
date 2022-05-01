@extends('layouts.dashboard')

@push('script')
<script>
    $(document).ready(function() {
        $('#role').change((event) => {
            // if the selected role is admin
            // then input nip or nrp disabled
            if ($(event.target).val() == 0) {
                $('#identity').attr('disabled', true);
                $('#identity').attr('required', false);
            } else {
                $('#identity').attr('disabled', false);
                $('#identity').attr('required', true);
            }
        });
    });
</script>
@endpush

@section('content')
<div class="page-info">
    <h1>
        <strong>Manajemen Course</strong>
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Manajemen</li>
            <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">Course</a></li>
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
                    <label for="identity">Kode</label>
                    <input type="text" class="form-control @error('identity') is-invalid @enderror" id="identity"
                        name="identity" value="{{ old('identity', $course->identity) }}" placeholder="Tulis Kode Mata Kuliah" disabled>
                    @error('identity')
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
                    <label for="name">Mata Kuliah</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ old('name', $course->name) }}" placeholder="Tulis Mata Kuliah" required>
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