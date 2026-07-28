@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/addresses.css') }}">
@endsection

@section('title', 'My Address')

@section('content')

<main class="address-page-container">
    <div class="address-wrapper">

        <header class="address-header">
            <div class="header-icon-wrapper">
                <svg class="location-icon" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">

                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                    <circle cx="12" cy="10" r="3"></circle>

                </svg>
            </div>

            <h1 class="header-title">
                {{ $isEditing ? 'Edit Address' : 'My Address' }}
            </h1>

            <p class="header-subtitle">
                {{ $isEditing ? 'Update your delivery information.' : 'Manage your saved delivery address.' }}
            </p>

        </header>

        <!-- Don't have any adresses -->
        @if(!$address)

        <article class="address-card">

            <div class="card-accent-line"></div>

            <div class="card-body">

                <div class="info-banner">

                    <svg class="info-icon"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2">

                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="16" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12.01" y2="8"></line>

                    </svg>

                    <span>You haven't added an address yet.</span>

                </div>

                <form action="{{ route('profile.address.store') }}"
                      method="POST"
                      class="address-form">

                    @csrf

                    <div class="form-group">
                        <label>Address Label</label>

                        <input
                            type="text"
                            name="label"
                            value="{{ old('label') }}"
                            placeholder="Home / Work / Office"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Country</label>

                        <input
                            type="text"
                            name="country"
                            value="{{ old('country') }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label>City</label>

                        <input
                            type="text"
                            name="city"
                            value="{{ old('city') }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Street</label>

                        <input
                            type="text"
                            name="street"
                            value="{{ old('street') }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Building Number</label>

                        <input
                            type="text"
                            name="building_number"
                            value="{{ old('building_number') }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Floor (Optional)</label>

                        <input
                            type="text"
                            name="floor"
                            value="{{ old('floor') }}">
                    </div>

                    <div class="form-group">
                        <label>Apartment Number (Optional)</label>

                        <input
                            type="text"
                            name="apartment_number"
                            value="{{ old('apartment_number') }}">
                    </div>

                    <div class="form-group">
                        <label>Postal Code (Optional)</label>

                        <input
                            type="text"
                            name="postal_code"
                            value="{{ old('postal_code') }}">
                    </div>

                    <div class="form-actions center-actions">

                        <button type="submit"
                            class="btn btn-primary">
                            Save Address
                        </button>

                    </div>

                </form>

            </div>

        </article>

        <!-- Edit your adress -->
        @elseif($isEditing)

        <article class="address-card">

            <div class="card-accent-line"></div>

            <div class="card-body">

                <form action="{{ route('profile.address.update') }}"
                    method="POST"
                    class="address-form">

                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Address Label</label>

                        <input
                            type="text"
                            name="label"
                            value="{{ old('label', $address->label) }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Country</label>

                        <input
                            type="text"
                            name="country"
                            value="{{ old('country', $address->country) }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label>City</label>

                        <input
                            type="text"
                            name="city"
                            value="{{ old('city', $address->city) }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Street</label>

                        <input
                            type="text"
                            name="street"
                            value="{{ old('street', $address->street) }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Building Number</label>

                        <input
                            type="text"
                            name="building_number"
                            value="{{ old('building_number', $address->building_number) }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Floor (Optional)</label>

                        <input
                            type="text"
                            name="floor"
                            value="{{ old('floor', $address->floor) }}">
                    </div>

                    <div class="form-group">
                        <label>Apartment Number (Optional)</label>

                        <input
                            type="text"
                            name="apartment_number"
                            value="{{ old('apartment_number', $address->apartment_number) }}">
                    </div>

                    <div class="form-group">
                        <label>Postal Code (Optional)</label>

                        <input
                            type="text"
                            name="postal_code"
                            value="{{ old('postal_code', $address->postal_code) }}">
                    </div>

                    <div class="form-actions dual-actions">

                        <button type="submit" class="btn btn-primary">
                            Save Changes
                        </button>

                        <a href="{{ route('profile.address') }}"
                        class="btn btn-secondary">
                            Cancel
                        </a>

                    </div>

                </form>

            </div>

        </article>
        @else
        <!-- ========================================================================= -->
        <article class="address-card display-card">

        <div class="card-accent-line"></div>

        <div class="card-body center-content">

            <h2 class="display-name">
                {{ $address->label }}
            </h2>

            <div class="display-info-list">

                <div class="display-item">

                    <strong>Country:</strong>

                    <span>{{ $address->country }}</span>

                </div>

                <div class="display-item">

                    <strong>City:</strong>

                    <span>{{ $address->city }}</span>

                </div>

                <div class="display-item">

                    <strong>Street:</strong>

                    <span>{{ $address->street }}</span>

                </div>

                <div class="display-item">

                    <strong>Building:</strong>

                    <span>{{ $address->building_number }}</span>

                </div>

                @if($address->floor)

                <div class="display-item">

                    <strong>Floor:</strong>

                    <span>{{ $address->floor }}</span>

                </div>

                @endif

                @if($address->apartment_number)

                <div class="display-item">

                    <strong>Apartment:</strong>

                    <span>{{ $address->apartment_number }}</span>

                </div>

                @endif

                @if($address->postal_code)

                <div class="display-item">

                    <strong>Postal Code:</strong>

                    <span>{{ $address->postal_code }}</span>

                </div>

                @endif

            </div>

            <div class="card-actions center-actions">

                <a href="{{ route('profile.address.edit') }}"
                class="btn btn-primary">

                    Edit Address

                </a>

                <form action="{{ route('profile.address.destroy') }}"
                    method="POST"
                    class="inline-form">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-danger"
                            onclick="return confirm('Are you sure you want to delete this address?')">

                        Delete

                    </button>

                </form>

            </div>

        </div>

    </article>

    @endif

    </div>
    </main>

@endsection