@extends('layouts.admin')

@section('title', 'Edit Product')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/products/edit.css') }}">
@endsection

@section('content')
<div class="product-page-container">

    {{-- Page Header --}}
    <div class="page-header">
        <div class="header-content">
            <h1 class="page-title">Edit Product</h1>
            <p class="page-subtitle">Update product information and save your changes.</p>
        </div>
        <a href="{{ url('/admin/products') }}" class="btn btn-outline">
            <i class="fas fa-arrow-left"></i> Back to Products
        </a>
    </div>

    {{-- Main Form Card --}}
    <div class="card form-card">
        <form action="#" method="POST" enctype="multipart/form-data" class="product-form" onsubmit="event.preventDefault();">
            @csrf
            @method('PUT')

            {{-- Basic Product Details --}}
            <div class="form-section">
                <h2 class="section-title">General Information</h2>
                
                {{-- Product Name --}}
                <div class="form-group">
                    <label for="product_name" class="form-label">Product Name <span class="required">*</span></label>
                    <input 
                        type="text" 
                        id="product_name" 
                        name="product_name" 
                        class="form-control" 
                        value="SitFit Ergonomic Pro Chair" 
                        placeholder="e.g. Executive Mesh Chair" 
                        required
                    >
                </div>

                {{-- Description --}}
                <div class="form-group">
                    <label for="description" class="form-label">Description <span class="required">*</span></label>
                    <textarea 
                        id="description" 
                        name="description" 
                        class="form-control" 
                        rows="5" 
                        placeholder="Provide a detailed description of the chair features..." 
                        required
                    >The SitFit Ergonomic Pro Chair offers premium lumbar support, breathable mesh material, and 4D adjustable armrests designed for 8+ hours of comfortable seating.</textarea>
                </div>

                {{-- Price & Stock Row --}}
                <div class="form-row">
                    <div class="form-group col">
                        <label for="price" class="form-label">Price ($) <span class="required">*</span></label>
                        <input 
                            type="number" 
                            id="price" 
                            name="price" 
                            class="form-control" 
                            step="0.01" 
                            value="499.99" 
                            placeholder="0.00" 
                            required
                        >
                    </div>

                    <div class="form-group col">
                        <label for="stock_quantity" class="form-label">Stock Quantity <span class="required">*</span></label>
                        <input 
                            type="number" 
                            id="stock_quantity" 
                            name="stock_quantity" 
                            class="form-control" 
                            value="45" 
                            placeholder="0" 
                            required
                        >
                    </div>
                </div>

                {{-- Category & Status Row --}}
                <div class="form-row">
                    <div class="form-group col">
                        <label for="category" class="form-label">Category <span class="required">*</span></label>
                        <select id="category" name="category" class="form-control select-control" required>
                            <option value="">Select Category</option>
                            <option value="ergonomic-chairs" selected>Ergonomic Chairs</option>
                            <option value="executive-chairs">Executive Chairs</option>
                            <option value="mesh-chairs">Mesh Chairs</option>
                            <option value="drafting-chairs">Drafting Chairs</option>
                            <option value="active-sitting">Active Sitting</option>
                        </select>
                    </div>

                    <div class="form-group col">
                        <label for="status" class="form-label">Status <span class="required">*</span></label>
                        <select id="status" name="status" class="form-control select-control" required>
                            <option value="active" selected>Active</option>
                            <option value="draft">Draft</option>
                            <option value="out_of_stock">Out of Stock</option>
                            <option value="archived">Archived</option>
                        </select>
                    </div>
                </div>
            </div>

            <hr class="form-divider">

            {{-- Existing Images Section --}}
            <div class="form-section">
                <div class="section-header">
                    <h2 class="section-title">Existing Product Images</h2>
                    <span class="badge-count">3 Images Uploaded</span>
                </div>
                
                <div class="image-grid">
                    {{-- Image 1 --}}
                    <div class="image-card">
                        <div class="image-wrapper">
                            <img src="https://images.unsplash.com/photo-1580481072645-022f9a6d1270?auto=format&fit=crop&w=400&q=80" alt="Front View">
                            <span class="badge-primary-image">Main Cover</span>
                        </div>
                        <div class="image-details">
                            <span class="image-name" title="sitfit-pro-front.jpg">sitfit-pro-front.jpg</span>
                            <button type="button" class="btn-remove-image" aria-label="Remove image">
                                <i class="fas fa-trash-alt"></i> Remove
                            </button>
                        </div>
                    </div>

                    {{-- Image 2 --}}
                    <div class="image-card">
                        <div class="image-wrapper">
                            <img src="https://images.unsplash.com/photo-1505797149-43b0069ec26b?auto=format&fit=crop&w=400&q=80" alt="Side View">
                        </div>
                        <div class="image-details">
                            <span class="image-name" title="sitfit-pro-side.jpg">sitfit-pro-side.jpg</span>
                            <button type="button" class="btn-remove-image" aria-label="Remove image">
                                <i class="fas fa-trash-alt"></i> Remove
                            </button>
                        </div>
                    </div>

                    {{-- Image 3 --}}
                    <div class="image-card">
                        <div class="image-wrapper">
                            <img src="https://images.unsplash.com/photo-1688578735427-991f86d63428?auto=format&fit=crop&w=400&q=80" alt="Back View">
                        </div>
                        <div class="image-details">
                            <span class="image-name" title="sitfit-pro-lumbar.jpg">sitfit-pro-lumbar.jpg</span>
                            <button type="button" class="btn-remove-image" aria-label="Remove image">
                                <i class="fas fa-trash-alt"></i> Remove
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="form-divider">

            {{-- Upload New Images Section --}}
            <div class="form-section">
                <h2 class="section-title">Upload New Images</h2>
                <div class="upload-area" id="uploadArea">
                    <input type="file" id="new_images" name="images[]" multiple accept="image/png, image/jpeg, image/webp" class="file-input">
                    <div class="upload-content">
                        <div class="upload-icon">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <p class="upload-text"><strong>Click to upload</strong> or drag and drop new files here</p>
                        <p class="upload-hint">Supported Formats: JPEG, PNG, WEBP (Max size: 5MB per file)</p>
                    </div>
                </div>
            </div>

            {{-- Form Actions Footer --}}
            <div class="form-actions">
                <div class="left-actions">
                    <a href="{{ url('/admin/products') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Products
                    </a>
                </div>
                <div class="right-actions">
                    <a href="{{ url('/admin/products') }}" class="btn btn-outline">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
                </div>
            </div>

        </form>
    </div>

</div>
    
@endsection