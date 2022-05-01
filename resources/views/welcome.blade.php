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
    <div class="container centered-element headline">
      <h1 class="text-center">Cari Data Dosen</h1>
      <p class="text-center">
        cari data dosen politeknik elektronika negeri surabaya dengan mudah
      </p>
      <form class="">
        <div class="form-row">
          <div class="form-group col-md-6">
            <input
              type="text"
              class="form-control"
              id="inputCity"
              placeholder="Masukkan nama dosen"
            />
          </div>
          <div class="form-group col-md-4">
            <select id="inputState" class="form-control custom-select">
              <option selected>Teknik Informatika</option>
              <option value="Teknik Elektronika">Teknik Elektronika</option>
              <option value="Teknik Telekomunikasi">
                Teknik Telekomunikasi
              </option>
              <option value="Teknik Komputer">Teknik Komputer</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <button type="submit" class="btn my-custom-form-btn">Cari</button>
          </div>
        </div>
      </form>
    </div>

    <div class="container main">
      <div class="row row-cols-4 main-section mt-5">
        <div class="col">
          <a href="/detail">
            <figure class="figure figure-rounded">
              <img
                src="/images/LandingPage/images1.png"
                class="figure-img img-fluid rounded"
                alt="Images"
              />
              <figcaption class="figure-caption">Isbat Cruiseman</figcaption>
            </figure>
          </a>
        </div>
        <div class="col">
          <a href="/detail">
            <figure class="figure figure-rounded">
              <img
                src="/images/LandingPage/images2.png"
                class="figure-img img-fluid rounded"
                alt="Images"
              />
              <figcaption class="figure-caption">Nailusorah Wang</figcaption>
            </figure>
          </a>
        </div>
        <div class="col">
          <a href="/detail">
            <figure class="figure figure-rounded">
              <img
                src="/images/LandingPage/images3.png"
                class="figure-img img-fluid rounded"
                alt="Images"
              />
              <figcaption class="figure-caption">Umi Kiranman</figcaption>
            </figure>
          </a>
        </div>
        <div class="col">
          <a href="/detail">
            <figure class="figure figure-rounded">
              <img
                src="/images/LandingPage/images4.png"
                class="figure-img img-fluid rounded"
                alt="Images"
              />
              <figcaption class="figure-caption">Ira Savannah</figcaption>
            </figure>
          </a>
        </div>
      </div>
      <div class="row row-cols-4 main-section mt-5">
        <div class="col">
          <figure class="figure figure-rounded">
            <img
              src="/images/LandingPage/images5.png"
              class="figure-img img-fluid rounded"
              alt="Images"
            />
            <figcaption class="figure-caption">Dr. Nikola Jokic</figcaption>
          </figure>
        </div>
        <div class="col">
          <figure class="figure figure-rounded">
            <img
              src="/images/LandingPage/images6.png"
              class="figure-img img-fluid rounded"
              alt="Images"
            />
            <figcaption class="figure-caption">Dr. Nikola Jokic</figcaption>
          </figure>
        </div>
        <div class="col">
          <figure class="figure figure-rounded">
            <img
              src="/images/LandingPage/images7.png"
              class="figure-img img-fluid rounded"
              alt="Images"
            />
            <figcaption class="figure-caption">Dr. Nikola Jokic</figcaption>
          </figure>
        </div>
        <div class="col">
          <figure class="figure figure-rounded">
            <img
              src="/images/LandingPage/images8.png"
              class="figure-img img-fluid rounded"
              alt="Images"
            />
            <figcaption class="figure-caption">Dr. Nikola Jokic</figcaption>
          </figure>
        </div>
      </div>
      <div class="row row-cols-4 main-section mt-5">
        <div class="col">
          <figure class="figure figure-rounded">
            <img
              src="/images/LandingPage/images1.png"
              class="figure-img img-fluid rounded"
              alt="Images"
            />
            <figcaption class="figure-caption">Isbat Cruiseman</figcaption>
          </figure>
        </div>
        <div class="col">
          <figure class="figure figure-rounded">
            <img
              src="/images/LandingPage/images2.png"
              class="figure-img img-fluid rounded"
              alt="Images"
            />
            <figcaption class="figure-caption">Nailusorah Wang</figcaption>
          </figure>
        </div>
        <div class="col">
          <figure class="figure figure-rounded">
            <img
              src="/images/LandingPage/images3.png"
              class="figure-img img-fluid rounded"
              alt="Images"
            />
            <figcaption class="figure-caption">Umi Kiranman</figcaption>
          </figure>
        </div>
        <div class="col">
          <figure class="figure figure-rounded">
            <img
              src="/images/LandingPage/images4.png"
              class="figure-img img-fluid rounded"
              alt="Images"
            />
            <figcaption class="figure-caption">Ira Savannah</figcaption>
          </figure>
        </div>
      </div>
      <div class="row row-cols-4 main-section mt-5">
        <div class="col">
          <figure class="figure figure-rounded">
            <img
              src="/images/LandingPage/images5.png"
              class="figure-img img-fluid rounded"
              alt="Images"
            />
            <figcaption class="figure-caption">Dr. Nikola Jokic</figcaption>
          </figure>
        </div>
        <div class="col">
          <figure class="figure figure-rounded">
            <img
              src="/images/LandingPage/images6.png"
              class="figure-img img-fluid rounded"
              alt="Images"
            />
            <figcaption class="figure-caption">Dr. Nikola Jokic</figcaption>
          </figure>
        </div>
        <div class="col">
          <figure class="figure figure-rounded">
            <img
              src="/images/LandingPage/images7.png"
              class="figure-img img-fluid rounded"
              alt="Images"
            />
            <figcaption class="figure-caption">Dr. Nikola Jokic</figcaption>
          </figure>
        </div>
        <div class="col">
          <figure class="figure figure-rounded">
            <img
              src="/images/LandingPage/images8.png"
              class="figure-img img-fluid rounded"
              alt="Images"
            />
            <figcaption class="figure-caption">Dr. Nikola Jokic</figcaption>
          </figure>
        </div>
      </div>
    </div>

    @endsection

    @section('footer')
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
