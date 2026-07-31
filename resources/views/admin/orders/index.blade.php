@extends('layouts.admin')

@section('title', 'Orders')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/orders/index.css') }}">
@endsection

@section('content')
    <div class="orders-container">

    <!-- Header Section -->
    <div class="orders-header">
        <div class="header-title">
            <h1>Orders</h1>
            <p>Manage customer orders and track their status.</p>
        </div>
        <div class="header-controls">
            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass search-icon"></i>
                <input type="text" placeholder="Search by Order ID or Customer..." class="search-input">
            </div>
            <!-- <div class="filter-box">
                <i class="fa-solid fa-filter filter-icon"></i>
                <select class="filter-select">
                    <option value="">All Statuses</option>
                    <option value="Pending">Pending</option>
                    <option value="Processing">Processing</option>
                    <option value="Completed">Completed</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div> -->
        </div>
    </div>

    <!-- Order Cards Grid -->
    <div class="orders-grid">
        @foreach($orders as $order)
        <div class="order-card">
            <div class="order-card-header">
                <span class="order-id">#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</span>
                <span class="status-badge status-{{ strtolower($order->status) }}">
                    {{ $order->status }}
                </span>
            </div>

            <div class="order-card-body">
                <div class="customer-info">
                    <div class="avatar-placeholder">
                        
                    </div>
                    <div>
                        <h3 class="customer-name">{{ $order->user->name }}</h3>
                        <p class="customer-email">{{ $order->user->email }}</p>
                    </div>
                </div>

                <div class="order-details-meta">
                    <div class="meta-item">
                        <span class="meta-label">Date</span>
                        <span class="meta-value"><i class="fa-regular fa-calendar"></i> {{ $order->created_at->diffForHumans() }}</span>
                    </div>
                    <!-- <div class="meta-item">
                        <span class="meta-label">Items</span>
                        <span class="meta-value"><i class="fa-solid fa-box"></i> {{ $order->items }} {{ $order->items > 1 ? 'Products' : 'Product' }}</span>
                    </div> -->
                </div>
            </div>

            <div class="order-card-footer">
                <div class="total-container">
                    <span class="total-label">Total Amount</span>
                    <span class="total-amount">{{ $order->total_price }}</span>
                </div>
                <a href="{{ route('admin.orders.show',$order) }}" class="btn-view-details">
                    <i class="fa-solid fa-eye"></i> View Details
                </a>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <!-- <div class="pagination-wrapper">
        <ul class="pagination">
            <li class="page-item disabled">
                <a class="page-link" href="#"><i class="fa-solid fa-chevron-left"></i> Previous</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next <i class="fa-solid fa-chevron-right"></i></a>
            </li>
        </ul>
    </div> -->
</div>
@endsection