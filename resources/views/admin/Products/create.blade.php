@extends('layouts.admin')

@section('title', 'Add Product')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/products/create.css') }}">
@endsection

@section('content')
<div class="product-page-container">

    {{-- Page Header --}}
    <div class="page-header">
        <div class="header-content">
            <h1 class="page-title">Add New Product</h1>
            <p class="page-subtitle">Create and add a new product to the SitFit store layout.</p>
        </div>
        <a href="{{ route('admin.products.index') }}" class="btn btn-outline">
            <i class="fas fa-arrow-left"></i> Back to Products
        </a>
    </div>

    {{-- Main Form Card --}}
    <div class="card form-card">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="product-form">
            @csrf

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
                        value="{{ old('name') }}" 
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
                    >{{ old('description') }}</textarea>
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
                            value="{{ old('price') }}" 
                            placeholder="299.99" 
                            required
                        >
                        @error('price')
                            <span style="color: red; font-size: 13px; margin-top: 4px; display: block;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col">
                        <label for="is_active" class="form-label">Status <span class="required">*</span></label>
                        <select id="is_active" name="is_active" class="form-control select-control @error('is_active') is-invalid @enderror" required>
                            <option value="1" {{ old('is_active', '1') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Not Active</option>
                        </select>
                        @error('is_active')
                            <span style="color: red; font-size: 13px; margin-top: 4px; display: block;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <hr class="form-divider">

            {{-- Image Upload Section --}}
            <div class="form-section">
                <h2 class="section-title">Product Image</h2>

                <div class="form-group">
                    <label for="image_1" class="form-label">Cover Image</label>
                    <input 
                        type="file" 
                        id="image_1" 
                        name="image_1" 
                        class="form-control @error('image_1') is-invalid @enderror"
                        accept="image/jpeg,image/png,image/webp,image/jpg"
                    >
                    <small style="color: #6c757d; display: block; margin-top: 4px;">
                        Upload cover image. Max size: 4MB (JPG, PNG, WEBP).
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
                        <i class="fas fa-save"></i> Save Product
                    </button>
                </div>
            </div>

        </form>
    </div>

</div>

{{-- SweetAlert2 CDN --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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