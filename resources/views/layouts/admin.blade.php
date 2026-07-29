<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    {{-- Title Yield --}}
    <title>@yield('title')</title>

    {{-- Global CSS Asset --}}
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">

    {{-- Page Specific CSS Yield --}}
    @yield('css')
</head>
<body>

    {{-- يمكنك وضع الـ Sidebar أو Navbar هنا مستقبلاً --}}

    <main class="main-content">
        {{-- Main Content Yield --}}
        @yield('content')
    </main>

    {{-- يمكنك إضافة الـ JS Scripts هنا لو احتجت مستقبلاً --}}
</body>
</html>