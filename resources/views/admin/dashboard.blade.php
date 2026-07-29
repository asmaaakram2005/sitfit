@extends('layouts.admin')

@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
@endsection

@section('content')
  

    @php
    $stats = [
        [
            'title' => 'Total Products',
            'value' => '124',
            'subtitle' => '50 Products Available',
            'icon' => 'fas fa-chair',
            'color' => 'navy'
        ],
        [
            'title' => 'Total Orders',
            'value' => '1,280',
            'subtitle' => '+18% from last month',
            'icon' => 'fas fa-shopping-cart',
            'color' => 'navy'
        ],
        [
            'title' => 'Total Users',
            'value' => '3,450',
            'subtitle' => '+120 new this week',
            'icon' => 'fas fa-users',
            'color' => 'navy'
        ],
        [
            'title' => 'Pending Orders',
            'value' => '42',
            'subtitle' => 'Requires processing',
            'icon' => 'fas fa-clock',
            'color' => 'sage'
        ],
        [
            'title' => 'Total Reviews',
            'value' => '890',
            'subtitle' => '4.8 avg rating',
            'icon' => 'fas fa-star',
            'color' => 'sage'
        ],
        [
            'title' => 'Total Revenue',
            'value' => '$98,450',
            'subtitle' => '+24% overall growth',
            'icon' => 'fas fa-wallet',
            'color' => 'sage'
        ],
    ];

    $orders = [
        [
            'id' => '#ORD-7829',
            'customer' => 'Ahmed Hassan',
            'avatar' => 'AH',
            'status' => 'Pending',
            'badge' => 'status-pending',
            'total' => '$150.00',
            'date' => 'Today, 02:45 PM'
        ],
        [
            'id' => '#ORD-7828',
            'customer' => 'Sara Mohamed',
            'avatar' => 'SM',
            'status' => 'Delivered',
            'badge' => 'status-delivered',
            'total' => '$220.00',
            'date' => 'Yesterday'
        ],
        [
            'id' => '#ORD-7827',
            'customer' => 'Omar Farooq',
            'avatar' => 'OF',
            'status' => 'Processing',
            'badge' => 'status-processing',
            'total' => '$450.00',
            'date' => 'Oct 24, 2026'
        ],
        [
            'id' => '#ORD-7826',
            'customer' => 'Lina Mahmoud',
            'avatar' => 'LM',
            'status' => 'Delivered',
            'badge' => 'status-delivered',
            'total' => '$310.00',
            'date' => 'Oct 23, 2026'
        ],
        [
            'id' => '#ORD-7825',
            'customer' => 'Khaled Ali',
            'avatar' => 'KA',
            'status' => 'Pending',
            'badge' => 'status-pending',
            'total' => '$185.00',
            'date' => 'Oct 23, 2026'
        ],
    ];

    $users = [
        [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'joined' => 'Joined Today',
            'avatar' => 'JD'
        ],
        [
            'name' => 'Fatima Al-Sayed',
            'email' => 'fatima@example.com',
            'joined' => 'Joined Yesterday',
            'avatar' => 'FA'
        ],
        [
            'name' => 'Michael Smith',
            'email' => 'm.smith@example.com',
            'joined' => 'Joined 3 days ago',
            'avatar' => 'MS'
        ],
        [
            'name' => 'Nour El-Din',
            'email' => 'nour@example.com',
            'joined' => 'Joined 5 days ago',
            'avatar' => 'NE'
        ],
    ];
@endphp

<div class="dashboard-wrapper">
    <!-- Header Summary -->
    <div class="dashboard-header">
        <div>
            <h1 class="dashboard-title">Dashboard Overview</h1>
            <p class="dashboard-subtitle">Welcome back! Here is what is happening with SitFit today.</p>
        </div>
    </div>

    <!-- Statistics Section -->
    <section class="stats-grid">
        @foreach($stats as $stat)
            <div class="stat-card">
                <div class="stat-icon icon-{{ $stat['color'] }}">
                    <i class="{{ $stat['icon'] }}"></i>
                </div>
                <div class="stat-details">
                    <span class="stat-title">{{ $stat['title'] }}</span>
                    <h3 class="stat-value">{{ $stat['value'] }}</h3>
                    <span class="stat-subtitle">{{ $stat['subtitle'] }}</span>
                </div>
            </div>
        @endforeach
    </section>

    <!-- Revenue Section -->
    <section class="dashboard-card revenue-card">
        <div class="card-header">
            <div>
                <h2 class="card-title">Revenue Overview</h2>
                <p class="card-subtitle">Monthly financial performance & sales target tracking</p>
            </div>
            <span class="badge badge-trend">
                <i class="fas fa-arrow-up"></i> +12% compared to last month
            </span>
        </div>

        <div class="revenue-body">
            <div class="revenue-summary">
                <div class="revenue-main">
                    <span class="revenue-label">Total Monthly Revenue</span>
                    <h2 class="revenue-amount">$15,420</h2>
                </div>
                
                <div class="progress-container">
                    <div class="progress-labels">
                        <span>Monthly Goal ($20,000)</span>
                        <span>77.1%</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 77.1%;"></div>
                    </div>
                </div>
            </div>

            <div class="chart-container">
                <div class="chart-header-placeholder">
                    <span>Sales Velocity vs Previous Target</span>
                    <div class="chart-legend">
                        <span class="legend-item"><span class="dot dot-navy"></span> Current</span>
                        <span class="legend-item"><span class="dot dot-sage"></span> Target</span>
                    </div>
                </div>
                <div class="chart-bars-placeholder">
                    <div class="chart-col"><div class="bar bar-navy" style="height: 40%;"></div><span class="bar-label">Mon</span></div>
                    <div class="chart-col"><div class="bar bar-navy" style="height: 65%;"></div><span class="bar-label">Tue</span></div>
                    <div class="chart-col"><div class="bar bar-navy" style="height: 50%;"></div><span class="bar-label">Wed</span></div>
                    <div class="chart-col"><div class="bar bar-navy" style="height: 85%;"></div><span class="bar-label">Thu</span></div>
                    <div class="chart-col"><div class="bar bar-navy" style="height: 95%;"></div><span class="bar-label">Fri</span></div>
                    <div class="chart-col"><div class="bar bar-navy" style="height: 70%;"></div><span class="bar-label">Sat</span></div>
                    <div class="chart-col"><div class="bar bar-navy" style="height: 60%;"></div><span class="bar-label">Sun</span></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Split Layout -->
    <div class="dashboard-split">
        <!-- Latest Orders Section -->
        <section class="dashboard-card main-content-card">
            <div class="card-header">
                <div>
                    <h2 class="card-title">Latest Orders</h2>
                    <p class="card-subtitle">Recent activity from your online storefront</p>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="orders-table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td class="order-id">{{ $order['id'] }}</td>
                                <td>
                                    <div class="user-meta">
                                        <div class="avatar-circle avatar-small">{{ $order['avatar'] }}</div>
                                        <span>{{ $order['customer'] }}</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="status-badge {{ $order['badge'] }}">
                                        {{ $order['status'] }}
                                    </span>
                                </td>
                                <td class="order-total">{{ $order['total'] }}</td>
                                <td class="order-date">{{ $order['date'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Latest Users Section -->
        <section class="dashboard-card side-content-card">
            <div class="card-header">
                <div>
                    <h2 class="card-title">Latest Users</h2>
                    <p class="card-subtitle">Newly registered customer accounts</p>
                </div>
            </div>

            <div class="users-list">
                @foreach($users as $user)
                    <div class="user-item">
                        <div class="avatar-circle">{{ $user['avatar'] }}</div>
                        <div class="user-info">
                            <h4 class="user-name">{{ $user['name'] }}</h4>
                            <span class="user-email">{{ $user['email'] }}</span>
                        </div>
                        <span class="user-joined">{{ $user['joined'] }}</span>
                    </div>
                @endforeach
            </div>
        </section>
    </div>

    <!-- Quick Actions Section -->
    <section class="dashboard-card quick-actions-card">
        <div class="card-header">
            <div>
                <h2 class="card-title">Quick Actions</h2>
                <p class="card-subtitle">Frequent management operations</p>
            </div>
        </div>
        <div class="actions-group">
            <button type="button" class="btn btn-navy">
                <i class="fas fa-plus"></i> Add Product
            </button>
            <button type="button" class="btn btn-sage">
                <i class="fas fa-box"></i> View Orders
            </button>
            <button type="button" class="btn btn-outline">
                <i class="fas fa-user-gear"></i> Manage Users
            </button>
        </div>
    </section>
</div>
@endsection