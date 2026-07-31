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
    </div>

    <!-- Products Grid -->
    @if($products->isNotEmpty())
        <div class="products-grid">
            @foreach($products as $product)
                <article class="product-card">
                    <div class="card-image-wrapper">
                        <img src="{{ asset($product->image_1) }}" alt="{{ $product->name }}" class="product-image">
                        @if ($product->is_active)
                            <span class="status-badge status-active">Active</span>
                        @else
                            <span class="status-badge status-out">Not Active</span>
                        @endif
                    </div>

                    <div class="card-body">
                        <span class="product-category">{{ $product->compatibility }}</span>
                        <h2 class="product-name">{{ $product->name }}</h2>
                        
                        <div class="product-details">
                            <div class="detail-item">
                                <span class="detail-label">Price</span>
                                <span class="detail-value price-value">{{ number_format($product->price, 2) }} EGP</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Stock</span>
                                <span class="detail-value">{{ $product->stock ?? 0 }} units</span>
                            </div>
                        </div>

                        <div class="meta-info">
                            <i class="fa-regular fa-calendar"></i>
                            <span>Added: {{ $product->created_at ? $product->created_at->format('M d, Y') : 'N/A' }}</span>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('admin.products.edit', $product) }}" class="action-btn edit-btn" title="Edit Product">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>

                        {{-- Hidden Form for Delete --}}
                        <form 
                            id="delete-product-form-{{ $product->slug }}" 
                            action="{{ route('admin.products.destroy', $product) }}" 
                            method="POST" 
                            style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>

                        {{-- Delete Button --}}
                        <button type="button" class="action-btn delete-btn" title="Delete Product" onclick="confirmDelete('{{ $product->slug }}', '{{ addslashes($product->name) }}')">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </div>
                </article>
            @endforeach
        </div>
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

{{-- SweetAlert2 CDN --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function confirmDelete(slug, productName) {
    Swal.fire({
        title: 'Delete Product?',
        text: `Are you sure you want to delete "${productName}"? This action cannot be undone!`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e63946',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, Delete It',
        cancelButtonText: 'Cancel',
        reverseButtons: true,
        background: '#ffffff',
        customClass: {
            confirmButton: 'btn btn-danger',
            cancelButton: 'btn btn-secondary'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(`delete-product-form-${slug}`).submit();
        }
    });
}
</script>

{{-- Success Notification Toast --}}
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: "{{ session('success') }}",
        timer: 3000,
        showConfirmButton: false,
        toast: true,
        position: 'top-end',
        timerProgressBar: true
    });
</script>
@endif

@endsection