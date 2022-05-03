@extends('layouts.custom.head')

    @section('navbar')
    <div class="container">
    <nav class="navbar navbar-light bg-transparent py-xl-5">
        <a class="navbar-brand" href="/">
        <img src="/images/Logo.svg" alt="" />
        </a>

        <a
        class="my-custom-btn px-4 py-1"
        href="#"
        data-target="#modalLogin"
        data-toggle="modal"
        >
        Masuk
        </a>
    </nav>
    </div>
    @endsection

    @section('content')
    <div class="container main-detail-page">
      <div class="row">
        <div class="col-4">
          <figure class="figure">
            <img
              src="/images/detail/image1.png"
              class="figure-img img-fluid"
              alt="figureImage"
            />
          </figure>
        </div>
        <div class="col-8 info">
          <h1 class="head">Ira Savannah</h1>
          <div class="row detail-info">
            <div class="col-2 title">
              <h2>NIP</h2>
            </div>
            <div class="col-10 value">
              <h2>19991223200303171</h2>
            </div>
          </div>
          <div class="row detail-info">
            <div class="col-2 title">
              <h2>Prodi</h2>
            </div>
            <div class="col-10 value">
              <h2>Teknik Informatika</h2>
            </div>
          </div>
          <div class="row detail-info">
            <div class="col-2 title">
              <h2>Phone</h2>
            </div>
            <div class="col-10 value">
              <h2>08247465292</h2>
            </div>
          </div>
          <div class="row detail-info">
            <div class="col-2 title">
              <h2>Alamat</h2>
            </div>
            <div class="col-10 value">
              <h2>
                RT/0021 RW/007 Dusun Jatirejo Desa Gandusari Kabupaten
                Trenggalek Provinsi Jawa Timur
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

    <div class="mx-auto text-center footer-custom">
      <a class="navbar-brand" href="/">
        <img src="/images/Logo.svg" alt="" />
      </a>
    </div>

    @endsection

    @section('modal')
    <div
      class="modal fade"
      tabindex="-1"
      id="modalLogin"
      aria-labelledby="modalLogin"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Daftar Sebagai</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <a
              class="my-custom-btn px-4 py-1 btn-block btn-outline"
              href="/register-dosen"
            >
              Dosen
            </a>
            <a
              class="my-custom-btn px-4 py-1 btn-block btn-outline"
              href="/register-mahasiswa"
            >
              Mahasiswa
            </a>
          </div>
        </div>
      </div>
    </div>
    @endsection