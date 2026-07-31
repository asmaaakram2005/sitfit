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

{{-- Chat Widget --}}

<button class="chat-btn">
    <i class="fa-solid fa-comments"></i>
</button>

<div class="chat-box">

    <div class="chat-header">
        Support
    </div>

    {{-- أضفنا ID للـ body --}}
    <div class="chat-body" id="chat-body">
        <div class="message bot-message">
            <p>Hi! How can we help you?</p>
        </div>
    </div>

    {{-- أضفنا ID للـ Form والـ Input --}}
    <form id="chat-form">
        @csrf
        <div class="chat-footer">
            <input type="text" id="chat-input" placeholder="Type your message..." required autocomplete="off">

            <button class="send-btn" type="submit" id="send-btn">
                <i class="fa-solid fa-paper-plane"></i>
            </button>
        </div>
    </form>
</div>

<script src="{{ asset('js/chat-widget.js') }}"></script>

</body>

</html>