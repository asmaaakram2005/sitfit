@extends('layouts.app')


@section('css')

<link rel="stylesheet" href="{{ asset('css/addresses.css') }}">

@endsection



@section('title')

<!-- write The title here like 'Home page' with out anything just string. "Ahmed" -->
  
       My Address
@endsection




@section('content')

<!-- Write all codes of page here without write <html> or <body>. "Ahmed" -->
  

   <!-- you can write test code down this comment "sondos" -->
    

<!-- 1-no address

@php
    $address = null;
    $isEditing = false;
@endphp

2-editing

@php
    $address = (object) [
        'full_name' => 'Kylan Gentry',
        'phone' => '+20 10123456789',
        'city' => 'Giza',
        'address' => 'Building 15, Nasr City, Apartment 7'
    ];

    $isEditing = true;
@endphp

3-address exists

@php
    $address = (object) [
        'full_name' => 'Kylan Gentry',
        'phone' => '+20 10123456789',
        'city' => 'Giza',
        'address' => 'Building 15, Nasr City, Apartment 7'
    ];

    $isEditing = false;
@endphp -->


        <main class="address-page-container">
    <div class="address-wrapper">

        {{-- Centered Header Section --}}
        <header class="address-header">
            <div class="header-icon-wrapper">
                <svg class="location-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                    <circle cx="12" cy="10" r="3"></circle>
                </svg>
            </div>
            <h1 class="header-title">
                @if($isEditing)
                    Edit Address
                @else
                    My Address
                @endif
            </h1>
            <p class="header-subtitle">
                @if($isEditing)
                    Update your delivery information.
                @else
                    Manage your saved delivery address.
                @endif
            </p>
        </header>

        {{-- Conditional Card Containers for 3 States --}}
        @if(!$address)
            {{-- State 1: No Address State --}}
            <article class="address-card">
                <div class="card-accent-line"></div>
                <div class="card-body">
                    <div class="info-banner">
                        <svg class="info-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="16" x2="12" y2="12"></line>
                            <line x1="12" y1="8" x2="12.01" y2="8"></line>
                        </svg>
                        <span>You haven't added an address yet.</span>
                    </div>

                    <form action="#" method="POST" class="address-form">
                        @csrf
                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input type="text" id="full_name" name="full_name" placeholder="Enter your full name" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
                        </div>

                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" id="city" name="city" placeholder="Enter your city" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea id="address" name="address" rows="3" placeholder="Building 15&#10;Nasr City&#10;Apartment 7" required></textarea>
                        </div>

                        <div class="form-actions center-actions">
                            <button type="submit" class="btn btn-primary">Save Address</button>
                        </div>
                    </form>
                </div>
            </article>

        @elseif($isEditing)
            {{-- State 3: Editing State --}}
            <article class="address-card">
                <div class="card-accent-line"></div>
                <div class="card-body">
                    <form action="#" method="POST" class="address-form">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input type="text" id="full_name" name="full_name" value="{{ old('full_name', $address->full_name) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone', $address->phone) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" id="city" name="city" value="{{ old('city', $address->city) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea id="address" name="address" rows="3" required>{{ old('address', $address->address) }}</textarea>
                        </div>

                        <div class="form-actions dual-actions">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            <a href="#" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </article>

        @else
            {{-- State 2: Address Exists State --}}
            <article class="address-card display-card">
                <div class="card-accent-line"></div>
                <div class="card-body center-content">
                   
                    <h2 class="display-name">{{ $address->full_name }}</h2>

                    <div class="display-info-list">
                        <div class="display-item">
                            <svg class="item-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                            <span>{{ $address->phone }}</span>
                        </div>

                        <div class="display-item">
                            <svg class="item-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span>{{ $address->city }}</span>
                        </div>

                        <div class="display-item address-block">
                            <svg class="item-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="9" y1="3" x2="9" y2="21"></line>
                            </svg>
                            <div class="address-text">{{ $address->address }}</div>
                        </div>
                    </div>

                    <div class="card-actions center-actions">
                        <a href="#" class="btn btn-primary">Edit Address</a>

                        <form action="#" method="POST" class="inline-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this address?')">Delete</button>
                        </form>
                    </div>
                </div>
            </article>
        @endif

    </div>
</main>
@endsection