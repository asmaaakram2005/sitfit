@extends('layouts.app')


@section('css')

<link rel="stylesheet" href="{{ asset('css/checkout.css') }}">

@endsection



@section('title', 'Checkout')






@section('content')

<!-- Write all codes of page here without write <html> or <body>. "Ahmed" -->

<main class="checkout-page">
    <div class="checkout-container">
        
        {{-- Header & Progress --}}
        <header class="checkout-header">
            <h1 class="page-title">Checkout</h1>
            <p class="page-subtitle">Complete your order securely.</p>
            
            <nav class="progress-bar" aria-label="Checkout Progress">
                <div class="step completed">
                    <span class="step-icon">✔</span>
                    <span class="step-label">Cart</span>
                </div>
                <div class="step-line active"></div>
                <div class="step active">
                    <span class="step-icon">●</span>
                    <span class="step-label">Checkout</span>
                </div>
                <div class="step-line"></div>
                <div class="step">
                    <span class="step-icon">○</span>
                    <span class="step-label">Complete</span>
                </div>
            </nav>
        </header>

        {{-- Main Checkout Layout --}}
        <div class="checkout-grid">
            
            {{-- Form Section (Left Column on Desktop) --}}
            <section class="checkout-main">
                <form 
                    action="{{ route('checkout.store') }}" 
                    method="POST" 
                    class="checkout-form" 
                    id="checkout-form">
                    @csrf
                    
                    {{-- Shipping Information --}}
                    <fieldset class="form-section">
                        <legend class="section-title">Shipping Information</legend>
                        
                        <div class="form-group full-width">
                            <label for="fullname">Full Name</label>

                            <input
                            type="text"
                            id="fullname"
                            name="fullname"
                            value="{{ old('fullname', auth()->user()->name) }}"
                            required>

                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="phone">Phone Number</label>

                                <input
                                type="tel"
                                id="phone"
                                name="phone"
                                value="{{ old('phone', auth()->user()->phone) }}"
                                required>

                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>

                                <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email', auth()->user()->email) }}"
                                required>

                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="country">Country</label>
                                
                                <input
                                type="text"
                                id="country"
                                name="country"
                                value="{{ old('country', $address->country ?? '') }}"
                                required>

                            </div>
                            <div class="form-group">
                                <label for="city">City</label>

                                <input
                                type="text"
                                id="city"
                                name="city"
                                value="{{ old('city', $address->city ?? '') }}"
                                required>

                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group grid-span-2">
                                <label for="street">Street Address</label>

                                <input
                                type="text"
                                id="street"
                                name="street"
                                value="{{ old('street', $address->street ?? '') }}"
                                required>

                            </div>
                            <div class="form-group">
                                <label for="building">Building Number</label>

                                <input
                                type="text"
                                id="building"
                                name="building"
                                value="{{ old('building', $address->building_number ?? '') }}"
                                required>

                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="apartment">Apartment number (Optional)</label>

                                <input
                                type="text"
                                id="apartment"
                                name="apartment"
                                value="{{ old('apartment', $address->apartment_number ?? '') }}">

                            </div>
                            <div class="form-group">
                                <label for="zip">ZIP Code (Optional)</label>

                                <input
                                type="text"
                                id="zip"
                                name="zip"
                                value="{{ old('zip', $address->postal_code ?? '') }}">

                            </div>
                        </div>
                    </fieldset>

                    {{-- Delivery Method --}}
                    <fieldset class="form-section">
                        <legend class="section-title">Delivery Method</legend>
                        <div class="options-grid">
                            <label class="option-card">
                                <input type="radio" name="delivery_method" value="standard" checked>
                                <div class="option-content">
                                    <span class="option-title">Standard Delivery</span>
                                    <span class="option-desc">Delivered in 3–5 business days</span>
                                </div>
                            </label>
                            <label class="option-card">
                                <input type="radio" name="delivery_method" value="express">
                                <div class="option-content">
                                    <span class="option-title">Express Delivery</span>
                                    <span class="option-desc">Delivered in 1–2 business days</span>
                                </div>
                            </label>
                        </div>
                    </fieldset>

                    {{-- Payment Method --}}
                    <fieldset class="form-section">
                        <legend class="section-title">Payment Method</legend>
                        <div class="options-grid">
                            <label class="option-card">
                                <input type="radio" name="payment_method" value="cod" checked>
                                <div class="option-content">
                                    <span class="option-title">Cash On Delivery</span>
                                    <span class="option-desc">Pay upon receiving your chair</span>
                                </div>
                            </label>
                            <label class="option-card">
                                <input type="radio" name="payment_method" value="card">
                                <div class="option-content">
                                    <span class="option-title">Credit Card</span>
                                    <span class="option-desc">Visa, Mastercard, or AMEX</span>
                                </div>
                            </label>
                            <label class="option-card">
                                <input type="radio" name="payment_method" value="vodafone">
                                <div class="option-content">
                                    <span class="option-title">Vodafone Cash</span>
                                    <span class="option-desc">Pay instantly via e-wallet</span>
                                </div>
                            </label>
                        </div>
                    </fieldset>

                    {{-- Security Badges --}}
                    <div class="security-badges">
                        <div class="badge-item">
                            <span class="badge-icon">🔒</span>
                            <span class="badge-text">Secure Payment</span>
                        </div>
                        <div class="badge-item">
                            <span class="badge-icon">🛡️</span>
                            <span class="badge-text">2-Year Warranty</span>
                        </div>
                        <div class="badge-item">
                            <span class="badge-icon">🚀</span>
                            <span class="badge-text">Fast Delivery</span>
                        </div>
                    </div>
                </form>
            </section>

            {{-- Sidebar Section (Right Column on Desktop) --}}
            <aside class="checkout-sidebar">
                <div class="summary-card">
                    <h2 class="summary-title">Order Summary</h2>

                    <div class="cart-items">

                        @foreach($cartItems as $item)

                        <div class="item-row">

                            <div class="item-details">

                                <span class="item-name">
                                    {{ $item->product->name }}
                                </span>

                                <span class="item-qty">
                                    Qty : {{ $item->quantity }}
                                </span>

                            </div>

                            <span class="item-price">

                                {{ number_format($item->product->price * $item->quantity,2) }}
                                EGP

                            </span>

                        </div>

                        @endforeach

                    </div>

                    <div class="summary-breakdown">
                        <div class="breakdown-row">
                            <span>Subtotal</span>
                            <span>
                                {{ number_format($subtotal,2) }} EGP
                            </span>
                        </div>
                        <div class="breakdown-row">
                            <span>Shipping</span>
                            <span>
                                {{ number_format($shipping,2) }} EGP
                            </span>
                        </div>
                        <div class="breakdown-row">
                            <span>Estimated Tax</span>
                            <span>{{ number_format($tax,2) }} EGP</span>
                        </div>
                        <div class="breakdown-row discount">
                            <span>Discount</span>
                            <span>
                                -{{ number_format($discount,2) }} EGP
                            </span>
                        </div>
                        <hr class="summary-divider">
                        <div class="breakdown-row total">
                            <span>Total</span>
                            <span>
                                {{ number_format($total,2) }} EGP
                            </span>
                        </div>
                    </div>

                    {{-- Coupon Section --}}
                    <div class="coupon-section">
                        <label for="coupon_code" class="coupon-label">Have a coupon?</label>
                        <div class="coupon-input-group">
                            <input type="text" id="coupon_code" name="coupon_code" placeholder="Discount Code">
                            <button type="button" class="btn-secondary">Apply</button>
                        </div>
                    </div>

                    {{-- Terms & CTA --}}
                    <div class="checkout-action">
                        <label class="terms-checkbox">
                            <input type="checkbox" name="terms" required form="checkout-form">
                            <span>I agree to the <a href="#">Terms & Conditions</a>.</span>
                        </label>
                        
                        <button type="submit" form="checkout-form" class="btn-primary place-order-btn">Place Order</button>
                    </div>
                </div>
            </aside>

        </div>
    </div>
</main>
@endsection