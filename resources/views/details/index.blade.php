@extends('layouts.app')

@push('head')
    <style>
        @media (max-width: 992px){
            .main-detail-page .row {
                flex-direction: column;
            }
            .main-detail-page .row .img-figure {
                text-align: center;
            }
            .main-detail-page .row .info-wrap h1 {
                text-align: center;
            }
            .main-detail-page .row .info-wrap .row {
                flex-direction: row;
            }
            .main-detail-page .row .info-wrap .row .title {
                text-align: right;
            }
            .main-detail-page .row .info-wrap .button-info {
                width: 80%;
                text-align: center;
                margin: 2rem auto;
            }
        }

        @media (max-width: 500px) {
            .main-detail-page .row .info-wrap h1 {
                font-size: 2.5rem !important;
            }
        }
    </style>
@endpush

@section('content')
<div class="container main-detail-page">
    <div class="row ">
        <div class="col-sm-12 col-lg-4 img-figure ">
            <figure class="figure">
                <img src="{{ $lecturer->gender == 'F' ? asset('images/LandingPage/images3.png') : asset('images/LandingPage/images1.png') }}" class="figure-img img-fluid" alt="figureImage" />
            </figure>
        </div>
        <div class="col-sm-12 col-lg-8 info info-wrap">
            <h1 class="head">{{ $lecturer->user->name }}</h1>
            <div class="row detail-info">
                <div class="col-lg-2 col-sm-6 title text-center text-md-right text-sm-right">
                    <h2>NIP</h2>
                </div>
                <div class="col-lg-10 col-sm-6  value text-center text-md-left text-sm-left">
                    <h2>{{ $lecturer->nip }}</h2>
                </div>
            </div>
            <div class="row detail-info">
                <div class="col-lg-2 col-sm-6 title text-center text-md-right text-sm-right">
                    <h2>Prodi</h2>
                </div>
                <div class="col-lg-10 col-sm-6 value  text-center text-md-left text-sm-left">
                    <h2>{{ $lecturer->studyProgram?->name }}</h2>
                </div>
            </div>
            <div class="row detail-info">
                <div class="col-lg-2 col-sm-6 title text-center text-md-right text-sm-right">
                    <h2>Phone</h2>
                </div>
                <div class="col-lg-10 col-sm-6 value  text-center text-md-left text-sm-left">
                    <h2>{{ $lecturer->phone ?? 'Belum diisi' }}</h2>
                </div>
            </div>
            <div class="row detail-info">
                <div class="col-lg-2 col-sm-6 title text-center text-md-right text-sm-right">
                    <h2>Alamat</h2>
                </div>
                <div class="col-lg-10 col-sm-6 value text-center  text-md-left text-sm-left">
                    <h2>
                        {{ $lecturer->address ?? 'Belum diisi' }}
                    </h2>
                </div>
            </div>
            <div class="row button-info ">
                <div class="col-lg-2 col-md-12 mt-md-5 mt-sm-5 mt-5 mt-lg-0  ml-lg-0 ">
                    <a href="#" class="my-custom-btn"> Beranda </a>
                </div>
                <div class="col-lg-2 col-md-12 mt-md-5 mt-sm-5 mt-5 mt-lg-0  ml-lg-3 ">
                    <a href="#" class="my-custom-btn not-active"> Publikasi </a>
                </div>
                <div class="col-lg-2 col-md-12 mt-md-5 mt-sm-5 mt-5 mt-lg-0  ml-lg-3  ">
                    <a href="#" class="my-custom-btn not-active"> Sertifikasi </a>
                </div>
                <div class="col-lg-5 col-md-12 mt-md-5 mt-sm-5 mt-5 mt-lg-0  ml-lg-3  ">
                    <a href="#" class="my-custom-btn not-active">
                        Pembimbing TA
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection