@extends('layouts.guest')
@section('title', 'Offer Details')

@section('content')
<section id="page_details_section_frontend" class="page_details_section_frontend content_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title">
                    <h4>Offer Details</h4>
                </div>
                <div class="section_breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ url('offers') }}">{{ __('Offers') }}</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('Offers Details') }}</a></li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-9">
                <div class="page-details-inner">
                    <div class="card">
                        <div class="owl-carousel owl-theme page-details-carousel">
                            <div class="item">
                                <img src="{{ asset('uploads/offer/'.$offer->thumb) }}" alt="">
                            </div>
                        </div>

                        <div class="card-body">
                            <hr>
                            <div class="page-terminal d-flex align-items-center justify-content-between">
                                <div class="datetime">
                                    <i class="fa fa-calendar me-1"></i>
                                    <span>{{ date('d M Y', strtotime($offer->start_date)).' - '.date('d M Y', strtotime($offer->end_date)) }}</span>
                                </div>
                                <div class="datetime">
                                    <i class="fa fa-clock me-1"></i>
                                    <span>{{ date('g:i A', strtotime($offer->start_date)).' - '.date('g:i A', strtotime($offer->end_date)) }}</span>
                                </div>
                            </div>
                            <hr>

                            <div class="page-header">
                                <div class="page-title">
                                    {{ $offer->name }}
                                </div>
                            </div>

                            <div class="page-description">
                                <div class="long-descrp">
                                    {!! html_entity_decode($offer->long_description) !!}
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
