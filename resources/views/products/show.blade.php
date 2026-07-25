@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection

@section('title')
    {{ $product['name'] ?? 'Product Details' }} - SitFit
@endsection

@section('content')
<div class="products-page product-details-page">
    <div class="container">
        
        <div class="product-main-wrapper">
            
            <div class="product-gallery">
                <div class="main-image-box">
                    <img id="main-product-img" src="{{ asset('images/smart-chair-front.png') }}" alt="SitFit Smart Chair">
                </div>
                <div class="thumbnails-grid">
                    <img class="thumbnail active" src="{{ asset('images/smart-chair-front.png') }}" onclick="changeImage(this.src)">
                    <img class="thumbnail" src="{{ asset('images/smart-chair-side.png') }}" onclick="changeImage(this.src)">
                    <img class="thumbnail" src="{{ asset('images/smart-chair-sensor.png') }}" onclick="changeImage(this.src)">
                </div>
            </div>

            <div class="product-info-box">
                <h1 class="product-title">SitFit Smart Chair</h1>
                
                <div class="rating-box">
                    <div class="stars">⭐⭐⭐⭐⭐</div>
                    <span class="reviews-count">(128 Customer Reviews)</span>
                </div>

                <div class="price-box">
                    <span class="price">EGP 15,000</span>
                    <span class="stock-status in-stock">In Stock & Ready to Ship</span>
                </div>

                <p class="short-desc">
                    Experience the future of sitting comfort. The SitFit Smart Chair combines active lumbar correction with embedded AI sensors to optimize your posture throughout long working hours.
                </p>

                <div class="features-preview" style="margin-bottom: 25px;">
                    <span class="feature-tag">Adaptive Lumbar Support</span>
                    <span class="feature-tag">Bluetooth 5.0 Sync</span>
                    <span class="feature-tag">3D Adjustable Armrests</span>
                </div>

                <div class="quantity-selector">
                    <span>Quantity:</span>
                    <div class="quantity-controls">
                        <button class="qty-btn" onclick="decreaseQty()">-</button>
                        <input type="text" id="qty-input" value="1" readonly>
                        <button class="qty-btn" onclick="increaseQty()">+</button>
                    </div>
                </div>

                <div class="action-buttons">
                    <button class="btn-cart">Add to Cart 🛒</button>
                    <button class="btn-buy">Buy Now </button>
                </div>
            </div>
        </div>

        <div class="details-section">
            <h2 class="section-title">Product Description</h2>
            <div class="description-content">
                <p>
                    The SitFit Smart Chair is engineered specifically for individuals who spend extended periods at their desk. Built with medical-grade ergonomics in mind, it uses micro-sensors embedded in the backrest to detect improper lumbar positioning and subtle slouching.
                </p>
                <p>
                    Connect the chair to the SitFit Companion App to receive customized posture reports, set movement reminders, and adjust the firmness of the lumbar cushion automatically based on your body weight and seating position.
                </p>
            </div>
        </div>

        <div class="details-section">
            <h2 class="section-title">Technical Specifications</h2>
            <table class="specs-table">
                <tr>
                    <th>Frame Material</th>
                    <td>Reinforced Aluminum & High-Density Polymer</td>
                </tr>
                <tr>
                    <th>Upholstery</th>
                    <td>Breathable Korean Mesh & Memory Foam Base</td>
                </tr>
                <tr>
                    <th>Recline Range</th>
                    <td>90° - 135° Lockable Angle Adjustment</td>
                </tr>
                <tr>
                    <th>Smart Features</th>
                    <td>Haptic Posture Alerts, Mobile App Integration</td>
                </tr>
                <tr>
                    <th>Battery</th>
                    <td>Li-ion Rechargeable (3000 mAh) — Up to 7 Days per charge</td>
                </tr>
                <tr>
                    <th>Maximum Capacity</th>
                    <td>150 kg (330 lbs)</td>
                </tr>
            </table>
        </div>

        <div class="details-section">
            <h2 class="section-title">Key Smart Features</h2>
            <div class="features-grid">
                
                <div class="feature-item">
                    <div class="feature-number">01</div>
                    <h3>AI Posture Tracking</h3>
                    <p>Monitors your seated position 50 times per second to prevent back strain.</p>
                </div>

                <div class="feature-item">
                    <div class="feature-number">02</div>
                    <h3>Silent Vibration Alerts</h3>
                    <p>Gently reminds you to adjust your posture without disrupting your workflow.</p>
                </div>

                <div class="feature-item">
                    <div class="feature-number">03</div>
                    <h3>Companion App</h3>
                    <p>Track daily posture scores and set personalized health goals effortlessly.</p>
                </div>

                <div class="feature-item">
                    <div class="feature-number">04</div>
                    <h3>Custom Fit Adjustments</h3>
                    <p>Fully adjustable height, seat depth, headrest, and 4D armrests.</p>
                </div>

            </div>
        </div>

    </div>
</div>

<script>
function changeImage(src) {
    document.getElementById('main-product-img').src = src;
    document.querySelectorAll('.thumbnail').forEach(thumb => {
        thumb.classList.remove('active');
        if(thumb.src === src) thumb.classList.add('active');
    });
}

function increaseQty() {
    let input = document.getElementById('qty-input');
    input.value = parseInt(input.value) + 1;
}

function decreaseQty() {
    let input = document.getElementById('qty-input');
    if (parseInt(input.value) > 1) {
        input.value = parseInt(input.value) - 1;
    }
}
</script>
@endsection