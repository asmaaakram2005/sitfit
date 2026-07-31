@extends('layouts.admin')

@section('title', 'Order Details')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/orders/show.css') }}">
@endsection

@section('content')
    <div class="orders-container">
    
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
                <h2>Order #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</h2>
                <span class="status-badge status-{{ $order->status }}">
                    {{ $order->status }}
                </span>
            </div>
            <p class="order-subtitle">
                Placed on <strong>{{ $order->created_at->diffForHumans() }}</strong> by <strong>{{ $order->user->name }}</strong>
            </p>
        </div>
    </div>

    <!-- Details Grid -->
    <div class="details-layout-grid">
        <!-- Main Column: Products & Payments -->
        <!-- <div class="details-main-column"> -->
            <!-- Products Section -->
            <!-- <div class="detail-card">
                <div class="card-header-title">
                    <i class="fa-solid fa-bag-shopping"></i> Order Items
                </div>

            </div> -->

            <!-- Payment Info Section -->
            <!-- <div class="detail-card">
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
                        <span class="info-value highlight-price">{{ $order->total_price}}</span>
                    </div>
                </div>
            </div> -->
        <!-- </div> -->

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
                        <span class="info-value">{{ $order->user->name }}</span>
                    </div>
                    <div class="info-group">
                        <span class="info-label">Email Address</span>
                        <span class="info-value">{{ $order->user->email }}</span>
                    </div>
                    <div class="info-group">
                        <span class="info-label">Phone Number</span>
                        <span class="info-value">{{ $order->user->phone }}</span>
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