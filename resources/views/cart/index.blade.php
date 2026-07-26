@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endsection

@section('title')
Shopping Cart
@endsection

@section('content')

<!-- Page Header -->
<div class="cart-header-center">
    <h1 class="cart-main-title">Shopping Cart</h1>
    <p class="cart-subtitle-text">
        Review your selected items before proceeding to checkout.
    </p>
    <div class="cart-badge-container">
        <span class="cart-count-badge" id="cartBadge">
            <i class="fa-solid fa-bag-shopping"></i> 2 Items in Cart
        </span>
    </div>
</div>

<!-- Main Cart Grid Container -->
<div id="activeCartView" class="cart-grid">
    
    <!-- Cart Items Panel -->
    <div class="cart-items-panel">
        <div class="cart-table-head">
            <span class="head-product">Product</span>
            <span class="head-qty text-center">Quantity</span>
            <span class="head-total text-right">Total</span>
        </div>

        <!-- Dynamic Items Container -->
        <div id="cartItemsList" class="cart-items-list"></div>

        <!-- Action Bar -->
        <div class="cart-actions-bar">
            <a href="/products" class="btn-link-back">
                <i class="fa-solid fa-arrow-left"></i> Continue Shopping
            </a>
            <button type="button" class="btn-clear-all" onclick="clearCart()">
                <i class="fa-solid fa-trash-can"></i> Clear Cart
            </button>
        </div>
    </div>

    <!-- Order Summary Sidebar -->
    <aside class="cart-summary-panel">
        <div class="summary-card">
            <h2 class="summary-title">Order Summary</h2>

            <div class="summary-row">
                <span>Subtotal</span>
                <span id="subtotalVal" class="summary-val">EGP 15,998.00</span>
            </div>

            <div class="summary-row">
                <span>Shipping</span>
                <span class="summary-val text-success">FREE</span>
            </div>

            <div class="summary-divider"></div>

            <div class="summary-row summary-total">
                <span>Total Price</span>
                <span id="totalVal" class="total-amount">EGP 15,998.00</span>
            </div>

            <a href="/checkout" class="btn-checkout">
                <span>Proceed To Checkout</span>
                <i class="fa-solid fa-arrow-right"></i>
            </a>

            <div class="secure-badge">
                <i class="fa-solid fa-shield-halved"></i> Secure Checkout
            </div>
        </div>
    </aside>

</div>

<!-- Empty Cart View -->
<div id="emptyCartView" class="cart-empty-panel hidden">
    <div class="empty-card">
        <div class="empty-icon">🛒</div>
        <h2>Your Cart is Empty</h2>
        <p>Looks like you haven't added any products to your cart yet.</p>
        <a href="/products" class="btn-browse">Browse Products</a>
    </div>
</div>

<!-- Recommended Products Section -->
<section class="cart-recommended-section">
    <h2 class="recommended-title">Recommended Products</h2>
    <div class="recommended-grid">
        
        <div class="recommended-card">
            <div class="recommended-thumb">
                <img src="{{ asset('images/smart-chair-front.png') }}" alt="SitFit Smart Chair">
            </div>
            <div class="recommended-details">
                <h4>SitFit Smart Chair</h4>
                <p>Ergonomic chair with active posture tracking.</p>
                <span class="recommended-price">EGP 12,499</span>
                <button type="button" class="btn-add-rec" onclick="addRecommended(0)">Add To Cart</button>
            </div>
        </div>

        <div class="recommended-card">
            <div class="recommended-thumb">
                <img src="{{ asset('images/smart-chair-side.png') }}" alt="SitFit Classic Ergonomic Cushion">
            </div>
            <div class="recommended-details">
                <h4>SitFit Classic Ergonomic Cushion</h4>
                <p>Portable memory foam posture cushion.</p>
                <span class="recommended-price">EGP 3,499</span>
                <button type="button" class="btn-add-rec" onclick="addRecommended(1)">Add To Cart</button>
            </div>
        </div>

    </div>
</section>

<!-- Trust Bar (Horizontal Row) -->
<section class="trust-bar">
    <div class="trust-pill">
        <i class="fa-solid fa-truck-fast"></i>
        <span>Free Shipping</span>
    </div>
    <div class="trust-pill">
        <i class="fa-solid fa-shield-halved"></i>
        <span>1-Year Official Warranty</span>
    </div>
    <div class="trust-pill">
        <i class="fa-solid fa-rotate-left"></i>
        <span>30-Day Easy Returns</span>
    </div>
    <div class="trust-pill">
        <i class="fa-solid fa-credit-card"></i>
        <span>Secure Payment</span>
    </div>
</section>

<!-- Cart Controller Script -->
<script>
    let cartData = [
        {
            id: 101,
            name: "SitFit Smart Chair",
            desc: "An ergonomic smart chair featuring real-time posture tracking and adjustable lumbar support.",
            price: 12499,
            qty: 1,
            image: "{{ asset('images/smart-chair-front.png') }}"
        },
        {
            id: 102,
            name: "SitFit Classic Ergonomic Cushion",
            desc: "Portable memory foam posture cushion designed to relieve lower back pain.",
            price: 3499,
            qty: 1,
            image: "{{ asset('images/smart-chair-side.png') }}"
        }
    ];

    const recData = [
        {
            id: 101,
            name: "SitFit Smart Chair",
            desc: "An ergonomic smart chair featuring real-time posture tracking.",
            price: 12499,
            image: "{{ asset('images/smart-chair-front.png') }}"
        },
        {
            id: 102,
            name: "SitFit Classic Ergonomic Cushion",
            desc: "Portable memory foam posture cushion designed to relieve lower back pain.",
            price: 3499,
            image: "{{ asset('images/smart-chair-side.png') }}"
        }
    ];

    function formatCurrency(amount) {
        return 'EGP ' + amount.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    // Dynamic Badge Updates
    function updateBadgeCount() {
        const totalQty = cartData.reduce((sum, item) => sum + item.qty, 0);

        const badge = document.getElementById('cartBadge');
        if (badge) {
            badge.innerHTML = `<i class="fa-solid fa-bag-shopping"></i> ${totalQty} Item${totalQty !== 1 ? 's' : ''} in Cart`;
        }

        const navCartLinks = document.querySelectorAll('a[href*="cart"], .nav-link-cart, header a');
        navCartLinks.forEach(link => {
            if (link.textContent.toLowerCase().includes('cart') || link.querySelector('.fa-cart-shopping')) {
                let miniBadge = link.querySelector('.cart-mini-badge');
                if (totalQty > 0) {
                    if (!miniBadge) {
                        miniBadge = document.createElement('span');
                        miniBadge.className = 'cart-mini-badge';
                        link.appendChild(miniBadge);
                    }
                    miniBadge.textContent = totalQty;
                    miniBadge.style.display = 'inline-flex';
                } else if (miniBadge) {
                    miniBadge.style.display = 'none';
                }
            }
        });
    }

    function renderCart() {
        const listEl = document.getElementById('cartItemsList');
        const activeView = document.getElementById('activeCartView');
        const emptyView = document.getElementById('emptyCartView');

        if (cartData.length === 0) {
            activeView.classList.add('hidden');
            emptyView.classList.remove('hidden');
            updateBadgeCount();
            return;
        }

        activeView.classList.remove('hidden');
        emptyView.classList.add('hidden');

        let html = '';

        cartData.forEach((item, idx) => {
            const lineTotal = item.price * item.qty;

            html += `
                <div class="cart-item-row" id="cartRow-${item.id}">
                    <div class="item-info">
                        <div class="item-img">
                            <img src="${item.image}" alt="${item.name}">
                        </div>
                        <div class="item-text">
                            <h3 class="item-title">${item.name}</h3>
                            <p class="item-desc">${item.desc}</p>
                            <span class="item-price">${formatCurrency(item.price)} each</span>
                        </div>
                    </div>

                    <div class="item-qty">
                        <div class="qty-stepper">
                            <button type="button" class="qty-btn" onclick="updateQuantity(${idx}, -1)">−</button>
                            <span class="qty-count" id="qtyVal-${item.id}">${item.qty}</span>
                            <button type="button" class="qty-btn" onclick="updateQuantity(${idx}, 1)">+</button>
                        </div>
                    </div>

                    <div class="item-total">
                        <span class="total-price" id="rowTotal-${item.id}">${formatCurrency(lineTotal)}</span>
                        <button type="button" class="btn-remove" onclick="removeRow(${idx})">
                            🗑️ Remove
                        </button>
                    </div>
                </div>
            `;
        });

        listEl.innerHTML = html;
        updateBadgeCount();
        recalculateSummary();
    }

    function updateQuantity(idx, change) {
        if (!cartData[idx]) return;

        cartData[idx].qty += change;

        if (cartData[idx].qty <= 0) {
            removeRow(idx);
            return;
        }

        const qtyEl = document.getElementById(`qtyVal-${cartData[idx].id}`);
        const totalEl = document.getElementById(`rowTotal-${cartData[idx].id}`);

        if (qtyEl) qtyEl.textContent = cartData[idx].qty;
        if (totalEl) {
            totalEl.textContent = formatCurrency(cartData[idx].price * cartData[idx].qty);
            totalEl.classList.add('price-flash');
            setTimeout(() => totalEl.classList.remove('price-flash'), 250);
        }

        updateBadgeCount();
        recalculateSummary();
    }

    function removeRow(idx) {
        const row = document.getElementById(`cartRow-${cartData[idx].id}`);
        if (row) {
            row.classList.add('fade-out');
            setTimeout(() => {
                cartData.splice(idx, 1);
                renderCart();
            }, 250);
        } else {
            cartData.splice(idx, 1);
            renderCart();
        }
    }

    function clearCart() {
        cartData = [];
        renderCart();
    }

    // Fixed Add Recommended Product Handler
    function addRecommended(recIdx) {
        const rec = recData[recIdx];
        if (!rec) return;

        const existing = cartData.find(item => item.name === rec.name || item.id === rec.id);
        if (existing) {
            existing.qty += 1;
        } else {
            cartData.push({
                id: rec.id,
                name: rec.name,
                desc: rec.desc,
                price: rec.price,
                qty: 1,
                image: rec.image
            });
        }

        renderCart();
    }

    function recalculateSummary() {
        const subtotal = cartData.reduce((sum, item) => sum + (item.price * item.qty), 0);
        const total = subtotal;

        document.getElementById('subtotalVal').textContent = formatCurrency(subtotal);
        document.getElementById('totalVal').textContent = formatCurrency(total);
    }

    document.addEventListener('DOMContentLoaded', renderCart);
</script>

@endsection