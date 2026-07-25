<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')
    <title>@yield('title')</title>
   
    <!-- Font Awesome Icons Library -->
    <link rel="stylesheet"
       href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- css connection navbar -->
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

    <!-- css connection footer -->
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

</head>

<body>

@include('layouts.navbar')

<main class="content">
    @yield('content')
</main>

@include('layouts.footer')

</body>

</html>