@extends('layouts.admin')

@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
@endsection

@section('content')
   

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
       
            <div class="stat-card">
                <div class="stat-icon icon-navy">
                    <i class="fas fa-chair"></i>
                </div>
                <div class="stat-details">
                    <span class="stat-title">Products</span>
                    <h3 class="stat-value">{{ $total_Products }}</h3>
                    <span class="stat-subtitle"></span>
                </div>
            </div>


            <div class="stat-card">
                <div class="stat-icon icon-navy">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="stat-details">
                    <span class="stat-title">oredrs</span>
                    <h3 class="stat-value">{{ $total_orders }}</h3>
                    <span class="stat-subtitle"></span>
                </div>
            </div>


            <div class="stat-card">
                <div class="stat-icon icon-navy">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-details">
                    <span class="stat-title">users</span>
                    <h3 class="stat-value">{{ $total_users }}</h3>
                    <span class="stat-subtitle"></span>
                </div>


            </div>
            <div class="stat-card">
                <div class="stat-icon icon-sage">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-details">
                    <span class="stat-title">Reviews status</span>
                    <h3 class="stat-value">{{ $pendingOrders }}</h3>
                    <span class="stat-subtitle">pending</span>
                </div>

                
            </div>
            <div class="stat-card">
                <div class="stat-icon icon-sage">
                    <i class="fas fa-star"></i>
                </div>
                <div class="stat-details">
                    <span class="stat-title">Reviews</span>
                    <h3 class="stat-value">{{ $total_reviews }}</h3>
                    <span class="stat-subtitle"></span>
                </div>
            </div>


            <div class="stat-card">
                <div class="stat-icon icon-sage">
                    <i class="fas fa-star"></i>
                </div>
                <div class="stat-details">
                    <span class="stat-title">company Rating</span>
                    <h3 class="stat-value">{{ $companyRating }}</h3>
                    <span class="stat-subtitle">The AVG</span>
                </div>
            </div>
        
    </section>

    <!-- Revenue Section -->
    <!-- <section class="dashboard-card revenue-card">
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
    </section> -->

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
                                <td class="order-id">{{ $order->id }}</td>
                                <td>
                                    <div class="user-meta">
                                        <div class="avatar-circle avatar-small">{{ Str::take($order->user->name, 1) }}</div>
                                        <span>{{ $order->user_id }}</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="status-badge status-{{ $order->status }}">
                                        {{ $order->status }}
                                    </span>
                                </td>
                                <td class="order-total">{{ $order->total_price }}</td>
                                <td class="order-date">{{ $order->created_at->diffForHumans() }}</td>
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
                        <div class="avatar-circle">{{ Str::take($user->name, 1) }}</div>
                        <div class="user-info">
                            <h4 class="user-name">{{ $user->name }}</h4>
                            <span class="user-email">{{ $user->email }}</span>
                        </div>
                        <span class="user-joined">{{ $user->created_at->calendar() }}</span>
                    </div>
                @endforeach
            </div>
        </section>
    </div>

    <!-- Quick Actions Section -->
    <!-- <section class="dashboard-card quick-actions-card">
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
    </section> -->
</div>
@endsection