@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('title')
    Edit Profile
@endsection

@section('content')
<main class="profile-container">
    {{-- Page Header --}}
    <header class="profile-header">
        <h1 class="profile-title">Edit Profile</h1>
        <p class="profile-subtitle">Manage your account information.</p>
    </header>

    {{-- Profile Avatar Section --}}
    <section class="avatar-section">
        <div class="avatar-wrapper">
            <img 
                src="{{ asset($user->image) }}" 
                alt="Profile photo" 
                class="avatar-image"
            >
        </div>
    </section>

    <form 
        action="{{ route('profile.update') }}" 
        method="POST"
        enctype="multipart/form-data"
        class="profile-form">
        @csrf
        @method('PATCH')

        <input
            type="file"
            id="image"
            name="image"
            hidden
            accept="image/*">

        <button
            type="button"
            class="avatar-upload-btn"
            onclick="document.getElementById('image').click()">
            <i class="fa-solid fa-camera"></i>
            <span>Change Photo</span>
        </button>

        {{-- Single Personal Information Card --}}
        <section class="form-card">
            <h2 class="card-title">Personal Information</h2>
            
            <div class="form-stack">
                {{-- 1. Full Name --}}
                <div class="form-group">
                    <label for="name" class="form-label">Full Name</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        class="form-input @error('name') input-error @enderror" 
                        value="{{ old('name', $user->name) }}" 
                        required>
                    @error('name')
                        <small class="error-message">{{ $message }}</small>
                    @enderror
                </div>

                {{-- 2. Email --}}
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="form-input @error('email') input-error @enderror" 
                        value="{{ old('email', $user->email) }}" 
                        required>
                    @error('email')
                        <small class="error-message">{{ $message }}</small>
                    @enderror
                </div>

                {{-- 3. Phone Number --}}
                <div class="form-group">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input 
                        type="tel" 
                        id="phone" 
                        name="phone" 
                        class="form-input @error('phone') input-error @enderror"
                        value="{{ old('phone', $user->phone) }}" 
                        required>
                    @error('phone')
                        <small class="error-message">{{ $message }}</small>
                    @enderror
                </div>

                {{-- 4. Current Password --}}
                <div class="form-group">
                    <label for="current_password" class="form-label">Current Password</label>
                    <div class="password-wrapper">
                        <input
                            type="password"
                            id="current_password"
                            name="current_password"
                            class="form-input @error('current_password') input-error @enderror"
                            placeholder="••••••••"
                        >
                        <i class="fa-solid fa-eye toggle-password"></i>
                    </div>
                    @error('current_password')
                        <small class="error-message">{{ $message }}</small>
                    @enderror
                </div>

                {{-- 5. New Password --}}
                <div class="form-group">
                    <label for="password" class="form-label">New Password</label>
                    <div class="password-wrapper">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-input @error('password') input-error @enderror"
                            placeholder="••••••••"
                        >
                        <i class="fa-solid fa-eye toggle-password"></i>
                    </div>
                    @error('password')
                        <small class="error-message">{{ $message }}</small>
                    @enderror
                </div>

                {{-- 6. Confirm Password --}}
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <div class="password-wrapper">
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            class="form-input @error('password_confirmation') input-error @enderror"
                            placeholder="••••••••"
                        >
                        <i class="fa-solid fa-eye toggle-password"></i>
                    </div>
                    @error('password_confirmation')
                        <small class="error-message">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </section>

        {{-- save changes button--}}
        <div class="form-actions">
            <button type="submit" class="save-btn">
                Save Changes
            </button>
        </div>
    </form>
</main>

<script>
    const toggles = document.querySelectorAll(".toggle-password");

    toggles.forEach((toggle) => {
        toggle.addEventListener("click", () => {
            const input = toggle.parentElement.querySelector("input");

            if (input.type === "password") {
                input.type = "text";
                toggle.classList.replace("fa-eye", "fa-eye-slash");
            } else {
                input.type = "password";
                toggle.classList.replace("fa-eye-slash", "fa-eye");
            }
        });
    });
</script>
@endsection