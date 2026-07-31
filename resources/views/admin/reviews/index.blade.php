@extends('layouts.admin')

@section('title', 'Reviews')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/reviews.css') }}">
@endsection

@section('content')
   {{-- Dummy Data Array --}}
    @php
        $reviews = [
            [
                'id' => 1,
                'user' => 'John Doe',
                'product' => 'Ergonomic Office Chair',
                'stars' => 5,
                'comment' => 'Very comfortable chair with excellent lumbar support! Assembly was straightforward, and the materials feel high-end. Highly recommend for long work hours.',
                'date' => 'July 20, 2026'
            ],
            [
                'id' => 2,
                'user' => 'Sarah Jenkins',
                'product' => 'SitFit Smart Desk Lamp',
                'stars' => 4,
                'comment' => 'Great illumination options with adjustable warm/cold tones. The touch sensor can be slightly sensitive, but overall a solid purchase.',
                'date' => 'July 18, 2026'
            ],
            [
                'id' => 3,
                'user' => 'Michael Chen',
                'product' => 'Orthopedic Seat Cushion',
                'stars' => 5,
                'comment' => 'Saved my back during remote working days. Takes a day or two to get used to, but now I cannot work without it.',
                'date' => 'July 15, 2026'
            ],
            [
                'id' => 4,
                'user' => 'Emily Watson',
                'product' => 'Active Sitting Balance Stool',
                'stars' => 3,
                'comment' => 'Decent build quality, but takes some getting used to. Wish the height adjustment mechanism had a wider range.',
                'date' => 'July 10, 2026'
            ],
            [
                'id' => 5,
                'user' => 'David Miller',
                'product' => 'Ergonomic Office Chair',
                'stars' => 5,
                'comment' => 'Best chair I have owned! Prompt delivery, great packaging, and top-notch customer support.',
                'date' => 'July 05, 2026'
            ]
        ];
    @endphp

    <div class="reviews-dashboard">
        {{-- Page Header --}}
        <header class="reviews-header">
            <div class="header-content">
                <h1 class="page-title">Reviews</h1>
                <p class="page-description">Manage customer reviews and product feedback.</p>
            </div>

            {{-- Search & Filters --}}
            <div class="header-actions">
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass search-icon"></i>
                    <input type="text" class="search-input" placeholder="Search product or reviewer...">
                </div>
                <!-- <div class="filter-box">
                    <i class="fa-solid fa-filter filter-icon"></i>
                    <select class="filter-select">
                        <option value="all">All Ratings</option>
                        <option value="5">5 Stars</option>
                        <option value="4">4 Stars</option>
                        <option value="3">3 Stars</option>
                        <option value="2">2 Stars</option>
                        <option value="1">1 Star</option>
                    </select>
                </div> -->
            </div>
        </header>

        {{-- Cards Grid or Empty State --}}
        @if(count($reviews) > 0)
            <div class="reviews-grid">
                @foreach($reviews as $review)
                    <div class="review-card">
                        <div class="card-header">
                            <div class="user-info">
                                <div class="avatar-circle">
                                    {{ strtoupper(substr($review['user'], 0, 1)) }}
                                </div>
                                <div class="user-details">
                                    <h3 class="user-name">{{ $review['user'] }}</h3>
                                    <span class="product-tag">
                                        <i class="fa-solid fa-box"></i> {{ $review['product'] }}
                                    </span>
                                </div>
                            </div>
                            
                            <button type="button" class="btn-delete" title="Delete Review">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>

                        <div class="card-body">
                            <div class="rating-bar">
                                <div class="stars" aria-label="{{ $review['stars'] }} out of 5 stars">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $review['stars'])
                                            <i class="fa-solid fa-star star-filled"></i>
                                        @else
                                            <i class="fa-solid fa-star star-empty"></i>
                                        @endif
                                    @endfor
                                </div>
                                <span class="review-date">
                                    <i class="fa-regular fa-calendar"></i> {{ $review['date'] }}
                                </span>
                            </div>

                            <div class="comment-wrapper">
                                <p class="review-comment">{{ $review['comment'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <!-- <nav class="pagination-wrapper" aria-label="Reviews Pagination">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a href="#" class="page-link"><i class="fa-solid fa-chevron-left"></i> Previous</a>
                    </li>
                    <li class="page-item active">
                        <a href="#" class="page-link">1</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">2</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">3</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">Next <i class="fa-solid fa-chevron-right"></i></a>
                    </li>
                </ul>
            </nav> -->
        @else
            {{-- Empty State Component --}}
            <div class="empty-state">
                <div class="empty-icon-box">
                    <i class="fa-regular fa-comments"></i>
                </div>
                <h2 class="empty-title">No reviews found</h2>
                <p class="empty-description">There are no customer reviews yet.</p>
            </div>
        @endif
    </div>
@endsection