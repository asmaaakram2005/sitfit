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
        <a href="{{ route('admin.products.index') }}" class="btn btn-outline">
            <i class="fas fa-arrow-left"></i> Back to Products
        </a>
    </div>

    {{-- Main Form Card --}}
    <div class="card form-card">
        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="product-form">
            @csrf
            @method('PUT')

            {{-- Basic Product Details --}}
            <div class="form-section">
                <h2 class="section-title">General Information</h2>
                
                {{-- Product Name --}}
                <div class="form-group">
                    <label for="name" class="form-label">Product Name <span class="required">*</span></label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        class="form-control @error('name') is-invalid @enderror" 
                        value="{{ old('name', $product->name) }}" 
                        placeholder="e.g. SitFit Chair" 
                        required
                    >
                    @error('name')
                        <span style="color: red; font-size: 13px; margin-top: 4px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Description --}}
                <div class="form-group">
                    <label for="description" class="form-label">Description</label>
                    <textarea 
                        id="description" 
                        name="description" 
                        class="form-control @error('description') is-invalid @enderror" 
                        rows="5" 
                        placeholder="Provide a detailed description of the product..."
                    >{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <span style="color: red; font-size: 13px; margin-top: 4px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Price & Status Row --}}
                <div class="form-row">
                    <div class="form-group col">
                        <label for="price" class="form-label">Price  <span class="required">*</span></label>
                        <input 
                            type="number" 
                            id="price" 
                            name="price" 
                            class="form-control @error('price') is-invalid @enderror" 
                            step="0.01" 
                            value="{{ old('price', $product->price) }}" 
                            placeholder="0.00" 
                            required
                        >
                        @error('price')
                            <span style="color: red; font-size: 13px; margin-top: 4px; display: block;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col">
                        <label for="is_active" class="form-label">Status <span class="required">*</span></label>
                        <select id="is_active" name="is_active" class="form-control select-control @error('is_active') is-invalid @enderror" required>
                            <option value="1" {{ old('is_active', $product->is_active) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('is_active', $product->is_active) == 0 ? 'selected' : '' }}>Not Active</option>
                        </select>
                        @error('is_active')
                            <span style="color: red; font-size: 13px; margin-top: 4px; display: block;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <hr class="form-divider">

            {{-- Existing & New Image Section --}}
            <div class="form-section">
                <h2 class="section-title">Product Image</h2>

                {{-- Preview Existing Cover Image --}}
                @if($product->image_1)
                    <div class="form-group">
                        <label class="form-label">Current Main Image</label>
                        <div class="image-grid" style="max-width: 200px;">
                            <div class="image-card">
                                <div class="image-wrapper">
                                    <img src="{{ asset($product->image_1) }}" alt="{{ $product->name }}">
                                    <span class="badge-primary-image">Main Cover</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Upload New Image Input --}}
                <div class="form-group" style="margin-top: 15px;">
                    <label for="image_1" class="form-label">
                        {{ $product->image_1 ? 'Change Cover Image' : 'Upload Cover Image' }}
                    </label>
                    <input 
                        type="file" 
                        id="image_1" 
                        name="image_1" 
                        class="form-control @error('image_1') is-invalid @enderror"
                        accept="image/jpeg,image/png,image/webp,image/jpg"
                    >
                    <small style="color: #6c757d; display: block; margin-top: 4px;">
                        Leave empty if you don't want to change the existing image. Max size: 4MB (JPG, PNG, WEBP).
                    </small>
                    @error('image_1')
                        <span style="color: red; font-size: 13px; margin-top: 4px; display: block;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <hr class="form-divider">

            {{-- Form Actions Footer --}}
            <div class="form-actions">
                <div class="left-actions">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Products
                    </a>
                </div>
                <div class="right-actions">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-outline">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
                </div>
            </div>

        </form>
    </div>

</div>
@endsection