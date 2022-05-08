@extends('layouts.app')

@section('content')
<div class="container main-detail-page">
    <div class="row">
        <div class="col-4">
            <figure class="figure">
                <img src="{{ $lecturer->gender == 'F' ? asset('images/LandingPage/images3.png') : asset('images/LandingPage/images1.png') }}" class="figure-img img-fluid" alt="figureImage" />
            </figure>
        </div>
        <div class="col-8 info">
            <h1 class="head">{{ $lecturer->user->name }}</h1>
            <div class="row detail-info">
                <div class="col-2 title">
                    <h2>NIP</h2>
                </div>
                <div class="col-10 value">
                    <h2>{{ $lecturer->nip }}</h2>
                </div>
            </div>
            <div class="row detail-info">
                <div class="col-2 title">
                    <h2>Prodi</h2>
                </div>
                <div class="col-10 value">
                    <h2>{{ $lecturer->studyProgram->name }}</h2>
                </div>
            </div>
            <div class="row detail-info">
                <div class="col-2 title">
                    <h2>Phone</h2>
                </div>
                <div class="col-10 value">
                    <h2>{{ $lecturer->phone ?? 'Belum diisi' }}</h2>
                </div>
            </div>
            <div class="row detail-info">
                <div class="col-2 title">
                    <h2>Alamat</h2>
                </div>
                <div class="col-10 value">
                    <h2>
                        {{ $lecturer->address ?? 'Belum diisi' }}
                    </h2>
                </div>
            </div>
            <div class="row button-info">
                <div class="col-2">
                    <a href="#" class="my-custom-btn"> Beranda </a>
                </div>
                <div class="col-2">
                    <a href="#" class="my-custom-btn not-active"> Publikasi </a>
                </div>
                <div class="col-2">
                    <a href="#" class="my-custom-btn not-active"> Sertifikasi </a>
                </div>
                <div class="col-5">
                    <a href="#" class="my-custom-btn not-active">
                        Supervised Final Project
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection