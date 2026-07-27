@extends('layouts.app')


@section('css')

<link rel="stylesheet" href="{{ asset('css/checkout.css') }}">

@endsection



@section('title',' Order Placed Successfully')



@section('content')

<!-- Write all codes of page here without write <html> or <body>. "Ahmed" -->

<main class="success-page">
    <div class="success-card">
        
        {{-- Success Checkmark Icon --}}
        <div class="success-icon-wrapper" aria-hidden="true">
            <span class="success-icon">✓</span>
        </div>

        <h1 class="success-title">Order Placed Successfully!</h1>
        <p class="success-message">
            Thank you for choosing <strong>SitFit</strong>.<br>
            Your order has been received successfully.
        </p>

        {{-- Order Meta Details --}}
        <div class="order-details-box">
            <div class="detail-item">
                <span class="detail-label">Order Number</span>
                <span class="detail-value highlighted">
                    #SF-{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}
                </span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Estimated Delivery</span>
                <span class="detail-value">3–5 Days</span>
            </div>
        </div>

        {{-- Action Buttons --}}
        <div class="success-actions">
            <a href="#" class="btn-secondary">View My Orders</a>
            <a href="{{route('products.index')}}" class="btn-primary">Continue Shopping</a>
        </div>

    </div>
</main>
@endsection