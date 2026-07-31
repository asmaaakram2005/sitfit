@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('title')
    Profile
@endsection

@section('content')
  <div class="profile-container">

    <!-- Page Header -->
    <header class="profile-header">
        <h1 class="profile-title">My Profile</h1>
        <p class="profile-subtitle"> View your personal details and account settings.</p>
    </header>

    <!-- Avatar Section -->
    <!-- <div class="avatar-section">
        <div class="avatar-wrapper">
            <img 
                src="{{ auth()->user()->image }}" 
                alt="{{ auth()->user()->name }}" 
                class="avatar-image"
            >
        </div>
    </div> -->

    <div class="profile-form">
        <!-- Personal Information Card -->
        <section class="form-card">
            <h2 class="card-title">Personal Information</h2>
            
            <div class="form-stack">
                <!-- Full Name -->
                <div class="form-group">
                    <label for="name" class="form-label">Full Name</label>
                    <input 
                        type="text" 
                        id="name" 
                        class="form-input" 
                        value="{{ auth()->user()->name }}" 
                        disabled 
                        readonly
                    >
                </div>

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input 
                        type="email" 
                        id="email" 
                        class="form-input" 
                        value="{{ auth()->user()->email }}" 
                        disabled 
                        readonly
                    >
                </div>

                <!-- Phone Number -->
                <div class="form-group">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input 
                        type="text" 
                        id="phone" 
                        class="form-input" 
                        value="{{ auth()->user()->phone ?? 'N/A' }}" 
                        disabled 
                        readonly
                    >
                </div>
            </div>
        </section>

        <!-- Actions Section -->
        <div class="form-actions" style="gap: 1rem;">
            <!-- Edit Profile Button -->
            <a href="{{ route('profile.edit') }}" class="save-btn" style="text-decoration: none; text-align: center;">
                Edit Profile
            </a>

            <!-- Logout Form & Button -->
            <form action="{{ route('logout') }}" method="POST" style="width: 100%; max-width: 16rem;">
                @csrf
                @method('DELETE')
                <button type="submit" class="save-btn logout-btn">
    Logout
</button>
            </form>
        </div>
    </div>

</div>


@endsection
