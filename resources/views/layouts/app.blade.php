<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    <!-- Font Awesome Icons Library -->
    <link rel="stylesheet"
       href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- Global CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Page CSS -->
    @yield('css')

    <!-- css connection navbar -->
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

    <!-- css connection footer -->
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

    <title>@yield('title')</title>
</head>

<body>

<header class="navbar-space">
    @include('layouts.navbar')
</header>

<main class="content">
    @yield('content')
</main>

@include('layouts.footer')

</body>

</html>