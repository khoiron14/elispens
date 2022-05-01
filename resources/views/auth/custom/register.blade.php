@extends('layouts.custom.head')

    @section('content')
    <div class="separate-view">
      <div class="images-view">
        <div class="images"></div>
      </div>
      <div class="login-view">
        <div class="login-view-box register">
          <a class="navbar-brand" href="/">
            <img src="/images/Logo.svg" alt="" />
          </a>
          <h1>Daftar akun ELIS</h1>
          <form class="register">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Lengkap</label>
              <input
                type="text"
                class="form-control"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
                placeholder="Nama Lengkap"
              />
            </div>
            <div class="form-group">
              <label for="NIP">NIP</label>
              <input
                type="number"
                class="form-control"
                id="NIP"
                aria-describedby="emailHelp"
                placeholder="Masukkan NIP"
              />
            </div>
            <div class="form-group">
              <label for="email">Email address</label>
              <input
                type="email"
                class="form-control"
                id="email"
                aria-describedby="emailHelp"
                placeholder="salsa@lecturer.pens.ac.id"
              />
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input
                type="password"
                class="form-control"
                id="exampleInputPassword1"
                placeholder="Masukkan Password"
              />
            </div>
            <div class="form-group">
              <label for="konfirmpassword">Konfirmasi Password</label>
              <input
                type="password"
                class="form-control"
                id="konfirmpassword"
                placeholder="Konfirmasi Password"
              />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <p class="have text-right">
              Sudah punya akun? <a href="/login-user">Masuk</a>
            </p>
          </form>
        </div>
      </div>
    </div>
    @endsection
