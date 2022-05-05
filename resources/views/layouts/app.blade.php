<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.partials.head')
</head>

<body>
    @if (!(Request::is('login*') || Request::is('register*')))
        @include('layouts.partials.nav')
    @endif

    @yield('content')

    @if (!(Request::is('login*') || Request::is('register*')))
        @include('layouts.partials.footer')
    @endif

    @include('layouts.partials.script')
</body>

</html>