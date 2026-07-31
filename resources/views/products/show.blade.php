@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection

@section('title')
    {{ $product->name }} - SitFit
@endsection

@section('content')
<div class="products-page product-details-page">
    <div class="container">
        
        <div class="product-main-wrapper">
            
            <div class="product-gallery">
                <div class="main-image-box">
                    <img id="main-product-img" src="{{ asset($product->image_1) }}" alt="SitFit Smart Chair">
                </div>
                <div class="thumbnails-grid">
                    <img class="thumbnail active" src="{{ asset($product->image_1) }}" onclick="changeImage(this.src)">
                    <img class="thumbnail" src="{{ asset($product->image_2) }}" onclick="changeImage(this.src)">
                    <img class="thumbnail" src="{{ asset($product->image_3) }}" onclick="changeImage(this.src)">
                </div>
            </div>

            <div class="product-info-box">
                <h1 class="product-title">{{$product->name}}</h1>
                
                <div class="rating-box">
                    @php
                        // تقريب متوسط التقييم لأقرب رقم صحصح لحساب النجوم، ونضع 0 لو مفيش تقييمات
                        $avgRating = round($product->reviews_avg_rating ?? 0);
                        $ratingValue = number_format($product->reviews_avg_rating ?? 0, 1);
                    @endphp

                    <div class="stars">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $avgRating)
                                <i class="fa-solid fa-star" style="color: #FFB800;"></i>
                            @else
                                <i class="fa-regular fa-star" style="color: #cbd5e1;"></i>
                            @endif
                        @endfor
                    </div>

                    <span class="reviews-count">
                        <strong>{{ $ratingValue }}</strong> 
                        ({{ $product->reviews_count }} {{ $product->reviews_count == 1 ? 'Customer Review' : 'Customer Reviews' }})
                    </span>
                </div>

                <div class="price-box">
                    <span class="price">{{ $product->price }} EGP</span>
                    @if ($product->is_active)
                        <span class="stock-status in-stock">In Stock & Ready to Ship</span>
                    @else
                        <span class="stock-status out-stock">Out of stock</span>
                    @endif
                    
                </div>

                <p class="short-desc">
                    {{ $product->description }}
                </p>

                <div class="features-preview" style="margin-bottom: 25px;">
                    <span class="feature-tag">{{ $product->feature_1 }}</span>
                    <span class="feature-tag">{{ $product->feature_2 }}</span>
                    <span class="feature-tag">{{ $product->feature_3 }}</span>
                </div>

                <!-- <div class="quantity-selector">
                    <span>Quantity:</span>
                    <div class="quantity-controls">
                        <button class="qty-btn" onclick="decreaseQty()">-</button>
                        <input type="text" id="qty-input" value="1" name="quantity" readonly>
                        <button class="qty-btn" onclick="increaseQty()">+</button>
                    </div>
                </div> -->

                <div class="action-buttons">
                    <form action="{{ route('cart.store',$product->slug) }}" method="post">
                        @csrf
                        <input type="hidden" name="quantity" id="hidden-quantity" value="1">
                            
                        <button type="submit" class="btn-cart">Add to Cart 🛒</button>
                    </form>
                    <form action="{{ route('checkout.quick', $product) }}" method="POST">
                        @csrf
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="btn btn-outline">
                            Buy Now
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="details-section">
            <h2 class="section-title">Product Description</h2>
            <div class="description-content">
                <p>
                    {{ $product->long_description }}
                </p>
            </div>
        </div>

        <div class="details-section">
            <h2 class="section-title">Technical Specifications</h2>
            <table class="specs-table">
                <tr>
                    <th>compatibility</th>
                    <td>{{ $product->compatibility }}</td>
                </tr>
                <tr>
                    <th>frame_material</th>
                    <td>{{$product->frame_material}}</td>
                </tr>
                <tr>
                    <th>upholstery</th>
                    <td>{{$product->upholstery}}</td>
                </tr>
                <tr>
                    <th>Srecline_range</th>
                    <td>{{$product->recline_range}}</td>
                </tr>
            </table>
        </div>

        <div class="details-section">
            <h2 class="section-title">Key Smart Features</h2>
            <div class="features-grid">
                
                <div class="feature-item">
                    <div class="feature-number">01</div>
                    <h3>AI Posture Tracking</h3>
                    <p>{{ $product->AI_Posture_Tracking }}</p>
                </div>

                <div class="feature-item">
                    <div class="feature-number">02</div>
                    <h3>Silent Vibration Alerts</h3>
                    <p>{{ $product->Silent_Vibration_Alerts }}</p>
                </div>

                <div class="feature-item">
                    <div class="feature-number">03</div>
                    <h3>Companion App</h3>
                    <p>{{$product->Companion_App}}</p>
                </div>

                <div class="feature-item">
                    <div class="feature-number">04</div>
                    <h3>Custom Fit Adjustments</h3>
                    <p>{{$product->Universal_Ergonomic_Fit_Features}}</p>
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