@extends('layouts.guest')
@section('title', 'Booking Success')

@section('content')
<section id="about_section" class="about_section content_section" style="padding: 40px 0;">
    <div class="about_section_inner" style="padding: 40px 0;">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="success-page">
                        <div class="success-icon">
                            @if (session('success'))
                            <i class="fas fa-check"></i>
                            @elseif (session('error'))
                            <i class="fas fa-times"></i>
                            @endif
                        </div>
                        <div class="success-message">
                            @if (session('success'))
                            <h4>{{ session('success') }}</h4>
                            @elseif (session('error'))
                            <h4>{{ session('error') }}</h4>
                            @endif
                        </div>
                        <div class="success-btn">
                            @if (session('success'))
                            <a href="{{ url('/') }}" class="btn btn-primary">Go Back Home</a>
                            @elseif (session('error'))
                            <a href="{{ url('/booking') }}" class="btn btn-primary">Try Again</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




@endsection
