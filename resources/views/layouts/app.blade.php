<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('css')
    <title>@yield('title')</title>

</head>

<body>

@include('layouts.navbar')

@yield('content')

@include('layouts.footer')

</body>

</html>