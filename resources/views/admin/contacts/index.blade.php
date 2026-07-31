@extends('layouts.admin')

@section('title', 'Contacts Messages')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/contacts.css') }}">
@endsection

@section('content')
  
<div class="contacts-container">
    <!-- Header Section -->
    <header class="contacts-header">
        <div class="header-title-group">
            <h1 class="page-title">Contact Messages</h1>
            <p class="page-description">Manage customer inquiries and messages.</p>
        </div>

        <!-- Controls / Filters UI -->
        <div class="header-controls">
            <div class="search-wrapper">
                <i class="fa-solid fa-magnifying-glass search-icon"></i>
                <input type="text" class="search-input" placeholder="Search sender, email, or subject...">
            </div>

            <!-- <div class="filter-wrapper">
                <i class="fa-solid fa-filter filter-icon"></i>
                <select class="filter-select">
                    <option value="all">All Messages</option>
                    <option value="newest">Newest First</option>
                    <option value="oldest">Oldest First</option>
                </select>
            </div> -->
        </div>
    </header>

    <!-- Messages Container -->
    @if(count($contacts) > 0)
        <div class="messages-list">
            @foreach($contacts as $msg)
                <article class="message-card">
                    <div class="message-header">
                        <div class="sender-info">
                            <div class="sender-avatar">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="sender-details">
                                <h3 class="sender-name">{{ $msg->name }}</h3>
                                <a href="mailto:{{ $msg->email }}" class="sender-email">{{ $msg->email }}</a>
                            </div>
                        </div>

                        <div class="message-meta">
                            <span class="message-date">
                                <i class="fa-regular fa-calendar"></i>
                                {{ $msg->created_at->calendar() }}
                            </span>
                            <button type="button" class="btn-delete" title="Delete Message" aria-label="Delete Message">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>

                    <div class="message-body">
                        <h4 class="message-subject">{{ $msg->subject }}</h4>
                        <div class="message-content">
                            <p>{{ $msg->message }}</p>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <!-- Pagination UI -->
        <!-- <nav class="pagination-wrapper" aria-label="Messages pagination">
            <ul class="pagination">
                <li class="page-item disabled">
                    <a href="#" class="page-link"><i class="fa-solid fa-chevron-left"></i> Previous</a>
                </li>
                <li class="page-item active">
                    <a href="#" class="page-link">1</a>
                </li>
                <li class="page-item">
                    <a href="#" class="page-link">2</a>
                </li>
                <li class="page-item">
                    <a href="#" class="page-link">3</a>
                </li>
                <li class="page-item">
                    <a href="#" class="page-link">Next <i class="fa-solid fa-chevron-right"></i></a>
                </li>
            </ul>
        </nav> -->
    @else
        <!-- Empty State UI -->
        <div class="empty-state">
            <div class="empty-icon-wrapper">
                <i class="fa-regular fa-envelope-open empty-icon"></i>
            </div>
            <h2 class="empty-title">No messages found</h2>
            <p class="empty-description">There are no customer messages yet.</p>
        </div>
    @endif
</div>
@endsection