

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Belum Divalidasi</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #f6f8fd;
            color: #374151;
            font-family: 'Poppins', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .nav {
            display: flex;
            justify-content: flex-end;
            height: 100px;
            align-items: center;
            padding: 0 50px;
        }
        .wrap-button {
            display: flex;
            justify-content: center;
        }
        .button {
            padding: 10px 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-size: 20px;

            transition: .2s all ease;
            
        }

        .button span {
            margin-left: 15px;
        }

        .button-logout {
            background-color: #ED2E7E;
        }

        .button-wa {
            background-color: #3b40c4;
        }

        

        .button:hover, .button-custom:hover {
            opacity: 0.6;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
            height: 80vh;
        }

        .content {
            text-align: center;
            font-size: 24px;
        }

        .content>div {
            padding: 20px;
        }

        .line {
            border-left: 3px solid #374151;
            height: 34px;
            margin: 0 14px;
        }
    </style>
</head>

<body>

    <div class="nav">
        <a href="{{ route('logout') }}" class="button button-logout"> Logout </a>
    </div>
    <div class="flex-center ">
        <div class="content">
            <img src="{{ asset('images/logo2.png') }}" alt="elispens" height="36">
            
            <div>Akun anda harus divalidasi oleh admin.</div>
            <div class="wrap-button">

                <a href="https://wa.me/+6281235581354" target="_blank" class="button button-wa"><svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 0 24 24" width="18px" fill="#ffffff"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M6.54 5c.06.89.21 1.76.45 2.59l-1.2 1.2c-.41-1.2-.67-2.47-.76-3.79h1.51m9.86 12.02c.85.24 1.72.39 2.6.45v1.49c-1.32-.09-2.59-.35-3.8-.75l1.2-1.19M7.5 3H4c-.55 0-1 .45-1 1 0 9.39 7.61 17 17 17 .55 0 1-.45 1-1v-3.49c0-.55-.45-1-1-1-1.24 0-2.45-.2-3.57-.57-.1-.04-.21-.05-.31-.05-.26 0-.51.1-.71.29l-2.2 2.2c-2.83-1.45-5.15-3.76-6.59-6.59l2.2-2.2c.28-.28.36-.67.25-1.02C8.7 6.45 8.5 5.25 8.5 4c0-.55-.45-1-1-1z"/></svg> <span>Hubungi Admin</span> </a>
            </div>
        </div>
    </div>
</body>

</html>
