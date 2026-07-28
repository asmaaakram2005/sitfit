@extends('layouts.app')


@section('css')

<link rel="stylesheet" href="{{ asset('css/orders.css') }}">

@endsection



@section('title')

<!-- write The title here like 'Home page' with out anything just string. "Ahmed" -->
   My Orders
@endsection




@section('content')

<!-- Write all codes of page here without write <html> or <body>. "Ahmed" -->
   
   {{-- TEMPORARY DUMMY DATA FOR DEVELOPMENT  "sondos"--}}
@php
    $orders = collect([
        [
            'id' => 1025,
            'date' => '15 Jul 2026',
            'status' => 'Pending',
            'items' => 3,
            'total' => '820.00 EGP'
        ],
        [
            'id' => 1024,
            'date' => '12 Jul 2026',
            'status' => 'Processing',
            'items' => 1,
            'total' => '450.00 EGP'
        ],
        [
            'id' => 1021,
            'date' => '08 Jul 2026',
            'status' => 'Shipped',
            'items' => 5,
            'total' => '2,340.00 EGP'
        ],
        [
            'id' => 1018,
            'date' => '28 Jun 2026',
            'status' => 'Delivered',
            'items' => 2,
            'total' => '1,150.00 EGP'
        ],
        [
            'id' => 1005,
            'date' => '14 May 2026',
            'status' => 'Cancelled',
            'items' => 4,
            'total' => '1,890.00 EGP'
        ],
    ]);
@endphp

<main class="sf-orders-container">
    <header class="sf-orders-header">
        <h1 class="sf-orders-title">My Orders</h1>
        <p class="sf-orders-subtitle">Track all your previous orders.</p>
    </header>

    @if(isset($orders) && count($orders) > 0)
        <!-- Orders Grid Section -->
        <section class="sf-orders-grid">
            @foreach($orders as $order)
                @php
                    $statusClass = 'sf-status-' . strtolower(is_array($order) ? $order['status'] : $order->status);
                @endphp
                <article class="sf-order-card">
                    <div class="sf-order-card-header">
                        <span class="sf-order-number">Order #{{ is_array($order) ? $order['id'] : $order->id }}</span>
                        <span class="sf-status-badge {{ $statusClass }}">
                            {{ is_array($order) ? $order['status'] : $order->status }}
                        </span>
                    </div>
                    <div class="sf-order-card-body">
                        <div class="sf-order-meta">
                            <span class="sf-meta-label">Date:</span>
                            <span class="sf-meta-value">{{ is_array($order) ? $order['date'] : $order->date }}</span>
                        </div>
                        <div class="sf-order-meta">
                            <span class="sf-meta-label">Items:</span>
                            <span class="sf-meta-value">
                                {{ is_array($order) ? $order['items'] : $order->items }} 
                                {{ (is_array($order) ? $order['items'] : $order->items) > 1 ? 'Products' : 'Product' }}
                            </span>
                        </div>
                        <div class="sf-order-total">
                            <span class="sf-total-label">Total:</span>
                            <span class="sf-total-amount">{{ is_array($order) ? $order['total'] : $order->total }}</span>
                        </div>
                    </div>
                </article>
            @endforeach
        </section>
    @else
        <!-- Empty State Section -->
        <section class="sf-empty-state">
            <div class="sf-empty-icon-wrapper">
                <svg class="sf-empty-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
            </div>
            <h2 class="sf-empty-title">You don't have any orders yet.</h2>
            <p class="sf-empty-subtitle">Start shopping to see your orders here.</p>
            <a href="#" class="sf-shop-btn">Shop Now</a>
        </section>
    @endif
</main>
</main>
@endsection