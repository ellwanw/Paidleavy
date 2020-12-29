<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet">

    <title>Login Form</title>
</head>

<body>

    @yield('content')


    <!-- Scripts -->
    <script src="{{ asset('js/login.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

</body>

</html>