<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

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

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
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
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="flex-center">
                <img src="{{ asset('images/logo2.png') }}" alt="elispens" height="36">
                @hasSection ('code') 
                <div class="line"></div> 
                <strong>@yield('code')</strong>
                @endif
            </div>
            <div>@yield('message')</div>
        </div>
    </div>
</body>

</html>