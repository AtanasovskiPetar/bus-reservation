<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') ?? 'Bus reservation' }}</title>

    {{-- <link rel="shortcut icon" type="image/png" href="{{asset('images/logo/joblister.png')}}" /> --}}
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('css')

</head>

<body>
    <div id="app">
        @include('inc.home.navbar')
        @yield('content')
    </div>
    @include('sweetalert::alert')
    @stack('js')
</body>

</html>
