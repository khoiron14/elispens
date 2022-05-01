<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
      integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="/css/custom.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;900&display=swap"
      rel="stylesheet"
    />
    <title>Login | ELIS - PENS</title>
  </head>
  <body>
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
              <label for="NRP">NRP</label>
              <input
                type="number"
                class="form-control"
                id="NRP"
                aria-describedby="emailHelp"
                placeholder="Masukkan NRP"
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

    <script
      src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
