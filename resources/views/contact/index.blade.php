@extends('layouts.app')

@section('title','Contact Us')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')

<div class="contact-container">

    <div class="contact-card">

        <h1>Contact Us</h1>

        <p class="subtitle">
            We'd love to hear from you. Send us your message and we'll reply as soon as possible.
        </p>

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST">

            @csrf

            <div class="form-group">
                <label>Subject</label>

                <input
                    type="text"
                    name="subject"
                    class="form-input @error('subject') input-error @enderror"
                    value="{{ old('subject') }}"
                    placeholder="Message Subject">

                @error('subject')
                    <small class="error-message">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">

                <label>Message</label>

                <textarea
                    name="message"
                    class="form-input @error('message') input-error @enderror"
                    rows="7"
                    placeholder="Write your message...">{{ old('message') }}</textarea>

                @error('message')
                    <small class="error-message">{{ $message }}</small>
                @enderror

            </div>

            <button type="submit" class="send-btn">

                Send Message

            </button>

        </form>

    </div>

</div>

@endsection