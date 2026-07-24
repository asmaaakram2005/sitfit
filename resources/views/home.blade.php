<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SitFit</title>
</head>
<body>

    <h1>Welcome To SitFit</h1>

    <!-- NEVER DELETE THIS FORM, IT IS VERY IMPORTANT "BY Ahmed" -->
    <form action="{{ route('logout') }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">logout</button>
    </form>

</body>
</html>