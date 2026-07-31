@extends('layouts.admin')

@section('title', 'Products')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/products/index.css') }}">
@endsection

@section('content')


<div class="admin-products-container">
    <!-- Page Header -->
    <header class="page-header">
        <div class="header-info">
            <h1 class="page-title">Products</h1>
            <p class="page-description">Manage your products and inventory.</p>
        </div>
        <div class="header-actions">
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus"></i>
                <span>Add Product</span>
            </a>
        </div>
    </header>

    <!-- Toolbar: Search & Filter -->
    <div class="products-toolbar">
        <div class="search-box">
            <i class="fa-solid fa-magnifying-glass search-icon"></i>
            <input type="text" placeholder="Search products..." class="search-input">
        </div>
        <!-- <div class="filter-box">
            <i class="fa-solid fa-filter filter-icon"></i>
            <select class="filter-select">
                <option value="">All Categories</option>
                <option value="chairs">Office Chairs</option>
                <option value="desks">Desks</option>
                <option value="accessories">Accessories</option>
            </select>
        </div>
    </div> -->

    <!-- Products Grid -->
    @if($products->isNotEmpty())
        <div class="products-grid">
            @foreach($products as $product)
                <article class="product-card">
                    <div class="card-image-wrapper">
                        <img src="{{ asset($product->image_1) }}" alt="{{ $product->name }}" class="product-image">
                       @if ($product->is_active)
                            <span class="status-badge status-active">
                            Active
                            </span>
                       @else
                            <span class="status-badge status-out">
                            Not Active
                            </span>
                        @endif
                        



                    </div>

                    <div class="card-body">
                        <span class="product-category">{{ $product->compatibility }}</span>
                        <h2 class="product-name">{{ $product->name }}</h2>
                        
                        <div class="product-details">
                            <div class="detail-item">
                                <span class="detail-label">Price</span>
                                <span class="detail-value price-value">{{ $product->price }}</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Stock</span>
                                <span class="detail-value">{{ $product->stock }} units</span>
                            </div>
                        </div>

                        <div class="meta-info">
                            <i class="fa-regular fa-calendar"></i>
                            <span>Added: {{ $product->created_at->calendar() }}</span>
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
        <!-- <nav class="pagination-wrapper" aria-label="Products Pagination">
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