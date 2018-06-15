<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('style')
    @include('layouts.partials.header')
    @include('layouts.navbar.navbar_style')
    <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/moonspam/NanumSquare/master/nanumsquare.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>

<div id="app" style="background-color: white;">
    @include('layouts.navbar.navbar')
    @yield('content')
    @include('layouts.partials.footer')
</div>

<!-- Scripts -->
{{--<script src="{{ asset('js/app.js') }}"></script>--}}

@yield('script')
</body>
</html>
