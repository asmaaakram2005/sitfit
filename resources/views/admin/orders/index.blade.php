@extends('layouts.admin')

@section('title', 'Orders')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/orders/index.css') }}">
@endsection

@section('content')
    <div class="orders-container">
    @php
    $orders = [
        [
            'id' => 1001,
            'customer' => 'John Doe',
            'email' => 'john@example.com',
            'date' => 'July 20, 2026',
            'total' => '$499',
            'items' => 3,
            'status' => 'Pending'
        ],
        [
            'id' => 1002,
            'customer' => 'Sarah Smith',
            'email' => 'sarah.smith@example.com',
            'date' => 'July 21, 2026',
            'total' => '$850',
            'items' => 2,
            'status' => 'Processing'
        ],
        [
            'id' => 1003,
            'customer' => 'Michael Brown',
            'email' => 'm.brown@example.com',
            'date' => 'July 22, 2026',
            'total' => '$1,200',
            'items' => 5,
            'status' => 'Completed'
        ],
        [
            'id' => 1004,
            'customer' => 'Emily Davis',
            'email' => 'emily.d@example.com',
            'date' => 'July 23, 2026',
            'total' => '$150',
            'items' => 1,
            'status' => 'Cancelled'
        ]
    ];
    @endphp

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
                <span class="order-id">#{{ $order['id'] }}</span>
                <span class="status-badge status-{{ strtolower($order['status']) }}">
                    {{ $order['status'] }}
                </span>
            </div>

            <div class="order-card-body">
                <div class="customer-info">
                    <div class="avatar-placeholder">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div>
                        <h3 class="customer-name">{{ $order['customer'] }}</h3>
                        <p class="customer-email">{{ $order['email'] }}</p>
                    </div>
                </div>

                <div class="order-details-meta">
                    <div class="meta-item">
                        <span class="meta-label">Date</span>
                        <span class="meta-value"><i class="fa-regular fa-calendar"></i> {{ $order['date'] }}</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Items</span>
                        <span class="meta-value"><i class="fa-solid fa-box"></i> {{ $order['items'] }} {{ $order['items'] > 1 ? 'Products' : 'Product' }}</span>
                    </div>
                </div>
            </div>

            <div class="order-card-footer">
                <div class="total-container">
                    <span class="total-label">Total Amount</span>
                    <span class="total-amount">{{ $order['total'] }}</span>
                </div>
                <a href="{{ url('admin/orders/show') }}" class="btn-view-details">
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