<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | SitFit</title>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <link rel="stylesheet" href="{{asset('css/auth.css')}}">
</head>

<body>

    <section class="auth-section">

        <div class="auth-container">

            <!-- Image -->

            <div class="auth-image">

                <img src="{{ asset('images/seat_image.jpg') }}" alt="Mood Seat">

            </div>

            <!-- Form -->

            <div class="auth-content">

                <h1>Create Account</h1>

                <p class="subtitle">
                    Create your SitFit account and start your comfort journey.
                </p>

                <form action="{{ route('register.store') }}" method="post">
                    @csrf

                    <!-- Name -->

                    <div class="input-group" class="form-group">

                        <label for="name">Full Name</label>

                        <div class="input-box">

                            <i class="fa-solid fa-user"></i>

                            <input
                                type="text"
                                id="name"
                                class="form-input @error('name') input-error @enderror"
                                placeholder="Enter your full name"
                                value="{{ old('name') }}"
                                name="name"
                                required>
                                @error('name')
                                    <small class="error-message">{{ $message }}</small>
                                @enderror

                        </div>

                    </div>

                    <!-- Email -->

                    <div class="input-group" class="form-group">

                        <label for="email">Email Address</label>

                        <div class="input-box">

                            <i class="fa-solid fa-envelope"></i>

                            <input
                                type="email"
                                id="email"
                                class="form-input @error('email') input-error @enderror"
                                placeholder="Enter your email"
                                value="{{ old('email') }}"
                                name="email"
                                required>
                                @error('email')
                                    <small class="error-message">{{ $message }}</small>
                                @enderror

                        </div>

                    </div>

                    <!-- Phone -->

                    <div class="input-group" class="form-group">

                        <label for="phone">Phone Number</label>

                        <div class="input-box">

                            <i class="fa-solid fa-phone"></i>

                            <input
                                type="text"
                                id="phone"
                                class="form-input @error('phone') input-error @enderror"
                                placeholder="Enter your phone number"
                                value="{{ old('phone') }}"
                                name="phone"
                                required>
                                @error('phone')
                                    <small class="error-message">{{ $message }}</small>
                                @enderror

                        </div>

                    </div>

                    <!-- Password -->

                    <div class="input-group" class="form-group">

                        <label for="password">Password</label>

                        <div class="input-box">

                            <i class="fa-solid fa-lock"></i>

                            <input
                                type="password"
                                id="password"
                                class="form-input @error('password') input-error @enderror"
                                placeholder="Enter your password"
                                name="password"
                                required>
                                @error('password')
                                    <small class="error-message">{{ $message }}</small>
                                @enderror

                        </div>

                    </div>

                    <!-- Confirm Password -->

                    <div class="input-group">

                        <label for="confirmPassword">

                            Confirm Password

                        </label>

                        <div class="input-box">

                            <i class="fa-solid fa-lock"></i>

                            <input
                                type="password"
                                id="confirmPassword"
                                placeholder="Confirm your password"
                                name="password_confirmation"
                                required>
                                

                        </div>

                    </div>

                    <button type="submit" class="register-btn">

                       Create Account

                    </button>

                </form>

                <p class="bottom-text">

                    Already have an account?

                    <a href="{{ route('login') }}">

                        Login

                    </a>

                </p>

            </div>

        </div>

    </section>

</body>

</html>