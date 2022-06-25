@extends('layouts.app')

@push('head')
    <style>
        body {
            background-image: url('/images/Union.png');
            background-size: contain;
            background-repeat: no-repeat;
            background-position:  top;
        }
        @media (max-width: 500px) {
            .headline h1  {
                font-size: 2.2rem !important;
            }
            .main .main-section a p {
                font-size: 1rem;
            }
        }
        @media( min-width : 1100px ) {
            .input-wrap {
                width: 75% !important;
            }
        }
        @media( max-width : 1099px ) {
            .input-wrap {
                width: 100% !important;
            }
        }

    </style>
@endpush

@section('content')
<div class="container centered-element headline">
    <h1 class="text-center"><strong>Cari Data Dosen</strong></h1>
    <p class="text-center">
        Cari Data Dosen Politeknik Elektronika Negeri Surabaya dengan Mudah!
    </p>
    <form method="GET" class="input-wrap" action="{{ route('home') }}">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="form-group  pr-md-0">
                        <label class="sr-only" for="keyword">Kata Kunci</label>
                        <input type="text" 
                            class="form-control form-control-lg" 
                            value="{{ request()->keyword }}"
                            id="keyword" 
                            name="keyword" 
                            aria-describedby="keywordHelp" 
                            placeholder="Masukkan Kata Kunci">
                        <small id="passwordHelp" class="form-text text-muted">
                            Berdasarkan nama atau nip.
                        </small>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="form-group  pr-md-0">
                        <label class="sr-only" for="study_program">Mata Kuliah</label>
                        <select class="form-control custom-select custom-select-lg" id="study_program" name="study_program">
                            <option value="Semua Jurusan" @selected(request()->study_program=="Semua Jurusan")>
                                Semua Jurusan
                            </option>
                            @foreach ($studyPrograms as $studyProgram)
                            <option value="{{ $studyProgram->name }}" @selected(request()->study_program==$studyProgram->name)>
                                {{ $studyProgram->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <button type="submit" class="btn my-custom-form-btn ">Cari</button>
                    </div>
                </div>
            </div>
        </div>
        @if (request()->study_program)
            <div class="row">
                <div class="col-12 d-flex flex-row">
                    <div class="mr-2">
                        Mencari <strong>{{ request()->keyword }}</strong> di <strong>{{ request()->study_program }}</strong>.
                        {{ $lecturers->count() }} Hasil.
                    </div>
                    <a href="{{ route('home') }}">Reset Pencarian</a>
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
                    <div class="figure-wrap figure-rounded">
                        <div class="images">
                            @php
                                $photo = App\Models\Image::where('imageable_id', $lecturer->user->id)
                                    ->where('imageable_type', 'App\Models\User')->first();
                                if ($photo) {
                                    $photo = $photo->url;
                                } elseif ($lecturer->gender == 'F') {
                                    $photo = asset('images/female.png');
                                } else {
                                    $photo = asset('images/male.png');
                                }
                            @endphp
                            <img src="{{ $photo }}" class="" alt="{{ $lecturer->user->name }}"/>
                        </div>
                        <div class="text">
                            <p class="">{{ $lecturer->user->name }}</p>
                        </div>
                       
                    </div>
                    {{-- <figure class="figure figure-rounded">
                        @php
                            $photo = App\Models\Image::where('imageable_id', $lecturer->user->id)
                                ->where('imageable_type', 'App\Models\User')->first();
                            if ($photo) {
                                $photo = $photo->url;
                            } elseif ($lecturer->gender == 'F') {
                                $photo = asset('images/female.png');
                            } else {
                                $photo = asset('images/male.png');
                            }
                        @endphp
                        <img src="{{ $photo }}" class="figure-img img-fluid rounded" alt="{{ $lecturer->user->name }}"/>
                    </figure>
                    <p class="figure-caption">{{ $lecturer->user->name }}</p> --}}
                </a>
            </div>
        @empty
            <div class="text-center w-100">
                <span class="text-muted">Tidak ada data.</span>
            </div>
        @endforelse
    </div>
</div>
@endsection