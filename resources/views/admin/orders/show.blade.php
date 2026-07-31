@extends('layouts.admin')

@section('title', 'Order Details')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/orders/show.css') }}">
@endsection

@section('content')
    <div class="orders-container">
    
    <!-- Top Action Nav -->
    <div class="details-top-nav">
        <a href="{{ route('admin.orders.index') }}" class="btn-back">
            <i class="fa-solid fa-arrow-left"></i> Back to Orders
        </a>

        <!-- Status Update Form -->
        <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST" class="status-form-wrapper" id="statusForm">
            @csrf
            @method('PATCH')
            
            <div class="status-select-group">
                <select name="status" class="status-select-input" onchange="document.getElementById('statusForm').submit();">
                    @foreach(['pending', 'processing', 'shipped', 'delivered', 'cancelled'] as $statusOption)
                        <option value="{{ $statusOption }}" {{ strtolower($order->status) === $statusOption ? 'selected' : '' }}>
                            {{ ucfirst($statusOption) }}
                        </option>
                    @endforeach
                </select>
                <i class="fa-solid fa-pen-to-square select-icon"></i>
            </div>
        </form>
    </div>

    <!-- Main Header Card -->
    <div class="details-header-card">
        <div class="header-card-left">
            <div class="order-title">
                <h2>Order #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</h2>
                <span class="status-badge status-{{ strtolower($order->status) }}">
                    {{ ucfirst($order->status) }}
                </span>
            </div>
            <p class="order-subtitle">
                Placed on <strong>{{ $order->created_at->diffForHumans() }}</strong> by <strong>{{ $order->user->name }}</strong>
            </p>
        </div>
    </div>

    <!-- Details Grid -->
    <div class="details-layout-grid">
        <!-- Side Column: Customer Info & Summary -->
        <div class="details-side-column">
            <!-- Customer Section -->
            <div class="detail-card">
                <div class="card-header-title">
                    <i class="fa-solid fa-user"></i> Customer Details
                </div>
                <div class="customer-detail-body">
                    <div class="info-group">
                        <span class="info-label">Full Name</span>
                        <span class="info-value">{{ $order->user->name }}</span>
                    </div>
                    <div class="info-group">
                        <span class="info-label">Email Address</span>
                        <span class="info-value">{{ $order->user->email }}</span>
                    </div>
                    <div class="info-group">
                        <span class="info-label">Phone Number</span>
                        <span class="info-value">{{ $order->user->phone }}</span>
                    </div>
                </div>
            </div>

            <!-- Order Summary Section -->
            <div class="detail-card">
                <div class="card-header-title">
                    <i class="fa-solid fa-receipt"></i> Order Summary
                </div>
                <hr class="summary-divider">
                <div class="summary-row total-row">
                    <span>Total</span>
                    <span>{{ $order->total_price }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- SweetAlert Toast for Success --}}
@if(session('success'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Updated!',
        text: "{{ session('success') }}",
        timer: 2500,
        showConfirmButton: false,
        toast: true,
        position: 'top-end',
        timerProgressBar: true
    });
</script>
@endif

@endsection