<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @yield('style')
    @include('layouts.partials.header')
    @include('layouts.navbar.navbar_style')
</head>
<body>

<div id="app">
    @include('layouts.navbar.navbar')
    @yield('content')
    @include('layouts.partials.footer')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('script')
</body>
</html>
