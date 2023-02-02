@extends('layouts.guest')
@if ($page)
@section('title', $page->name)

@section('content')
<section id="pages_section" class="pages_section content_section">
    <div class="pages_section_frontend">
        <div class="container">
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

            @if ($page->name == 'Offers')
            <div class="offer-page-parent">
                <div class="row mt-4">
                    @forelse ($offers as $offer)
                    @if ($offer->offer_category == 'Room')
                    <div class="col-lg-6 col-mob-6 mb-4">
                        <div class="page-inner">
                            <div class="card">
                                <div class="page-image">
                                    <img src="{{ asset('uploads/offer/'.$offer->thumb) }}" alt="">
                                </div>
                                <div class="card-body">
                                    <hr>
                                    <div class="page-terminal d-flex align-items-center justify-content-between">
                                        <div class="datetime">
                                            <i class="fa fa-calendar me-1"></i>
                                            <strong>Start Date: </strong><span>{{ date('d M Y', strtotime($offer->start_date)) }}</span>
                                        </div>
                                        <div class="datetime">
                                            <i class="fa fa-calendar me-1"></i>
                                            <strong>End Date: </strong><span>{{ date('d M Y', strtotime($offer->end_date)) }}</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="page-header">
                                        <div class="page-title">
                                            {{ $offer->name }}
                                        </div>
                                    </div>
                                    <div class="page-body">
                                        <div class="page-dscrp">
                                            {{ $offer->short_description }}
                                        </div>
                                    </div>
                                </div>
                                <div class="page-details-btn">
                                    <a href="{{ url('offers/offer-details/'.$offer->slug) }}" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @empty
                    <div class="col-lg-12">
                        No Offers Record Available!
                    </div>
                    @endforelse
                </div>

                <div class="row mt-4">
                    @forelse ($offers as $offer)
                    @if ($offer->offer_category == 'Restaurant')
                    <div class="col-lg-6 col-mob-6 mb-4">
                        <div class="page-inner">
                            <div class="card">
                                <div class="page-image">
                                    <img src="{{ asset('uploads/offer/'.$offer->thumb) }}" alt="">
                                </div>
                                <div class="card-body">
                                    <hr>
                                    <div class="page-terminal d-flex align-items-center justify-content-between">
                                        <div class="datetime">
                                            <i class="fa fa-calendar me-1"></i>
                                            <strong>Start Date: </strong><span>{{ date('d M Y', strtotime($offer->start_date)) }}</span>
                                        </div>
                                        <div class="datetime">
                                            <i class="fa fa-calendar me-1"></i>
                                            <strong>End Date: </strong><span>{{ date('d M Y', strtotime($offer->end_date)) }}</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="page-header">
                                        <div class="page-title">
                                            {{ $offer->name }}
                                        </div>
                                    </div>
                                    <div class="page-body">
                                        <div class="page-dscrp">
                                            {{ $offer->short_description }}
                                        </div>
                                    </div>
                                </div>
                                <div class="page-details-btn">
                                    <a href="{{ url('offers/offer-details/'.$offer->slug) }}" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @empty
                    <div class="col-lg-12">
                        No Offers Record Available!
                    </div>
                    @endforelse
                </div>

                <div class="row mt-4">
                    @forelse ($offers as $offer)
                    @if ($offer->offer_category == 'Hall')
                    <div class="col-lg-6 col-mob-6 mb-4">
                        <div class="page-inner">
                            <div class="card">
                                <div class="page-image">
                                    <img src="{{ asset('uploads/offer/'.$offer->thumb) }}" alt="">
                                </div>
                                <div class="card-body">
                                    <hr>
                                    <div class="page-terminal d-flex align-items-center justify-content-between">
                                        <div class="datetime">
                                            <i class="fa fa-calendar me-1"></i>
                                            <strong>Start Date: </strong><span>{{ date('d M Y', strtotime($offer->start_date)) }}</span>
                                        </div>
                                        <div class="datetime">
                                            <i class="fa fa-calendar me-1"></i>
                                            <strong>End Date: </strong><span>{{ date('d M Y', strtotime($offer->end_date)) }}</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="page-header">
                                        <div class="page-title">
                                            {{ $offer->name }}
                                        </div>
                                    </div>
                                    <div class="page-body">
                                        <div class="page-dscrp">
                                            {{ $offer->short_description }}
                                        </div>
                                    </div>
                                </div>
                                <div class="page-details-btn">
                                    <a href="{{ url('offers/offer-details/'.$offer->slug) }}" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @empty
                    <div class="col-lg-12">
                        No Offers Record Available!
                    </div>
                    @endforelse
                </div>

                <div class="row mt-4">
                    @forelse ($offers as $offer)
                    @if ($offer->offer_category == 'Wellness')
                    <div class="col-lg-6 col-mob-6 mb-4">
                        <div class="page-inner">
                            <div class="card">
                                <div class="page-image">
                                    <img src="{{ asset('uploads/offer/'.$offer->thumb) }}" alt="">
                                </div>
                                <div class="card-body">
                                    <hr>
                                    <div class="page-terminal d-flex align-items-center justify-content-between">
                                        <div class="datetime">
                                            <i class="fa fa-calendar me-1"></i>
                                            <strong>Start Date: </strong><span>{{ date('d M Y', strtotime($offer->start_date)) }}</span>
                                        </div>
                                        <div class="datetime">
                                            <i class="fa fa-calendar me-1"></i>
                                            <strong>End Date: </strong><span>{{ date('d M Y', strtotime($offer->end_date)) }}</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="page-header">
                                        <div class="page-title">
                                            {{ $offer->name }}
                                        </div>
                                    </div>
                                    <div class="page-body">
                                        <div class="page-dscrp">
                                            {{ $offer->short_description }}
                                        </div>
                                    </div>
                                </div>
                                <div class="page-details-btn">
                                    <a href="{{ url('offers/offer-details/'.$offer->slug) }}" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @empty
                    <div class="col-lg-12">
                        No Offers Record Available!
                    </div>
                    @endforelse
                </div>

                <div class="row mt-4">
                    @forelse ($offers as $offer)
                    @if ($offer->offer_category == 'Others')
                    <div class="col-lg-6 col-mob-6 mb-4">
                        <div class="page-inner">
                            <div class="card">
                                <div class="page-image">
                                    <img src="{{ asset('uploads/offer/'.$offer->thumb) }}" alt="">
                                </div>
                                <div class="card-body">
                                    <hr>
                                    <div class="page-terminal d-flex align-items-center justify-content-between">
                                        <div class="datetime">
                                            <i class="fa fa-calendar me-1"></i>
                                            <strong>Start Date: </strong><span>{{ date('d M Y', strtotime($offer->start_date)) }}</span>
                                        </div>
                                        <div class="datetime">
                                            <i class="fa fa-calendar me-1"></i>
                                            <strong>End Date: </strong><span>{{ date('d M Y', strtotime($offer->end_date)) }}</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="page-header">
                                        <div class="page-title">
                                            {{ $offer->name }}
                                        </div>
                                    </div>
                                    <div class="page-body">
                                        <div class="page-dscrp">
                                            {{ $offer->short_description }}
                                        </div>
                                    </div>
                                </div>
                                <div class="page-details-btn">
                                    <a href="{{ url('offers/offer-details/'.$offer->slug) }}" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @empty
                    <div class="col-lg-12">
                        No Offers Record Available!
                    </div>
                    @endforelse
                </div>
            </div>
            @endif

            @if ($page->name == 'FAQ')
            <div class="row mt-4">
                <div class="col-lg-3">
                    <div class="nav flex-column nav-pills nav-pill-div me-0 me-lg-0 mb-3 mb-lg-0" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="general_information-tab" data-bs-toggle="pill" data-bs-target="#general_information" type="button" role="tab" aria-controls="general_information" aria-selected="true">General Information</button>
                        <button class="nav-link" id="reservations-tab" data-bs-toggle="pill" data-bs-target="#reservations" type="button" role="tab" aria-controls="reservations" aria-selected="false">Reservations</button>
                        <button class="nav-link" id="best_rate_guarantee-tab" data-bs-toggle="pill" data-bs-target="#best_rate_guarantee" type="button" role="tab" aria-controls="best_rate_guarantee" aria-selected="false">Best Rate Guarantee</button>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="general_information" role="tabpanel" aria-labelledby="general_information-tab">
                            @foreach ($faqs as $faq)
                            @if ($faq->faq_type == 'General Information')
                            <div class="accordion-item mb-2">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $faq->slug }}" aria-expanded="false" aria-controls="{{ $faq->slug }}">
                                        {{ $faq->question }}
                                    </button>
                                </h2>
                                <div id="{{ $faq->slug }}" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {{ $faq->answer }}
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="reservations" role="tabpanel" aria-labelledby="reservations-tab">
                            @foreach ($faqs as $faq)
                            @if ($faq->faq_type == 'Reservations')
                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $faq->slug }}" aria-expanded="false" aria-controls="{{ $faq->slug }}">
                                        {{ $faq->question }}
                                    </button>
                                </h2>
                                <div id="{{ $faq->slug }}" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {{ $faq->answer }}
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="best_rate_guarantee" role="tabpanel" aria-labelledby="best_rate_guarantee-tab">
                            @foreach ($faqs as $faq)
                            @if ($faq->faq_type == 'Best Rate Guarantee')
                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $faq->slug }}" aria-expanded="false" aria-controls="{{ $faq->slug }}">
                                        {{ $faq->question }}
                                    </button>
                                </h2>
                                <div id="{{ $faq->slug }}" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {{ $faq->answer }}
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if ($page->name == 'Rooms')
            <div class="row mt-4">
                @forelse ($rooms as $room)
                <div class="col-lg-6 mb-4">
                    <div class="card">
                        <div class="page-image">
                            @if (count($room->roomImages) > 0)
                            @foreach ($room->roomImages as $roomImage)
                            <img src="{{ asset($roomImage->image) }}" alt="">
                            @break
                            @endforeach
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="page-header">
                                <div class="page-title">
                                    {{ $room->name }}
                                </div>
                                @if ($room->has_discount == 1)
                                <div class="page-price">
                                    <div class="previous-price">
                                        <h5>{{ '$'.$room->price.'++' }} <span>/ night</span></h5>
                                    </div>
                                    <div class="discount-price">
                                        <h5>{{ '$'.$room->discount_price.'++' }} <span>/ night</span></h5>
                                        <h6>{{ $room->discount_rate.'%' }}<span>off</span></h6>
                                    </div>
                                </div>
                                @else
                                <div class="page-price">
                                    <div class="actual-price">
                                        <h5>{{ '$'.$room->price.'++' }} <span>/ night</span></h5>
                                        <h6>Rack Rate</h6>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="page-body">
                                <div class="page-dscrp">
                                    {{ $room->short_description }}
                                </div>
                                <div class="page-detail">
                                    <div class="page-capacity">
                                        <span>
                                            <strong>Max. Guest:</strong> {{ $room->max_adults + $room->max_childs }} person(s)
                                        </span>
                                    </div>
                                    <div class="page-availability">
                                        @if (count($room->bookings) > 0)
                                        <span class="badge badge-sm bg-danger">Occupied</span>
                                        @else
                                        <span class="badge badge-sm bg-success">Available</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="page-details-btn">
                            <a href="{{ url('rooms/room-details/'.$room->slug) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="row mt-4">
                    <div class="col-lg-12">
                        No Rooms Record Available!
                    </div>
                </div>
                @endforelse
            </div>
            @endif

            @if ($page->name == 'Restaurants')
            <div class="row mt-4">
                @forelse ($restaurants as $restaurant)
                <div class="col-lg-3 mb-4">
                    <div class="card restaurant">
                        @if (!$restaurant->logo_image == NULL)
                        <div class="page-image logo">
                            <img src="{{ asset('uploads/restaurents/logo/'.$restaurant->logo_image) }}" alt="">
                        </div>
                        <div class="page-loaction">
                            {{ $restaurant->name }}
                        </div>
                        @else
                        <div class="page-image">
                            @if (count($restaurant->restaurantImages) > 0)
                            @foreach ($restaurant->restaurantImages as $restaurantImage)
                            <img src="{{ asset($restaurantImage->image) }}" alt="">
                            @break
                            @endforeach
                            @endif
                        </div>
                        <div class="page-loaction">
                            {{ $restaurant->name }}
                        </div>
                        @endif
                        <div class="page-details-btn">
                            <a href="{{ url('restaurants/restaurant-details/'.$restaurant->slug) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="row mt-4">
                    <div class="col-lg-12">
                        No Restaurants Record Available!
                    </div>
                </div>
                @endforelse
            </div>
            @endif

            @if ($page->name == 'Halls')
            <div class="row mt-4">
                @forelse ($halls as $hall)
                <div class="col-lg-4 mb-4">
                    <div class="card hall">
                        @if (!$hall->logo_image == NULL)
                        <div class="page-image logo">
                            <img src="{{ asset('uploads/halls/logo/'.$hall->logo_image) }}" alt="">
                        </div>
                        @else
                        <div class="page-image">
                            @if (count($hall->hallImages) > 0)
                            @foreach ($hall->hallImages as $hallImage)
                            <img src="{{ asset($hallImage->image) }}" alt="">
                            @break
                            @endforeach
                            @endif
                        </div>
                        <div class="page-loaction">
                            {{ $hall->name }}
                        </div>
                        @endif

                        <div class="page-details-btn">
                            <a href="{{ url('halls/hall-details/'.$hall->slug) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="row mt-4">
                    <div class="col-lg-12">
                        No Halls Record Available!
                    </div>
                </div>
                @endforelse
            </div>
            @endif

            @if ($page->name == 'Wellness')
            <div class="row mt-4">
                @forelse ($wellnesses as $wellness)
                <div class="col-lg-4 mb-4">
                    <div class="card wellness">
                        @if (!$wellness->logo_image == NULL)
                        <div class="page-image logo">
                            <img src="{{ asset('uploads/wellness/logo/'.$wellness->logo_image) }}" alt="">
                        </div>
                        <div class="page-loaction">
                            {{ $wellness->name }}
                        </div>
                        @else
                        <div class="page-image">
                            @if (count($wellness->wellnessImages) > 0)
                            @foreach ($wellness->wellnessImages as $wellnessImage)
                            <img src="{{ asset($wellnessImage->image) }}" alt="">
                            @break
                            @endforeach
                            @endif
                        </div>
                        <div class="page-loaction">
                            {{ $wellness->name }}
                        </div>
                        @endif

                        <div class="page-details-btn">
                            <a href="{{ url('wellness/wellness-details/'.$wellness->slug) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="row mt-4">
                    <div class="col-lg-12">
                        No Restaurants Record Available!
                    </div>
                </div>
                @endforelse
            </div>
            @endif

            @if ($page->name == 'Certificates & Awards')
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="hotel-policy-div">
                        {!! html_entity_decode($page->long_description) !!}
                    </div>
                </div>
            </div>
            @endif

            @if ($page->name == 'Booking Cancelation Policy')
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="hotel-policy-div">
                        {!! html_entity_decode($page->long_description) !!}
                    </div>
                </div>
            </div>
            @endif

            @if ($page->name == 'Privacy Policy')
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="hotel-policy-div">
                        {!! html_entity_decode($page->long_description) !!}
                    </div>
                </div>
            </div>
            @endif

            @if ($page->name == 'Terms & Conditions')
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="hotel-policy-div">
                        {!! html_entity_decode($page->long_description) !!}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection

@endif
