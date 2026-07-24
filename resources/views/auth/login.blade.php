<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SitFit</title>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>

<body>

    <section class="auth-section">

        <div class="auth-container">

            <!-- Image -->
            <div class="auth-image">
                <img src="{{ asset('images/seat_image.jpg') }}" alt="Mood Seat Login">
            </div>

            <!-- Side -->
            <div class="auth-content">

                <h1>Welcome Back</h1>

                <p class="subtitle">
                    Sign in to continue using SitFit and track your comfort journey.
                </p>

                <form action="{{ route('login.store') }}" method="post">
                    @csrf

                    <!-- Email -->
                    <div class="input-group">

                        <label for="email">
                            Email Address
                        </label>

                        <div class="input-box">

                            <i class="fa-solid fa-envelope"></i>

                            <input
                                type="email"
                                id="email"
                                placeholder="Enter your email"
                                value="{{ old('email') }}"
                                name="email"
                                required>
                                @error('email')
                                    <small class="error">{{ $message }}</small>
                                @enderror

                        </div>

                    </div>

                    <!-- Password -->
                    <div class="input-group">

                        <label for="password">
                            Password
                        </label>

                        <div class="input-box">

                            <i class="fa-solid fa-lock"></i>

                            <input
                                type="password"
                                id="password"
                                placeholder="Enter your password"
                                name="password"
                                required>
                                @error('password')
                                    <small class="error">{{ $message }}</small>
                                @enderror

                        </div>

                    </div>

                    <button type="submit" class="register-btn">

                        Login

                    </button>

                </form>

                <p class="bottom-text">
                    Don't have an account?

                    <a href="{{route('register')}}">
                        Create Account
                    </a>
                </p>

            </div>

        </div>

    </section>

</body>

</html>