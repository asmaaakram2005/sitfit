@extends('layouts.admin')

@section('title', 'Add Product')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/products/create.css') }}">
@endsection

@section('content')
    
<div class="product-create-container">
    <!-- Page Header -->
    <header class="page-header">
    <div>
        <h1 class="page-title">Add Product</h1>
        <p class="page-subtitle">
            Create and add a new product to the SitFit store.
        </p>
    </div>
</header>

    <!-- Product Form -->
    <form class="product-form" action="#" method="POST" enctype="multipart/form-data" onsubmit="event.preventDefault();">
        @csrf

        <!-- Product Name -->
        <div class="form-group">
            <label for="product_name" class="form-label">Product Name</label>
            <input 
                type="text" 
                id="product_name" 
                name="product_name" 
                class="form-input" 
                placeholder="e.g. Ergonomic Executive Chair" 
                required
            >
        </div>

        <!-- Description -->
        <div class="form-group">
            <label for="description" class="form-label">Description</label>
            <textarea 
                id="description" 
                name="description" 
                class="form-textarea" 
                rows="4" 
                placeholder="Write a clear overview of the product features, lumbar support, materials, etc."
            ></textarea>
        </div>

        <!-- Price & Stock Quantity (2-Column Grid) -->
        <div class="form-row">
            <div class="form-group">
                <label for="price" class="form-label">Price ($)</label>
                <input 
                    type="number" 
                    id="price" 
                    name="price" 
                    class="form-input" 
                    step="0.01" 
                    placeholder="299.99" 
                    required
                >
            </div>

            <div class="form-group">
                <label for="stock" class="form-label">Stock Quantity</label>
                <input 
                    type="number" 
                    id="stock" 
                    name="stock" 
                    class="form-input" 
                    placeholder="50" 
                    required
                >
            </div>
        </div>

        <!-- Category & Status (2-Column Grid) -->
        <div class="form-row">
            <div class="form-group">
                <label for="category" class="form-label">Category</label>
                <select id="category" name="category" class="form-select" required>
                    <option value="" disabled selected>Select a category</option>
                    <option value="ergonomic-chairs">Ergonomic Chairs</option>
                    <option value="gaming-chairs">Gaming Chairs</option>
                    <option value="executive-chairs">Executive Chairs</option>
                    <option value="standing-desks">Standing Desks</option>
                </select>
            </div>

            <div class="form-group">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="status" class="form-select" required>
                    <option value="active" selected>Active</option>
                    <option value="draft">Draft</option>
                    <option value="out-of-stock">Out of Stock</option>
                </select>
            </div>
        </div>

        <!-- Image Upload Section -->
        <div class="form-group">
            <label class="form-label">Product Images</label>
            <div class="upload-area">
                <input type="file" id="product_images" name="images[]" class="upload-input" multiple accept="image/jpeg,image/png">
                <div class="upload-content">
                    <svg class="upload-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                    </svg>
                    <span class="upload-title">Upload Images</span>
                    <span class="upload-subtitle">Drag &amp; Drop files here or click to browse</span>
                    <span class="upload-hint">Supported Formats: JPG, PNG (Max 5MB)</span>
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="form-actions">
            <div class="action-buttons-primary">
                <button type="submit" class="btn btn-primary">Save Product</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
            <a href="#" class="btn btn-outline">Back</a>
        </div>
    </form>
</div>
@endsection