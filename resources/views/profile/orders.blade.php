@extends('layouts.app')


@section('css')

<link rel="stylesheet" href="{{ asset('css/orders.css') }}">

@endsection



@section('title', 'My Orders')

   




@section('content')

<!-- Write all codes of page here without write <html> or <body>. "Ahmed" -->
   
   {{-- TEMPORARY DUMMY DATA FOR DEVELOPMENT  "sondos"--}}
<<<<<<< HEAD
@php
    $orders = collect([
        // [
        //     'id' => 1025,
        //     'date' => '15 Jul 2026',
        //     'status' => 'Pending',
        //     'items' => 3,
        //     'total' => '820.00 EGP'
        // ],
        // [
        //     'id' => 1024,
        //     'date' => '12 Jul 2026',
        //     'status' => 'Processing',
        //     'items' => 1,
        //     'total' => '450.00 EGP'
        // ],
        // [
        //     'id' => 1021,
        //     'date' => '08 Jul 2026',
        //     'status' => 'Shipped',
        //     'items' => 5,
        //     'total' => '2,340.00 EGP'
        // ],
        // [
        //     'id' => 1018,
        //     'date' => '28 Jun 2026',
        //     'status' => 'Delivered',
        //     'items' => 2,
        //     'total' => '1,150.00 EGP'
        // ],
        // [
        //     'id' => 1005,
        //     'date' => '14 May 2026',
        //     'status' => 'Cancelled',
        //     'items' => 4,
        //     'total' => '1,890.00 EGP'
        // ],
    ]);
@endphp
=======
>>>>>>> 4f20b7c18643f9f75fb2f4ce5c9ce522047d9839

<main class="sf-orders-container">
    <header class="sf-orders-header">
        <h1 class="sf-orders-title">My Orders</h1>
        <p class="sf-orders-subtitle">Track all your previous orders.</p>
    </header>

    @if($orders->isNotEmpty())
        <!-- Orders Grid Section -->
        <section class="sf-orders-grid">
            @foreach($orders as $order)
                @php
                    $statusClass = 'sf-status-' . strtolower(is_array($order) ? $order['status'] : $order->status);
                @endphp
                <article class="sf-order-card">
                    <div class="sf-order-card-header">
                        <span class="sf-order-number">Order #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</span>
                        <span class="sf-status-badge {{ $statusClass }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                    <div class="sf-order-card-body">
                        <div class="sf-order-meta">
                            <span class="sf-meta-label">Date:</span>
                            <span class="sf-meta-value">
                                {{ $order->created_at->format('d M Y') }}
                            </span>
                        </div>
                        <div class="sf-order-meta">
                            <span class="sf-meta-label">Items:</span>
                                @php
                                    $itemsCount = $order->orderItems->sum('quantity');
                                @endphp
                                <span class="sf-meta-value"></span>
                                    {{ $itemsCount }}
                                    {{ $order->orderItems->count() > 1 ? 'Products' : 'Product' }}
                                </span>
                        </div>
                        <div class="sf-order-total">
                            <span class="sf-total-label">Total:</span>
                            <span class="sf-total-amount">
                                {{ number_format($order->total_price,2) }} EGP
                            </span>
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
            <a href="{{ route('products.index') }}" class="sf-shop-btn">Shop Now</a>
        </section>
    @endif
</main>
@endsection