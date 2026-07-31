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
                                <h3 class="sender-name">{{ $msg->user->name ?? $msg->name ?? 'Guest User' }}</h3>
                                <a href="mailto:{{ $msg->user->email ?? $msg->email }}" class="sender-email">
                                    {{ $msg->user->email ?? $msg->email }}
                                </a>
                            </div>
                        </div>

                        <div class="message-meta">
                            <span class="message-date">
                                <i class="fa-regular fa-calendar"></i>
                                {{ $msg->created_at ? $msg->created_at->calendar() : 'N/A' }}
                            </span>

                            {{-- Hidden Form for Delete Message --}}
                            <form 
                                id="delete-contact-form-{{ $msg->id }}" 
                                action="{{ route('admin.contacts.destroy', $msg->id) }}" 
                                method="POST" 
                                style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>

                            {{-- Delete Button using Data Attributes --}}
                            <button 
                                type="button" 
                                class="btn-delete" 
                                title="Delete Message" 
                                aria-label="Delete Message"
                                data-id="{{ $msg->id }}"
                                data-sender="{{ $msg->user->name ?? $msg->name ?? 'User' }}"
                                onclick="confirmDeleteContact(this)">
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

{{-- SweetAlert2 CDN --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function confirmDeleteContact(button) {
    const contactId = button.getAttribute('data-id');
    const senderName = button.getAttribute('data-sender');

    Swal.fire({
        title: 'Delete Message?',
        text: `Are you sure you want to delete the message from "${senderName}"? This action cannot be undone!`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e63946',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, Delete It',
        cancelButtonText: 'Cancel',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(`delete-contact-form-${contactId}`).submit();
        }
    });
}
</script>

{{-- Success Toast Notification --}}
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Deleted!',
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