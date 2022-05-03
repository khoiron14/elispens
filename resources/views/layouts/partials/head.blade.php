<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
<link rel="icon" sizes="16x16 32x32 64x64" href="{{ asset('favicon.ico') }}">
<link rel="apple-touch-icon" href="{{ asset('favicon.ico') }}">

<title>{{ config('app.name', 'ELISPENS') }}</title>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link
    href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
    rel="stylesheet" />

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@if (request()->routeIs('dashboard/*'))
<!-- Theme Styles -->
<link href="{{ asset('css/connect.min.css') }}" rel="stylesheet" />
<link href="{{ asset('css/admin4.css') }}" rel="stylesheet" />
@else
<link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
@endif

@stack('head')