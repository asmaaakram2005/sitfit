@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection

@section('title', 'Products')
    


@section('content')

<div class="products-page">
    <header class="page-header">
        <h1 class="header-title">Our Products</h1>
        <p class="header-subtitle">Discover SitFit products designed to improve your posture and comfort.</p>
    </header>

    <div class="container">
        <section class="products-grid">

            @foreach($products as $product)
    
                <div class="product-card">
                        @if ($product->stock > 0)
                            <span class="stock-badge in-stock">In Stock</span>
                        @else
                            <span class="stock-badge out-stock">Out of Stock</span>
                        @endif
                    

                    <div class="card-media">
                        <img class="img-main" src="{{ $product->image_1 }}" alt="{{ $product->name }}">
                    </div>

                    <div class="card-details">
                        <h2 class="product-name">{{ $product->name }}</h2>
                        
                        <p class="product-description">
                            {{ $product->description }}
                        </p>

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

                        <div class="price-section">
                            <span class="price">{{$product->price}} EGP</span>
                        </div>

                        <div class="features-preview">
                            <span class="feature-tag">Posture Correction</span>
                            <span class="feature-tag">Smart Sensors</span>
                            <span class="feature-tag">App Integration</span>
                        </div>

                        <div class="specs-preview">
                            <div class="spec-item"><strong>Material:</strong> {{$product->material}}</div>
                            <div class="spec-item"><strong>Weight Cap:</strong> {{$product->weight_capacity}}</div>
                            <div class="spec-item"><strong>compatibility</strong> {{$product->compatibility}}</div>
                            <div class="spec-item"><strong>Warranty:</strong> {{$product->warranty}}</div>
                        </div>

                        <div class="card-actions">
                            <a href="{{ route('products.show', $product->slug) }}" class="btn btn-primary">View Full Details</a>
                                <form action="{{ route('checkout.quick', $product) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn btn-outline">
                                        Quick Order
                                    </button>
                                </form>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- <div class="product-card">
                <span class="stock-badge in-stock">In Stock</span>

                <div class="card-media">
                    <img class="img-main" src="{{ asset('images/classic-chair-front.png') }}" alt="SitFit Classic Cushion">
                </div>

                <div class="card-details">
                    <h2 class="product-name">SitFit Classic Ergonomic Cushion</h2>
                    
                    <p class="product-description">
                        Portable memory foam posture cushion designed to relieve lower back pain and maintain healthy spine alignment on any standard office chair.
                    </p>

                    <div class="rating-box">
                        <div class="stars">⭐⭐⭐⭐☆</div>
                        <span class="reviews-count">(85 Customer Reviews)</span>
                    </div>

                    <div class="price-section">
                        <span class="price">EGP 3,499</span>
                    </div>

                    <div class="features-preview">
                        <span class="feature-tag">High-Density Memory Foam</span>
                        <span class="feature-tag">Portable Design</span>
                        <span class="feature-tag">Washable Cover</span>
                    </div>

                    <div class="specs-preview">
                        <div class="spec-item"><strong>Material:</strong> Cooling Gel Memory Foam</div>
                        <div class="spec-item"><strong>Weight:</strong> 1.2 kg</div>
                        <div class="spec-item"><strong>Universal Fit:</strong> Fits All Chairs</div>
                        <div class="spec-item"><strong>Warranty:</strong> 1 Year Guarantee</div>
                    </div>

                    <div class="card-actions">
                        <a href="{{ route('products.show', 2) }}" class="btn btn-primary">View Full Details</a>
                        <a href="#" class="btn btn-outline">Quick Order</a>
                    </div>
                </div>
            </div> -->

        </section>

        <section class="why-choose-us">
            <h2 class="section-title">Why Choose SitFit Ergonomic Line?</h2>
            
            <div class="why-grid">
                <div class="why-card">
                    <h3>Doctor Recommended</h3>
                    <p>Designed alongside orthopedic surgeons to reduce spinal pressure and neck fatigue.</p>
                </div>

                <div class="why-card">
                    <h3>Smart Feedback</h3>
                    <p>Real-time vibration alerts when slumping to build healthier lifelong posture habits.</p>
                </div>

                <div class="why-card">
                    <h3>Premium Craftsmanship</h3>
                    <p>Built with aerospace-grade alloys and high-durability breathable mesh fabric.</p>
                </div>

                <div class="why-card">
                    <h3>Free Express Shipping</h3>
                    <p>Enjoy free nationwide shipping and a 30-day risk-free trial on all products.</p>
                </div>
            </div>
        </section>

        <section class="cta-section">
            <h2>Not Sure Which Product Is Right For You?</h2>
            <p>Our ergonomics experts are available 24/7 to help you choose the perfect fit for your workspace setup.</p>
            <div class="cta-buttons">
                <a href="#" class="btn btn-primary">Contact Support</a>
                <a href="#" class="btn btn-outline">Take Ergonomic Quiz</a>
            </div>
        </section>

    </div>
</div>
@endsection