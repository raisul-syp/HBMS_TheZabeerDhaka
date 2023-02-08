@extends('layouts.guest')
@section('title', 'Room Details')

@section('content')
<section id="page_details_section_frontend" class="page_details_section_frontend content_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title">
                    <h4>Room Details</h4>
                </div>
                <div class="section_breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ url('rooms') }}">{{ __('Rooms') }}</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('Room Details') }}</a></li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-9">
                <div class="page-details-inner">
                    <div class="card">
                        <div class="owl-carousel owl-theme page-details-carousel">
                            @if (count($room->roomImages) > 0)
                            @foreach ($room->roomImages as $roomImage)
                            <div class="item">
                                <img src="{{ asset($roomImage->image) }}" alt="">
                            </div>
                            @endforeach
                            @endif
                        </div>

                        <div class="card-body">
                            <div class="page-header">
                                <div class="page-title">
                                    {{ $room->name }}
                                </div>
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

                            <hr>
                            <div class="row">
                                <div class="col-lg-6 col-mob-6">
                                    <div class="page-capacity">
                                        <i class="fas fa-user"></i> <strong>Max. Guest:</strong>
                                        {{ $room->max_adults + $room->max_childs }} person(s)
                                    </div>
                                </div>
                                {{-- <div class="col-lg-6 col-mob-6">
                                    <div class="page-availability">
                                        @if (count($room->bookings) > 0)
                                        <span class="badge bg-danger">Occupied</span>
                                        @else
                                        <span class="badge bg-success">Available</span>
                                        @endif
                                    </div>
                                </div> --}}
                            </div>
                            <hr>

                            <div class="page-description">
                                <div class="short-descrp">
                                    {{ $room->short_description }}
                                </div>
                                <div class="long-descrp">
                                    {!! html_entity_decode($room->long_description) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="page-facilities-sec">
                                        <div class="row">
                                            <div class="col-lg-12 mb-2">
                                                <h4>Facilities</h4>
                                                <hr>
                                            </div>
                                            @forelse ($room->facilities as $roomFacility)
                                            <div class="col-lg-6 col-mob-6">
                                                <div class="page-facilities mb-3">
                                                    <img src="{{ asset('uploads/facilities/'.$roomFacility->image) }}">
                                                    <span>{{ $roomFacility->name }}</span>
                                                </div>
                                            </div>
                                            @empty
                                            <div class="col-lg-12">
                                                <small class="text-danger">No Facilities Available!</small>
                                            </div>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="page-facilities-sec">
                                        <div class="row">
                                            <div class="col-lg-12 mb-2">
                                                <h4>Room View</h4>
                                                <hr>
                                            </div>
                                            @forelse ($room->roomViews as $roomView)
                                            <div class="col-lg-6 col-mob-6">
                                                <div class="page-views mb-3">
                                                    <img src="{{ asset('uploads/roomviews/'.$roomView->image) }}">
                                                    <span>{{ $roomView->name }}</span>
                                                </div>
                                            </div>
                                            @empty
                                            <div class="col-lg-12">
                                                <small class="text-danger">No Views Available!</small>
                                            </div>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="booking-btn mb-3">
                    @if (Auth::user())
                    <a class="btn btn-primary" href="{{ url('/booking') }}">
                        {{ _('Book Now') }}
                    </a>
                    @else
                    <a class="btn btn-primary" href="{{ route('login') }}">
                        {{ _('Book Now') }}
                    </a>
                    </li>
                    @endif
                </div>
                <div class="roomAvailability-form mb-4 mb-lg-0">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true">Check Room Availability</button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <form action="{{ url('available-rooms') }}" method="GET">
                                        <div class="row">
                                            <div class="form_input col-12 mb-3">
                                                <div class="input-wrapper">
                                                    <input type="date" class="form-control check-in-out"
                                                        id="checkin_date" name="checkin_date"
                                                        value="{{ $todayDate }}">
                                                    <span class="lnr lnr-calendar-full icon"></span>
                                                </div>
                                            </div>
                                            <div class="form_input col-12 mb-3">
                                                <div class="input-wrapper">
                                                    <input type="date" class="form-control check-in-out"
                                                        id="checkout_date" name="checkout_date"
                                                        value="{{ $tomorrowDate }}">
                                                    <span class="lnr lnr-calendar-full icon"></span>
                                                </div>
                                            </div>
                                            <div class="form_input col-12 mb-3">
                                                <div class="input-wrapper">
                                                    <select class="form-select" id="adults" name="adults">
                                                        <option value="0">0</option>
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
                                            <div class="form_input col-12 mb-3">
                                                <div class="input-wrapper">
                                                    <select class="form-select" id="children" name="children">
                                                        <option value="0">0</option>
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
                                            <div class="form_input submit_btn col-12">
                                                <button type="submit" class="btn btn-primary btn-block">Check
                                                    Availability</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
