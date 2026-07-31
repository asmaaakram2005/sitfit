@extends('layouts.admin')

@section('title', 'Users Management')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/users.css') }}">
@endsection

@section('content')
  
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

            <!-- <div class="filter-box">
                <i class="fa-solid fa-filter filter-icon"></i>
                <select class="filter-select">
                    <option value="all">All Statuses</option>
                    <option value="active">Most Orders</option>
                    <option value="recent">Newest Joined</option>
                </select>
            </div> -->
        </div>
    </header>   

    <!-- Users Table -->
    @if(count($users) > 0)
        <div class="table-responsive">
            <table class="users-table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Email</th>
                        <th><i class="fa-solid fa-phone info-icon"></i> Phone</th>
                        <th><i class="fa-solid fa-bag-shopping info-icon"></i> Orders</th>
                        <th><i class="fa-solid fa-calendar-days info-icon"></i> Joined</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <!-- User Name & Avatar -->
                            <td class="user-cell">
                                <img src="{{ asset($user->image) }}" alt="{{ $user->name }}" class="user-avatar">
                                <span class="user-name">{{ $user->name }}</span>
                            </td>

                            <!-- Email -->
                            <td>
                                <a href="mailto:{{ $user->email }}" class="user-email">{{ $user->email }}</a>
                            </td>

                            <!-- Phone -->
                            <td class="info-value">
                                {{ $user->phone }}
                            </td>

                            <!-- Orders Count -->
                            <td>
                                <span class="info-value badge">{{ $user->orders->count() }}</span>
                            </td>

                            <!-- Joined Date -->
                            <td class="info-value">
                                {{ $user->created_at->calendar() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination UI -->
        <!-- <nav class="pagination-wrapper" aria-label="Users pagination">
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
        </nav> -->
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