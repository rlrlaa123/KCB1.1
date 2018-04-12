<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @yield('style')
    @include('layouts.partials.header')
</head>
<body>

<div id="app">
    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('script')
</body>
</html>
