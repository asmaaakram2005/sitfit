@extends('layouts.admin')

@section('title', 'Reviews')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/reviews.css') }}">
@endsection

@section('content')
    <div class="reviews-dashboard">
        {{-- Page Header --}}
        <header class="reviews-header">
            <div class="header-content">
                <h1 class="page-title">Reviews</h1>
                <p class="page-description">Manage customer reviews and product feedback.</p>
            </div>

            {{-- Search & Filters --}}
            <div class="header-actions">
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass search-icon"></i>
                    <input type="text" class="search-input" placeholder="Search product or reviewer...">
                </div>
            </div>
        </header>

        {{-- Cards Grid or Empty State --}}
        @if(count($reviews) > 0)
            <div class="reviews-grid">
                @foreach($reviews as $review)
                    <div class="review-card">
                        <div class="card-header">
                            <div class="user-info">
                                <div class="avatar-circle">
                                    {{ strtoupper(substr($review->user->name ?? 'U', 0, 1)) }}
                                </div>
                                <div class="user-details">
                                    <h3 class="user-name">{{ $review->user->name ?? 'Unknown User' }}</h3>
                                    <span class="product-tag">
                                        <i class="fa-solid fa-box"></i> {{ $review->product->name ?? 'Product' }}
                                    </span>
                                </div>
                            </div>
                            
                            {{-- Hidden Form for Delete Review --}}
                            <form 
                                id="delete-review-form-{{ $review->id }}" 
                                action="{{ route('admin.reviews.destroy', $review->id) }}" 
                                method="POST" 
                                style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>

                            {{-- Delete Button using Data Attributes --}}
                            <button 
                                type="button" 
                                class="btn-delete" 
                                title="Delete Review"
                                data-id="{{ $review->id }}"
                                data-name="{{ $review->user->name ?? 'User' }}"
                                onclick="confirmDeleteReview(this)">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>

                        <div class="card-body">
                            <div class="rating-bar">
                                <div class="stars" aria-label="{{ $review->rating }} out of 5 stars">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $review->rating)
                                            <i class="fa-solid fa-star star-filled"></i>
                                        @else
                                            <i class="fa-solid fa-star star-empty"></i>
                                        @endif
                                    @endfor
                                </div>
                                <span class="review-date">
                                    <i class="fa-regular fa-calendar"></i> {{ $review->created_at ? $review->created_at->format('M d, Y') : 'N/A' }}
                                </span>
                            </div>

                            <div class="comment-wrapper">
                                <p class="review-comment">{{ $review->comment }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            {{-- Empty State Component --}}
            <div class="empty-state">
                <div class="empty-icon-box">
                    <i class="fa-regular fa-comments"></i>
                </div>
                <h2 class="empty-title">No reviews found</h2>
                <p class="empty-description">There are no customer reviews yet.</p>
            </div>
        @endif
    </div>

{{-- SweetAlert2 CDN --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function confirmDeleteReview(button) {
    const reviewId = button.getAttribute('data-id');
    const userName = button.getAttribute('data-name');

    Swal.fire({
        title: 'Delete Review?',
        text: `Are you sure you want to delete the review by "${userName}"? This action cannot be undone!`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e63946',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, Delete It',
        cancelButtonText: 'Cancel',
        reverseButtons: true,
        customClass: {
            confirmButton: 'btn btn-danger',
            cancelButton: 'btn btn-secondary'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(`delete-review-form-${reviewId}`).submit();
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