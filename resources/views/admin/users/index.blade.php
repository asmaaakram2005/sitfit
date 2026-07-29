@extends('layouts.admin')

@section('title', 'Users Management')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/users.css') }}">
@endsection

@section('content')
  @php
$users = [
    [
        'id' => 1,
        'image' => 'https://ui-avatars.com/api/?name=John+Doe&background=001F3F&color=fff',
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'phone' => '+1 (555) 019-2834',
        'orders' => 12,
        'joined' => 'July 20, 2026'
    ],
    [
        'id' => 2,
        'image' => 'https://ui-avatars.com/api/?name=Sarah+Jenkins&background=9DC183&color=fff',
        'name' => 'Sarah Jenkins',
        'email' => 'sarah.j@example.com',
        'phone' => '+1 (555) 014-9921',
        'orders' => 8,
        'joined' => 'June 15, 2026'
    ],
    [
        'id' => 3,
        'image' => 'https://ui-avatars.com/api/?name=Michael+Brown&background=001F3F&color=fff',
        'name' => 'Michael Brown',
        'email' => 'm.brown@example.com',
        'phone' => '+1 (555) 017-8832',
        'orders' => 3,
        'joined' => 'May 04, 2026'
    ],
    [
        'id' => 4,
        'image' => 'https://ui-avatars.com/api/?name=Emma+Wilson&background=9DC183&color=fff',
        'name' => 'Emma Wilson',
        'email' => 'emma.w@example.com',
        'phone' => '+1 (555) 012-3344',
        'orders' => 19,
        'joined' => 'April 22, 2026'
    ],
    [
        'id' => 5,
        'image' => 'https://ui-avatars.com/api/?name=Alex+Rivera&background=001F3F&color=fff',
        'name' => 'Alex Rivera',
        'email' => 'arivera@example.com',
        'phone' => '+1 (555) 018-5566',
        'orders' => 1,
        'joined' => 'March 11, 2026'
    ],
    [
        'id' => 6,
        'image' => 'https://ui-avatars.com/api/?name=Lisa+Ray&background=9DC183&color=fff',
        'name' => 'Lisa Ray',
        'email' => 'lisa.ray@example.com',
        'phone' => '+1 (555) 011-7788',
        'orders' => 6,
        'joined' => 'January 30, 2026'
    ]
];
@endphp

<div class="users-dashboard">
    <!-- Header Section -->
    <header class="page-header">
        <div class="header-text">
            <h1 class="page-title">Users</h1>
            <p class="page-description">Manage registered users and their activity.</p>
        </div>

        <!-- Controls Section (Search & Filter) -->
        <div class="header-controls">
            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass search-icon"></i>
                <input type="text" placeholder="Search by name, email..." class="search-input">
            </div>

            <div class="filter-box">
                <i class="fa-solid fa-filter filter-icon"></i>
                <select class="filter-select">
                    <option value="all">All Statuses</option>
                    <option value="active">Most Orders</option>
                    <option value="recent">Newest Joined</option>
                </select>
            </div>
        </div>
    </header>

    <!-- Cards Grid -->
    @if(count($users) > 0)
        <div class="users-grid">
            @foreach($users as $user)
                <div class="user-card">
                    <div class="card-header">
                        <img src="{{ $user['image'] }}" alt="{{ $user['name'] }}" class="user-avatar">
                        <h2 class="user-name">{{ $user['name'] }}</h2>
                        <a href="mailto:{{ $user['email'] }}" class="user-email">{{ $user['email'] }}</a>
                    </div>

                    <div class="card-body">
                        <div class="info-row">
                            <span class="info-label">
                                <i class="fa-solid fa-phone info-icon"></i> Phone
                            </span>
                            <span class="info-value">{{ $user['phone'] }}</span>
                        </div>

                        <div class="info-row">
                            <span class="info-label">
                                <i class="fa-solid fa-bag-shopping info-icon"></i> Orders
                            </span>
                            <span class="info-value badge">{{ $user['orders'] }}</span>
                        </div>

                        <div class="info-row">
                            <span class="info-label">
                                <i class="fa-solid fa-calendar-days info-icon"></i> Joined
                            </span>
                            <span class="info-value">{{ $user['joined'] }}</span>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="#" class="btn-view">
                            <i class="fa-solid fa-eye"></i> View Profile
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination UI -->
        <nav class="pagination-wrapper" aria-label="Users pagination">
            <ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1"><i class="fa-solid fa-chevron-left"></i> Previous</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next <i class="fa-solid fa-chevron-right"></i></a>
                </li>
            </ul>
        </nav>
    @else
        <!-- Empty State Component -->
        <div class="empty-state">
            <div class="empty-icon-wrapper">
                <i class="fa-solid fa-users-slash empty-icon"></i>
            </div>
            <h3 class="empty-title">No users found</h3>
            <p class="empty-description">There are no registered users yet.</p>
        </div>
    @endif
</div>
@endsection