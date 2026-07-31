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

    <!-- Orders Table Container -->
    <div class="table-responsive">
        <table class="orders-table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Status</th>
                    <th>Date</th>
                    <!-- <th>Items</th> -->
                    <th>Total Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <!-- Order ID -->
                        <td>
                            <span class="order-id">#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</span>
                        </td>

                        <!-- Customer Info -->
                        <td>
                            <div class="customer-info">
                                <img
                                    src="{{ asset($order->user->image ?? 'images/default-avatar.png') }}"
                                    alt="{{ $order->user->name }}"
                                    class="customer-avatar">
                                <div>
                                    <h3 class="customer-name">{{ $order->user->name }}</h3>
                                    <p class="customer-email">{{ $order->user->email }}</p>
                                </div>
                            </div>
                        </td>

                        <!-- Status Badge -->
                        <td>
                            <span class="status-badge status-{{ strtolower($order->status) }}">
                                {{ $order->status }}
                            </span>
                        </td>

                        <!-- Date -->
                        <td>
                            <span class="meta-value"><i class="fa-regular fa-calendar"></i> {{ $order->created_at->diffForHumans() }}</span>
                        </td>

                        <!-- Items Count (Commented out as in original layout) -->
                        <!-- <td>
                            <span class="meta-value"><i class="fa-solid fa-box"></i> {{ $order->items }} {{ $order->items > 1 ? 'Products' : 'Product' }}</span>
                        </td> -->

                        <!-- Total Amount -->
                        <td>
                            <span class="total-amount">{{ $order->total_price }}</span>
                        </td>

                        <!-- Action Button -->
                        <td>
                            <a href="{{ route('admin.orders.show', $order) }}" class="btn-view-details">
                                <i class="fa-solid fa-eye"></i> View Details
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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