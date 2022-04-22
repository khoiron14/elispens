<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.partials.head')
</head>

<body>
    <div class="loader">
        <div class="spinner-grow text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="connect-container align-content-stretch d-flex flex-wrap">
        @include('layouts.partials.sidebar')

        <div class="page-container">
            <div class="page-header">
                @include('layouts.partials.dash-nav')
            </div>
            <div class="page-content">
                @yield('content')
            </div>
            <div class="page-footer">
                @include('layouts.partials.dash-footer')
            </div>
        </div>
    </div>
    @include('layouts.partials.script')
</body>

</html>