@extends('layouts.app')


@section('css')

<link rel="stylesheet" href="{{ asset('css/profile.css') }}">

@endsection



@section('title')

<!-- write The title here like 'Home page' with out anything just string. "Ahmed" -->
    Edit Profile
@endsection




@section('content')

<!-- Write all codes of page here without write <html> or <body>. "Ahmed" -->

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
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRTxoJOzDhj-8nkfEfAibh9ZBeMDnUplrTgTBnScLo39A&s=10" 
                alt="Profile photo" 
                class="avatar-image"
            >
            <button type="button" class="avatar-upload-btn" aria-label="Change Photo">
                <svg width="1.25rem" height="1.25rem" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h0.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>Change Photo</span>
            </button>
        </div>
    </section>

    <form action="#" method="POST" class="profile-form">
        @csrf

        {{-- Single Personal Information Card --}}
        <section class="form-card">
            <h2 class="card-title">Personal Information</h2>
            
            <div class="form-stack">
                {{-- 1. Full Name --}}
                <div class="form-group">
                    <label for="full_name" class="form-label">Full Name</label>
                    <input 
                        type="text" 
                        id="full_name" 
                        name="full_name" 
                        class="form-input" 
                        value="john doe" 
                        required
                    >
                </div>

                {{-- 2. Email --}}
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="form-input" 
                        value="john.doe@example.com" 
                        required
                    >
                </div>

                {{-- 3. Phone Number --}}
                <div class="form-group">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input 
                        type="tel" 
                        id="phone" 
                        name="phone" 
                        class="form-input" 
                        value="01012345678" 
                        required
                    >
                </div>

                {{-- 4. Current Password --}}
           <div class="form-group">
             <label for="current_password" class="form-label">
              Current Password
             </label>

        <div class="password-wrapper">
             <input
            type="password"
            id="current_password"
            name="current_password"
            class="form-input"
            placeholder="••••••••"
            >

           <i class="fa-solid fa-eye toggle-password"></i>
            </div>
        </div>
                {{-- 5. New Password --}}
        <div class="form-group">
           <label for="new_password" class="form-label">
             New Password
           </label>

        <div class="password-wrapper">
           <input
            type="password"
            id="new_password"
            name="new_password"
            class="form-input"
            placeholder="••••••••"
           >

          <i class="fa-solid fa-eye toggle-password"></i>
        </div>
     </div>
                {{-- 6. Confirm Password --}}
          <div class="form-group">
                 <label for="new_password_confirmation" class="form-label">
                      Confirm Password
                 </label>

          <div class="password-wrapper">
             <input
            type="password"
            id="new_password_confirmation"
            name="new_password_confirmation"
            class="form-input"
            placeholder="••••••••"
            >

           <i class="fa-solid fa-eye toggle-password"></i>
         </div>
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

            const input =
                toggle.parentElement.querySelector("input");

            if (input.type === "password") {
                input.type = "text";
                toggle.classList.replace(
                    "fa-eye",
                    "fa-eye-slash"
                );
            } else {
                input.type = "password";
                toggle.classList.replace(
                    "fa-eye-slash",
                    "fa-eye"
                );
            }
        });
    });
</script>

@endsection