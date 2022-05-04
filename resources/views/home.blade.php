@extends('layouts.app')

@section('content')
<div class="container centered-element headline">
    <h1 class="text-center"><strong>Cari Data Dosen</strong></h1>
    <p class="text-center">
        Cari Data Dosen Politeknik Elektronika Negeri Surabaya dengan Mudah!
    </p>
    <form class="">
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="text" class="form-control" id="inputCity" placeholder="Masukkan nama dosen" />
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
                    <img src="/images/LandingPage/images1.png" class="figure-img img-fluid rounded" alt="Images" />
                    <figcaption class="figure-caption">Isbat Cruiseman</figcaption>
                </figure>
            </a>
        </div>
        <div class="col">
            <a href="/detail">
                <figure class="figure figure-rounded">
                    <img src="/images/LandingPage/images2.png" class="figure-img img-fluid rounded" alt="Images" />
                    <figcaption class="figure-caption">Nailusorah Wang</figcaption>
                </figure>
            </a>
        </div>
        <div class="col">
            <a href="/detail">
                <figure class="figure figure-rounded">
                    <img src="/images/LandingPage/images3.png" class="figure-img img-fluid rounded" alt="Images" />
                    <figcaption class="figure-caption">Umi Kiranman</figcaption>
                </figure>
            </a>
        </div>
        <div class="col">
            <a href="/detail">
                <figure class="figure figure-rounded">
                    <img src="/images/LandingPage/images4.png" class="figure-img img-fluid rounded" alt="Images" />
                    <figcaption class="figure-caption">Ira Savannah</figcaption>
                </figure>
            </a>
        </div>
    </div>
    <div class="row row-cols-4 main-section mt-5">
        <div class="col">
            <figure class="figure figure-rounded">
                <img src="/images/LandingPage/images5.png" class="figure-img img-fluid rounded" alt="Images" />
                <figcaption class="figure-caption">Dr. Nikola Jokic</figcaption>
            </figure>
        </div>
        <div class="col">
            <figure class="figure figure-rounded">
                <img src="/images/LandingPage/images6.png" class="figure-img img-fluid rounded" alt="Images" />
                <figcaption class="figure-caption">Dr. Nikola Jokic</figcaption>
            </figure>
        </div>
        <div class="col">
            <figure class="figure figure-rounded">
                <img src="/images/LandingPage/images7.png" class="figure-img img-fluid rounded" alt="Images" />
                <figcaption class="figure-caption">Dr. Nikola Jokic</figcaption>
            </figure>
        </div>
        <div class="col">
            <figure class="figure figure-rounded">
                <img src="/images/LandingPage/images8.png" class="figure-img img-fluid rounded" alt="Images" />
                <figcaption class="figure-caption">Dr. Nikola Jokic</figcaption>
            </figure>
        </div>
    </div>
    <div class="row row-cols-4 main-section mt-5">
        <div class="col">
            <figure class="figure figure-rounded">
                <img src="/images/LandingPage/images1.png" class="figure-img img-fluid rounded" alt="Images" />
                <figcaption class="figure-caption">Isbat Cruiseman</figcaption>
            </figure>
        </div>
        <div class="col">
            <figure class="figure figure-rounded">
                <img src="/images/LandingPage/images2.png" class="figure-img img-fluid rounded" alt="Images" />
                <figcaption class="figure-caption">Nailusorah Wang</figcaption>
            </figure>
        </div>
        <div class="col">
            <figure class="figure figure-rounded">
                <img src="/images/LandingPage/images3.png" class="figure-img img-fluid rounded" alt="Images" />
                <figcaption class="figure-caption">Umi Kiranman</figcaption>
            </figure>
        </div>
        <div class="col">
            <figure class="figure figure-rounded">
                <img src="/images/LandingPage/images4.png" class="figure-img img-fluid rounded" alt="Images" />
                <figcaption class="figure-caption">Ira Savannah</figcaption>
            </figure>
        </div>
    </div>
    <div class="row row-cols-4 main-section mt-5">
        <div class="col">
            <figure class="figure figure-rounded">
                <img src="/images/LandingPage/images5.png" class="figure-img img-fluid rounded" alt="Images" />
                <figcaption class="figure-caption">Dr. Nikola Jokic</figcaption>
            </figure>
        </div>
        <div class="col">
            <figure class="figure figure-rounded">
                <img src="/images/LandingPage/images6.png" class="figure-img img-fluid rounded" alt="Images" />
                <figcaption class="figure-caption">Dr. Nikola Jokic</figcaption>
            </figure>
        </div>
        <div class="col">
            <figure class="figure figure-rounded">
                <img src="/images/LandingPage/images7.png" class="figure-img img-fluid rounded" alt="Images" />
                <figcaption class="figure-caption">Dr. Nikola Jokic</figcaption>
            </figure>
        </div>
        <div class="col">
            <figure class="figure figure-rounded">
                <img src="/images/LandingPage/images8.png" class="figure-img img-fluid rounded" alt="Images" />
                <figcaption class="figure-caption">Dr. Nikola Jokic</figcaption>
            </figure>
        </div>
    </div>
</div>
@endsection