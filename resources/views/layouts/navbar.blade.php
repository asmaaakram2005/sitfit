<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    
    <!-- Write A nav bar code under this command. "Ahmed"-->



    <!-- you can Delete this Head if you need -->
    <h1>hello world</h1> 






    
        <!-- NEVER DELETE THIS FORM, IT IS VERY IMPORTANT. "Ahmed" -->
    <form action="{{ route('logout') }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Logout</button>
    </form>

    @yield('content')
</body>
</html>