@extends('layouts.guest')
@section('title', 'Home')
@foreach ($settings as $setting)
@section('meta_decription', "$setting->meta_decription")
@section('meta_keyword', "$setting->meta_keyword")
@endforeach

@section('content')
<section id="heroSlider_section" class="heroSlider_section">
    <div class="heroSlider_section_inner desktop-view">
        <div class="owl-carousel owl-theme home-slider">
            @foreach ($sliders as $slider)
            <div class="item">
                <img src="{{ asset('frontend/images/sliders/'.$slider->desktop_image) }}" alt="" width="100%" height="603px">
                <div class="cover">
                    <div class="cover-inner">
                        <div class="container">
                            <div class="header-content">
                                <h3>{{ $slider->content_1 }}</h3>
                                <h1>{{ $slider->content_2 }}</h1>
                                <hr>
                                <h4>{{ $slider->content_3 }}</h4>
                                <a href="https://thezabeerdhaka.com/" class="btn btn-primary btn-read-more">The Zabeer Dhaka</a>
                                <a href="https://thezabeerjashore.com/" class="btn btn-primary btn-read-more">The Zabeer Jashore</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="heroSlider_section_inner mobile-view">
        <div class="owl-carousel owl-theme home-slider">
            @foreach ($sliders as $slider)
            <div class="item">
                <img src="{{ asset('frontend/images/sliders/'.$slider->mobile_image) }}" alt="" width="1320px" height="1000px">
                <div class="cover">
                    <div class="cover-inner">
                        <div class="container">
                            <div class="header-content">
                                <h3>{{ $slider->content_1 }}</h3>
                                <h1>{{ $slider->content_2 }}</h1>
                                <hr>
                                <h4>{{ $slider->content_3 }}</h4>
                                <a href="https://thezabeerdhaka.com/" class="btn btn-primary btn-read-more">The Zabeer Dhaka</a>
                                <a href="https://thezabeerjashore.com/" class="btn btn-primary btn-read-more">The Zabeer Jashore</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="availability_sec">
        <div class="container">
            <div class="availability_sec_inner">
                <form action="{{ url('available-rooms') }}" method="GET">
                    <div class="availability_form">
                        <div class="form_input">
                            <label for="checkin_date" class="form-label text-white">Check-In:</label>
                            <div class="input-wrapper">
                                <input type="date" class="form-control" id="checkin_date" name="checkin_date" value="{{ $todayDate }}">
                                <span class="lnr lnr-calendar-full icon"></span>
                            </div>
                        </div>
                        <div class="form_input">
                            <label for="checkout_date" class="form-label text-white">Check-Out:</label>
                            <div class="input-wrapper">
                                <input type="date" class="form-control" id="checkout_date" name="checkout_date" value="{{ $tomorrowDate }}">
                                <span class="lnr lnr-calendar-full icon"></span>
                            </div>
                        </div>
                        <div class="form_input">
                            <label for="adults" class="form-label text-white">Adults:</label>
                            <div class="input-wrapper">
                                <select class="form-select" id="adults" name="adults">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                </select>
                                <span class="lnr lnr-chevron-down icon"></span>
                            </div>
                        </div>
                        <div class="form_input">
                            <label for="children" class="form-label text-white">Children:</label>
                            <div class="input-wrapper">
                                <select class="form-select" id="children" name="children">
                                    <option selected>0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                </select>
                                <span class="lnr lnr-chevron-down icon"></span>
                            </div>
                        </div>
                    </div>
                    <div class="submit_btn">
                        <button type="submit" class="btn btn-primary">Check Availability</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@if (count($offers) >0)
<section id="offer_section" class="offer_section">
    <div class="offer_section_inner">
        <div class="container">
            <div class="row">
                @foreach ($offers->where('offer_category', '=', 'Restaurant')->slice(-2) as $offer)
                <div class="col-lg-6 col-mob-12 mb-3 mb-lg-0">
                    <div class="offer_sec">
                        <a href="{{ url('offers/offer-details/'.$offer->slug) }}">
                            <div class="card">
                                <div class="card-image banner">
                                    <img src="{{ asset('uploads/offer/'.$offer->thumb) }}" alt="">
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@else
<section id="offer_section" class="offer_section d-none"></section>
@endif


<section id="about_section" class="about_section">
    <div class="about_section_inner">
        <div class="container">
            @foreach ($aboutUs as $about)
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="image_box">
                        <div class="card">
                            <div class="card-body">
                                <div class="image">
                                    <img src="{{ asset('frontend/images/pages/'.$about->image) }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 mb-0 mb-lg-0">
                    <div class="content_box">
                        <div class="card">
                            <div class="card-body">
                                <div class="content">
                                    <h2>{{ '"'.$about->title.'"' }}</h2>
                                    <h4><span class="decor-1"></span> {{ $about->sub_title }}</h4>
                                    {!! html_entity_decode($about->long_description) !!}
                                    <a href="{{ $about->slug }}" class="btn btn-primary btn-read">
                                        <span>Read more</span>
                                        <i class="fas fa-long-arrow-alt-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section id="rooms_section" class="rooms_section">
    <div class="rooms_section_inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title">
                        <h4>Rooms & Suits</h4>
                        <div class="decor-1"></div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                @foreach ($rooms->slice(0, 4) as $room)
                <div class="col-lg-3 col-mob-6 mb-4 mb-lg-0">
                    <div class="rooms_sec">
                        <div class="card">
                            <div class="card-image">
                                @if (count($room->roomImages) > 0)
                                @foreach ($room->roomImages as $roomImage)
                                <img src="{{ asset($roomImage->image) }}" alt="">
                                @break
                                @endforeach
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="content">
                                    <div class="content_inner">
                                        <h4>{{ $room->name }}</h4>
                                        @if ($room->has_discount == 1)
                                        <div class="room-price more-price">
                                            <div class="previous-price">
                                                <h5>{{ '$'.$room->price.'++' }} <span>/ night</span></h5>
                                            </div>
                                            <div class="discount-price">
                                                <h5>{{ '$'.$room->discount_price.'++' }} <span>/ night</span></h5>
                                                <h6>{{ $room->discount_rate.'%' }}<span>off</span></h6>
                                            </div>
                                        </div>
                                        @else
                                        <div class="room-price">
                                            <div class="actual-price">
                                                <h5>{{ '$'.$room->price.'++' }} <span>/ night</span></h5>
                                                <h6>Rack Rate</h6>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <a href="{{ url('rooms/room-details/'.$room->slug) }}" class="btn-view">
                                        <span>View details</span>
                                        <i class="fas fa-long-arrow-alt-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@if (count($offers) > 0)
<section id="offer_section" class="offer_section">
    <div class="offer_section_inner">
        <div class="container">
            <div class="row">
                <div class="owl-carousel owl-theme room-offer-carousel">
                    @foreach ($offers->where('offer_category', '=', 'Room')->slice(-2) as $offer)
                    <div class="item">
                        <div class="offer_sec">
                            <a href="{{ url('offers/offer-details/'.$offer->slug) }}">
                                <div class="card">
                                    <div class="card-image">
                                        <img src="{{ asset('uploads/offer/'.$offer->thumb) }}" alt="">
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@else
<section id="offer_section" class="offer_section d-none"></section>
@endif

<section id="coreFacility_section" class="coreFacility_section">
    <div class="coreFacility_section_inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title">
                        <h4>Core Facilities</h4>
                        <div class="decor-1"></div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                @foreach ($facilities as $facility)
                <div class="col-lg-3 col-mob-6 mb-2 mb-lg-4">
                    <div class="coreFacilities_sec">
                        <div class="card">
                            <div class="card-body">
                                <div class="icon">
                                    <img src="{{ asset('frontend/images/facilities/'.$facility->image) }}" alt="">
                                </div>
                                <div class="content">
                                    <h4>{{ $facility->name }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section id="facility_section" class="facility_section">
    <div class="facility_section_inner">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="facility_image">
                    <img src="{{ asset('frontend/images/wellness/restaurent.png') }}" alt="">
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="facility_content">
                    <h4>Restaurants</h4>
                    <p>The hotel has 3 dedicated restaurants for any kind of function and has the capacity for 200+ guests. Each restaurant has very well decoration and world-class service.</p>
                    <a class="btn btn-primary btn-book" href="{{ url('/restaurants') }}">{{ _('View more') }}</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="facility_image">
                    <img src="{{ asset('frontend/images/wellness/wellness.png') }}" alt="">
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="facility_content">
                    <h4>Wellness</h4>
                    <p>The hotel has 3 dedicated wellness zones for our all guests where they can relax and spends some leisure time. Each wellness zone has very well decoration and satisfactory customer service.</p>
                    <a class="btn btn-primary btn-book" href="{{ url('/wellness') }}">{{ _('View more') }}</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="breadcrumb_section" class="breadcrumb_section">
    <div class="breadcrumb_section_inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_sec">
                        <div class="content">
                            <h5>Need a vacation? We offered you the</h5>
                            <h4>Best Holiday Offer</h4>
                        </div>
                        <div class="breadcrumb_btn">
                            <a href="{{ url('/rooms') }}" class="btn btn-book">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="video-section-area" style="background-image: url(../frontend/images/vidoe-section-bg.jpeg);">
    <div class="play-btn-box" id="play-video">
      <div class="play-button"><i class="fas fa-play"></i></div>
      <div class="play-btn-line1" id="line1">
        <div class="play-btn-line2" id="line2"></div>
      </div>
    </div>
    <div id="video-overlay" class="video-overlay">
      <a class="video-overlay-close"><i class="fa-solid fa-xmark"></i></a>
    </div>
</section>

<div id="testimonials_section" class="testimonials_section">
    <div class="testimonials_section_inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title">
                        <h4>Testimonials</h4>
                        <div class="decor-1"></div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="owl-carousel owl-theme testimonials-slider">
                    @foreach ($testimonials as $testimonial)
                    <div class="item">
                        <div class="image">
                            <img src="{{ asset('frontend/images/testimonials/'.$testimonial->image) }}" alt="">
                        </div>
                        <div class="content">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="title">{{ $testimonial->name }}</h4>
                                    <h6 class="position">{{ $testimonial->designation }}</h6>
                                    <h5 class="company">{{ $testimonial->company }}</h5>

                                    <p class="message">{{ $testimonial->message }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
