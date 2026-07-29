@extends('layouts.admin')

@section('title', 'Products')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/products/index.css') }}">
@endsection

@section('content')
   @php
$products = [
    [
        'id' => 1,
        'image' => 'https://images.unsplash.com/photo-1580481072645-022f9a6d83d0?w=500&auto=format&fit=crop&q=60',
        'name' => 'Ergonomic Office Chair',
        'price' => '$299',
        'stock' => 15,
        'category' => 'Office Chairs',
        'status' => 'Active',
        'created' => 'July 20, 2026'
    ],
    [
        'id' => 2,
        'image' => 'https://images.unsplash.com/photo-1505797149-43b0069ec26b?w=500&auto=format&fit=crop&q=60',
        'name' => 'Adjustable Standing Desk',
        'price' => '$549',
        'stock' => 8,
        'category' => 'Desks',
        'status' => 'Active',
        'created' => 'July 18, 2026'
    ],
    [
        'id' => 3,
        'image' => 'https://images.unsplash.com/photo-1541558869434-2840d308329a?w=500&auto=format&fit=crop&q=60',
        'name' => 'Lumbar Support Cushion',
        'price' => '$45',
        'stock' => 0,
        'category' => 'Accessories',
        'status' => 'Out of Stock',
        'created' => 'July 15, 2026'
    ],
    [
        'id' => 4,
        'image' => 'https://images.unsplash.com/photo-1589384267710-7a255998a584?w=500&auto=format&fit=crop&q=60',
        'name' => 'Executive Leather Chair',
        'price' => '$420',
        'stock' => 5,
        'category' => 'Office Chairs',
        'status' => 'Active',
        'created' => 'July 10, 2026'
    ],
    [
        'id' => 5,
        'image' => 'https://images.unsplash.com/photo-1527864550417-7fd91fc51a46?w=500&auto=format&fit=crop&q=60',
        'name' => 'Ergonomic Vertical Mouse',
        'price' => '$65',
        'stock' => 22,
        'category' => 'Accessories',
        'status' => 'Active',
        'created' => 'July 05, 2026'
    ],
    [
        'id' => 6,
        'image' => 'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=500&auto=format&fit=crop&q=60',
        'name' => 'Anti-Fatigue Standing Mat',
        'price' => '$79',
        'stock' => 3,
        'category' => 'Accessories',
        'status' => 'Low Stock',
        'created' => 'June 28, 2026'
    ]
];
@endphp

<div class="admin-products-container">
    <!-- Page Header -->
    <header class="page-header">
        <div class="header-info">
            <h1 class="page-title">Products</h1>
            <p class="page-description">Manage your products and inventory.</p>
        </div>
        <div class="header-actions">
            <button class="btn btn-primary">
                <i class="fa-solid fa-plus"></i>
                <span>Add Product</span>
            </button>
        </div>
    </header>

    <!-- Toolbar: Search & Filter -->
    <div class="products-toolbar">
        <div class="search-box">
            <i class="fa-solid fa-magnifying-glass search-icon"></i>
            <input type="text" placeholder="Search products..." class="search-input">
        </div>
        <div class="filter-box">
            <i class="fa-solid fa-filter filter-icon"></i>
            <select class="filter-select">
                <option value="">All Categories</option>
                <option value="chairs">Office Chairs</option>
                <option value="desks">Desks</option>
                <option value="accessories">Accessories</option>
            </select>
        </div>
    </div>

    <!-- Products Grid -->
    @if(count($products) > 0)
        <div class="products-grid">
            @foreach($products as $product)
                <article class="product-card">
                    <div class="card-image-wrapper">
                        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="product-image">
                        @php
                            $statusClass = match($product['status']) {
                                'Active' => 'status-active',
                                'Out of Stock' => 'status-out',
                                default => 'status-warning'
                            };
                        @endphp
                        <span class="status-badge {{ $statusClass }}">
                            {{ $product['status'] }}
                        </span>
                    </div>

                    <div class="card-body">
                        <span class="product-category">{{ $product['category'] }}</span>
                        <h2 class="product-name">{{ $product['name'] }}</h2>
                        
                        <div class="product-details">
                            <div class="detail-item">
                                <span class="detail-label">Price</span>
                                <span class="detail-value price-value">{{ $product['price'] }}</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Stock</span>
                                <span class="detail-value">{{ $product['stock'] }} units</span>
                            </div>
                        </div>

                        <div class="meta-info">
                            <i class="fa-regular fa-calendar"></i>
                            <span>Added: {{ $product['created'] }}</span>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button class="action-btn view-btn" title="View Details">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                        <button class="action-btn edit-btn" title="Edit Product">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <button class="action-btn delete-btn" title="Delete Product">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </div>
                </article>
            @endforeach
        </div>

        <!-- Pagination -->
        <nav class="pagination-wrapper" aria-label="Products Pagination">
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
        </nav>
    @else
        <!-- Empty State -->
        <div class="empty-state">
            <div class="empty-icon-box">
                <i class="fa-solid fa-box-open"></i>
            </div>
            <h3 class="empty-title">No products found</h3>
            <p class="empty-description">There are no products available yet.</p>
        </div>
    @endif
</div>
@endsection