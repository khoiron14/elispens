<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.partials.head')
</head>

<body>
    @if (!(request()->routeIs('login/*') || request()->routeIs('register/*')))
        @include('layouts.partials.nav')
    @endif

    @yield('content')

    @if (!(request()->routeIs('login/*') || request()->routeIs('register/*')))
        @include('layouts.partials.footer')
    @endif

    @include('layouts.partials.script')
</body>

</html>