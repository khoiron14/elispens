@extends('layouts.app')

@section('content')
<div class="container centered-element headline">
    <h1 class="text-center"><strong>Cari Data Dosen</strong></h1>
    <p class="text-center">
        Cari Data Dosen Politeknik Elektronika Negeri Surabaya dengan Mudah!
    </p>
    <form method="GET" action="{{ route('home') }}">
        <div class="row">
            <div class="form-group col-md-4 pr-md-0">
                <label class="sr-only" for="keyword">Kata Kunci</label>
                <input type="text" class="form-control" id="keyword" name="keyword" aria-describedby="keywordHelp" placeholder="Masukkan Kata Kunci">
                <small id="passwordHelp" class="form-text text-muted">
                    Berdasarkan nama atau nip.
                </small>
            </div>
            <div class="form-group col-md-4 pr-md-0">
                <label class="sr-only" for="study_program">Mata Kuliah</label>
                <select class="form-control custom-select" id="study_program" name="study_program">
                    @foreach ($studyPrograms as $studyProgram)
                    <option value="{{ $studyProgram->name }}" @selected(old('study_program')==$studyProgram->name)>
                        {{ $studyProgram->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn my-custom-form-btn btn-sm">Cari</button>
            </div>
        </div>
        @if (request()->query('keyword'))
            <div class="row">
                <div class="col-12 d-flex flex-row">
                    <div class="mr-2">
                        Mencari "{{ request()->query('keyword') }}" di {{ request()->query('study_program') }}
                    </div>
                    <a href="{{ route('home') }}">reset</a>
                </div>
            </div>
        @endif
    </form>
</div>

<div class="container main">
    <div class="row main-section mt-5">
        @forelse ($lecturers as $lecturer)
            <div class="col-6 col-md-3">
                <a href="{{ route('lecturer_detail', $lecturer) }}">
                    <figure class="figure figure-rounded">
                        <img src="{{ $lecturer->gender == 'F' ? asset('images/LandingPage/images3.png') : asset('images/LandingPage/images1.png') }}" class="figure-img img-fluid rounded" alt="Images" />
                        <figcaption class="figure-caption">{{ $lecturer->user->name }}</figcaption>
                    </figure>
                </a>
            </div>
        @empty
            <span>Tidak ada data.</span>
        @endforelse
    </div>
</div>
@endsection