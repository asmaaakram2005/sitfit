@extends('layouts.admin')

@section('title', 'Order Details')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/orders/show.css') }}">
@endsection

@section('content')
    <div class="orders-container">
    @php
    $order = [
        'id' => 1001,
        'customer_name' => 'John Doe',
        'customer_email' => 'john@example.com',
        'customer_phone' => '+1 (555) 234-5678',
        'address' => '742 Evergreen Terrace, Springfield, OR 97477',
        'date' => 'July 20, 2026',
        'status' => 'Pending',
        'payment_method' => 'Credit Card (Visa ending in 4242)',
        'payment_status' => 'Paid',
        'subtotal' => '$460.00',
        'shipping' => '$39.00',
        'total' => '$499.00',
        'products' => [
            [
                'name' => 'SitFit Ergonomic Smart Chair Pro',
                'image' => 'https://via.placeholder.com/80',
                'quantity' => 1,
                'price' => '$350.00'
            ],
            [
                'name' => 'Posture Correction Lumbar Cushion',
                'image' => 'https://via.placeholder.com/80',
                'quantity' => 2,
                'price' => '$55.00'
            ]
        ]
    ];
    @endphp

    <!-- Top Action Nav -->
    <div class="details-top-nav">
        <a href="{{ url('admin/orders') }}" class="btn-back">
            <i class="fa-solid fa-arrow-left"></i> Back to Orders
        </a>
        <button class="btn-change-status">
            <i class="fa-solid fa-pen-to-square"></i> Change Status
        </button>
    </div>

    <!-- Main Header Card -->
    <div class="details-header-card">
        <div class="header-card-left">
            <div class="order-title">
                <h2>Order #{{ $order['id'] }}</h2>
                <span class="status-badge status-{{ strtolower($order['status']) }}">
                    {{ $order['status'] }}
                </span>
            </div>
            <p class="order-subtitle">
                Placed on <strong>{{ $order['date'] }}</strong> by <strong>{{ $order['customer_name'] }}</strong>
            </p>
        </div>
    </div>

    <!-- Details Grid -->
    <div class="details-layout-grid">
        <!-- Main Column: Products & Payments -->
        <div class="details-main-column">
            <!-- Products Section -->
            <div class="detail-card">
                <div class="card-header-title">
                    <i class="fa-solid fa-bag-shopping"></i> Order Items
                </div>
                <div class="products-list">
                    @foreach($order['products'] as $product)
                    <div class="product-item">
                        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="product-image">
                        <div class="product-info">
                            <h4 class="product-name">{{ $product['name'] }}</h4>
                            <p class="product-unit-price">Unit Price: {{ $product['price'] }}</p>
                        </div>
                        <div class="product-quantity">
                            <span>Qty: <strong>{{ $product['quantity'] }}</strong></span>
                        </div>
                        <div class="product-total">
                            ${{ number_format((float)str_replace('$', '', $product['price']) * $product['quantity'], 2) }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Payment Info Section -->
            <div class="detail-card">
                <div class="card-header-title">
                    <i class="fa-solid fa-credit-card"></i> Payment Information
                </div>
                <div class="info-grid">
                    <div class="info-group">
                        <span class="info-label">Payment Method</span>
                        <span class="info-value">{{ $order['payment_method'] }}</span>
                    </div>
                    <div class="info-group">
                        <span class="info-label">Payment Status</span>
                        <span class="payment-badge-paid">
                            <i class="fa-solid fa-circle-check"></i> {{ $order['payment_status'] }}
                        </span>
                    </div>
                    <div class="info-group">
                        <span class="info-label">Total Amount</span>
                        <span class="info-value highlight-price">{{ $order['total'] }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Side Column: Customer Info & Summary -->
        <div class="details-side-column">
            <!-- Customer Section -->
            <div class="detail-card">
                <div class="card-header-title">
                    <i class="fa-solid fa-user"></i> Customer Details
                </div>
                <div class="customer-detail-body">
                    <div class="info-group">
                        <span class="info-label">Full Name</span>
                        <span class="info-value">{{ $order['customer_name'] }}</span>
                    </div>
                    <div class="info-group">
                        <span class="info-label">Email Address</span>
                        <span class="info-value">{{ $order['customer_email'] }}</span>
                    </div>
                    <div class="info-group">
                        <span class="info-label">Phone Number</span>
                        <span class="info-value">{{ $order['customer_phone'] }}</span>
                    </div>
                    <div class="info-group">
                        <span class="info-label">Shipping Address</span>
                        <span class="info-value address-text">{{ $order['address'] }}</span>
                    </div>
                </div>
            </div>

            <!-- Order Summary Section -->
            <div class="detail-card">
                <div class="card-header-title">
                    <i class="fa-solid fa-receipt"></i> Order Summary
                </div>
                <div class="summary-body">
                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span>{{ $order['subtotal'] }}</span>
                    </div>
                    <div class="summary-row">
                        <span>Shipping</span>
                        <span>{{ $order['shipping'] }}</span>
                    </div>
                    <hr class="summary-divider">
                    <div class="summary-row total-row">
                        <span>Total</span>
                        <span>{{ $order['total'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection