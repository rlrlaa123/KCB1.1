<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('style')
    @include('layouts.partials.header')
    @include('layouts.navbar.navbar_style')
    {{--<link href="{{ asset('css/NanumSquare-master/nanumsquare.css') }}" rel="Stylesheet">--}}
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="js/d3.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/4.5.0/d3.min.js">
    </script>
</head>
<body style="background-color:white;">

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
