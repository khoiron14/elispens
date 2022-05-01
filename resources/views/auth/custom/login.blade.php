@extends('layouts.custom.head')

    @section('content')
    <div class="separate-view">
      <div class="images-view">
        <div class="images"></div>
      </div>
      <div class="login-view">
        <div class="login-view-box">
          <a class="navbar-brand" href="/">
            <img src="/images/Logo.svg" alt="" />
          </a>
          <h1>Masuk ke akun ELIS</h1>
          <form>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input
                type="email"
                class="form-control"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
                placeholder="Masukkan E-mail"
              />
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input
                type="password"
                class="form-control"
                id="exampleInputPassword1"
                placeholder="***************"
              />
            </div>
            <div class="form-group form-check">
              <input
                type="checkbox"
                class="form-check-input"
                id="exampleCheck1"
              />
              <label class="form-check-label" for="exampleCheck1"
                >Remember me</label
              >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <p class="have text-right">
              Belum punya akun? <a href="/register-dosen">Daftar</a>
            </p>
          </form>
        </div>
      </div>
    </div>

    @endsection
