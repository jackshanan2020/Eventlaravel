<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Event Finder') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ url('css/font-awesome.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script>
      window.Laravel = { csrfToken: '{{ csrf_token() }}', basePath: '{{ url("/") }}/' }
    </script>
</head>
<body>
    <div id="app">
        @include('partials.menu')
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0pynm0BiVwm3r85i7YBme5tabouBKaK4&callback=initMap"></script> --}}
</body>
</html>
