@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endsection

@section('title')
Shopping Cart
@endsection

@section('content')

<div class="cart-header-center">

    <h1 class="cart-main-title">
        Shopping Cart
    </h1>

    <p class="cart-subtitle-text">
        Review your selected items before proceeding to checkout.
    </p>

    <div class="cart-badge-container">

        <span class="cart-count-badge" id="cartBadge">

            <i class="fa-solid fa-bag-shopping"></i>

            {{ $cartItems->sum('quantity') }}
            Item{{ $cartItems->sum('quantity') != 1 ? 's' : '' }}
            in Cart

        </span>

    </div>

</div>

<div id="activeCartView"
     class="cart-grid {{ $cartItems->isEmpty() ? 'hidden' : '' }}">

    <div class="cart-items-panel">

        <div class="cart-table-head">
            <span class="head-product">Product</span>
            <span class="head-qty text-center">Quantity</span>
            <span class="head-total text-right">Total</span>
        </div>

        <div class="cart-items-list">

            @forelse($cartItems as $item)

            <div class="cart-item-row"
                 id="row-{{ $item->id }}"
                 data-id="{{ $item->id }}"
                 data-price="{{ $item->product->price }}"
                 data-qty="{{ $item->quantity }}">

                <div class="item-info">

                    <div class="item-img">

                        <img src="{{ asset('images/' . optional($item->product->images->first())->image) }}"
                             alt="{{ $item->product->name }}">

                    </div>

                    <div class="item-text">

                        <h3 class="item-title">
                            {{ $item->product->name }}
                        </h3>

                        <p class="item-desc">
                            {{ Str::limit($item->product->description,120) }}
                        </p>

                        <span class="item-price">
                            {{ number_format($item->product->price,2) }} EGP
                        </span>

                    </div>

                </div>

                <div class="item-qty">

                    <div class="qty-stepper">

                        <form action="{{ route('cart.decrease',$item) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <button class="qty-btn">-</button>
                        </form>

                        <span class="qty-count">
                            {{ $item->quantity }}
                        </span>

                        <form action="{{ route('cart.increase',$item) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <button class="qty-btn">+</button>
                        </form>

                    </div>

                </div>

                <div class="item-total">

                    <span class="total-price">
                        {{ number_format($item->product->price * $item->quantity,2) }} EGP
                    </span>

                    <form action="{{ route('cart.destroy',$item) }}" method="POST">

                        @csrf
                        @method('DELETE')

                        <button class="btn-remove">
                            🗑 Remove
                        </button>

                    </form>

                </div>

            </div>

            @empty
            @endforelse

        </div>
        <!-- Action Bar -->
        <div class="cart-actions-bar">

            <a href="{{ route('products.index') }}" class="btn-link-back">
                <i class="fa-solid fa-arrow-left"></i>
                Continue Shopping
            </a>

            <form action="{{ route('cart.clear') }}" method="POST">

                @csrf
                @method('DELETE')

                <button
                class="btn-clear-all">

                    <i class="fa-solid fa-trash-can"></i>
                    Clear Cart

                </button>

            </form>

        </div>

    </div>

    @php

        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $shipping = 0;
        $total = $subtotal;

    @endphp

    <aside class="cart-summary-panel">

        <div class="summary-card">

            <h2 class="summary-title">
                Order Summary
            </h2>

            <div class="summary-row">

                <span>Products</span>

                <span class="summary-val"
                      id="productsCount">

                    {{ $cartItems->sum('quantity') }}

                </span>

            </div>

            <div class="summary-row">

                <span>Subtotal</span>

                <span class="summary-val"
                      id="subtotalVal">

                    {{ number_format($subtotal,2) }} EGP

                </span>

            </div>

            <div class="summary-row">

                <span>Shipping</span>

                <span class="summary-val text-success">
                    FREE
                </span>

            </div>

            <div class="summary-divider"></div>

            <div class="summary-row summary-total">

                <span>Total</span>

                <span
                    class="total-amount"
                    id="totalVal">

                    {{ number_format($total,2) }} EGP

                </span>

            </div>

            @if($cartItems->isNotEmpty())

                <a
                    href="{{ route('checkout.index') }}"
                    class="btn-checkout">

                    <span>
                        Proceed To Checkout
                    </span>

                    <i class="fa-solid fa-arrow-right"></i>

                </a>

            @else

                <button
                    class="btn-checkout"
                    disabled
                    style="opacity:.5;cursor:not-allowed;">

                    Cart Is Empty

                </button>

            @endif

            <div class="secure-badge">

                <i class="fa-solid fa-shield-halved"></i>

                Secure Checkout

            </div>

        </div>

    </aside>

</div>

{{-- Empty Cart --}}

<div id="emptyCartView"
     class="cart-empty-panel {{ $cartItems->isNotEmpty() ? 'hidden' : '' }}">

    <div class="empty-card">

        <div class="empty-icon">
            🛒
        </div>

        <h2>
            Your Cart Is Empty
        </h2>

        <p>
            Looks like you haven't added any products yet.
        </p>

        <a href="{{ route('products.index') }}"
           class="btn-browse">

            Browse Products

        </a>

    </div>

</div>


{{-- Recommended Products --}}

<section class="cart-recommended-section">

    <h2 class="recommended-title">
        Recommended Products
    </h2>

    <div class="recommended-grid">

        @foreach(\App\Models\Product::take(2)->get() as $product)

            <div class="recommended-card">

                <div class="recommended-thumb">

                    <img src="{{ asset('images/' . optional($product->images->first())->image) }}"
                         alt="{{ $product->name }}">

                </div>

                <div class="recommended-details">

                    <h4>
                        {{ $product->name }}
                    </h4>

                    <p>
                        {{ Str::limit($product->description,70) }}
                    </p>

                    <span class="recommended-price">

                        {{ number_format($product->price,2) }}
                        EGP

                    </span>

                    <form action="{{ route('cart.store',$product) }}"
                          method="POST">

                        @csrf

                        <button class="btn-add-rec">

                            Add To Cart

                        </button>

                    </form>

                </div>

            </div>

        @endforeach

    </div>

</section>



{{-- Trust Bar --}}

<section class="trust-bar">

    <div class="trust-pill">

        <i class="fa-solid fa-truck-fast"></i>

        <span>
            Free Shipping
        </span>

    </div>

    <div class="trust-pill">

        <i class="fa-solid fa-shield-halved"></i>

        <span>
            1-Year Official Warranty
        </span>

    </div>

    <div class="trust-pill">

        <i class="fa-solid fa-rotate-left"></i>

        <span>
            30-Day Easy Returns
        </span>

    </div>

    <div class="trust-pill">

        <i class="fa-solid fa-credit-card"></i>

        <span>
            Secure Payment
        </span>

    </div>

</section>

<!-- Cart Controller Script -->

@endsection