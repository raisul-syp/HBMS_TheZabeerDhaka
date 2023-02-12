@extends('layouts.guest')
@foreach ($pages as $page)
@if ($page->name == 'Contact Us')
@section('title', "$page->meta_title")
@section('meta_decription', "$page->meta_decription")
@section('meta_keyword', "$page->meta_keyword")
@endif
@endforeach

@section('content')
    <section id="contact_section_frontend" class="contact_section_frontend content_section">
        <div class="container">
            @foreach ($pages as $page)
            @if ($page->name == 'Contact Us')
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title">
                        <h4>{{ $page->name }}</h4>
                    </div>
                    <div class="section_breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $page->name }}</a></li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                @if (session('success'))
                <div class="col-lg-12">
                    <div class="alert alert-success solid alert-right-icon alert-dismissible fade show">                            
                        <span><i class="fas fa-check"></i></span>
                        {{ session('success') }}
                    </div>
                </div>
                @elseif (session('danger'))
                <div class="col-lg-12">
                    <div class="alert alert-danger solid alert-right-icon alert-dismissible fade show">                            
                        <span><i class="fas fa-exclamation-triangle"></i></span>
                        {{ session('danger') }}
                    </div>
                </div>
                @endif
                
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="col-lg-6">
                    <div class="alert alert-danger solid alert-right-icon alert-dismissible fade show">
                        <span><i class="fas fa-exclamation-triangle"></i></span>
                        {{ $error }}
                    </div>
                </div>
                @endforeach
                @endif
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-section-inner">
                        <ul class="nav nav-pills justify-content-center mb-5" id="pills-tab" role="tablist">
                            @foreach ($contacts as $contact)
                            <li class="nav-item" role="presentation">
                              <button class="nav-link custom-nav-btn {{ $contact->id == 1 ? 'active' : '' }}" type="button" data-bs-toggle="pill" data-bs-target="#{{ Str::slug($contact->hotel_name) }}">{{ $contact->hotel_name }}</button>
                            </li>
                            @endforeach
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            @foreach ($contacts as $contact)
                            <div class="tab-pane fade show {{ $contact->id == 1 ? 'active' : '' }}" id="{{ Str::slug($contact->hotel_name) }}">
                                <div class="contact-info">
                                    <div class="row">
                                        <div class="col-lg-4 mb-4 mb-lg-0">
                                            <div class="contact-info-inner">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="contact-info-icon">
                                                            <i class="fas fa-envelope-open"></i>
                                                        </div>
                                                        <div class="contact-info-detail">
                                                            <h5>{{ $contact->email }}</h5>
                                                            @if ($contact->email_sales != NULL)
                                                            <h5>{{ $contact->email_sales }}</h5>
                                                            @else
                                                            <h5 class="d-none">{{ $contact->email_sales }}</h5>
                                                            @endif
                                                            @if ($contact->email_reservation != NULL)
                                                            <h5>{{ $contact->email_reservation }}</h5>
                                                            @else
                                                            <h5 class="d-none">{{ $contact->email_reservation }}</h5>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-4 mb-lg-0">
                                            <div class="contact-info-inner">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="contact-info-icon">
                                                            <i class="fas fa-phone-alt"></i>
                                                        </div>
                                                        <div class="contact-info-detail">
                                                            <h5><strong>Tel: </strong>{{ $contact->phone }}</h5>
                                                            @if ($contact->phone_sales != NULL)
                                                            <h5><strong>Sales: </strong>{{ $contact->phone_sales }}</h5>
                                                            @else
                                                            <h5 class="d-none"><strong>Sales: </strong>{{ $contact->phone_sales }}</h5>
                                                            @endif
                                                            @if ($contact->phone_reservation != NULL)
                                                            <h5><strong>Reservation: </strong>{{ $contact->phone_reservation }}</h5>
                                                            @else
                                                            <h5 class="d-none"><strong>Reservation: </strong>{{ $contact->phone_reservation }}</h5>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="contact-info-inner">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="contact-info-icon">
                                                            <i class="fas fa-map-marked-alt"></i>
                                                        </div>
                                                        <div class="contact-info-detail">
                                                            <h5>{{ $contact->address }}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="contact-form-map mt-5">
                                    <div class="row">
                                        <div class="col-lg-6 mb-4 mb-lg-0">
                                            <div class="contact-form">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="contact-form-header">
                                                            <h4>If you have any queries, please send us an email.<br>We will respond to you very soon.</h4>
                                                        </div>
                                                        <form method="post" action="{{ url('contact-us') }}">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Your Name<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" id="name" name="name">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="email" class="form-label">Email Address<span class="text-danger">*</span></label>
                                                                <input type="email" class="form-control" id="email" name="email">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="subject" class="form-label">Subject<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" id="subject" name="subject">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="message" class="form-label">Your Message<span class="text-danger">*</span></label>
                                                                <textarea class="form-control" name="message" id="message" rows="4"></textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="contact-map">
                                                <div class="card">
                                                    <iframe src="https://www.google.com/maps/embed?pb={{ $contact->google_map }}" width="100%" height="566" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </section>
@endsection
