@extends('layouts.guest')
@section('title', 'Confirm Booking')

@section('content')
<section id="about_section" class="about_section content_section" style="padding: 40px 0;">
    <div class="about_section_inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title">
                        <h4>Confirm Booking</h4>
                    </div>
                    <div class="section_breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Confirm Booking</a></li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    @if (session('message'))
                        <div class="alert alert-success solid alert-right-icon alert-dismissible fade show mb-0 mt-3">
                            <span><i class="fas fa-check"></i></span>
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-12">
                    <form action="{{ url('/confirm-booking') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="booking-form-inner">
                            <div class="card">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <div class="form-title">
                                        <h4>{{ __('Booking Details') }}</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12 mb-4">
                                            <h4 class="confirm-booking-card-header">Booking Schedule</h4>

                                            <div class="form-group row mb-2">
                                                <label class="col-sm-2 col-form-label text-right">
                                                    {{ __('Checkin Date') }}
                                                </label>
                                                <div class="col-sm-4">
                                                    <p class="confirm-booking-text">{{ date('d F Y', strtotime($checkin_date)) }}</p>
                                                </div>
                                                <label class="col-sm-2 col-form-label text-right">
                                                    {{ __('Checkout Date') }}
                                                </label>
                                                <div class="col-sm-4">
                                                    <p class="confirm-booking-text">{{ date('d F Y', strtotime($checkout_date)) }}</p>
                                                </div>
                                            </div> 

                                            <div class="form-group row mb-2">
                                                <label class="col-sm-2 col-form-label text-right">
                                                    {{ __('Total Adults') }}
                                                </label>
                                                <div class="col-sm-4">
                                                    <p class="confirm-booking-text">{{ $total_adults }} person(s)</p>
                                                </div>
                                                <label class="col-sm-2 col-form-label text-right">
                                                    {{ __('Total Childs') }}
                                                </label>
                                                <div class="col-sm-4">
                                                    <p class="confirm-booking-text">{{ $total_childs }} person(s)</p>
                                                </div>
                                            </div> 

                                            <div class="form-group row mb-3">
                                                <label class="col-sm-2 col-form-label text-right">
                                                    {{ __('Checkin Time') }}
                                                </label>
                                                <div class="col-sm-4">
                                                    <div class="input-wrapper">
                                                        <input type="time" class="form-control" id="checkin_time" name="checkin_time" value="14:00">
                                                        <span class="lnr lnr-clock icon"></span>
                                                    </div>
                                                </div>
                                                <label class="col-sm-2 col-form-label text-right">
                                                    {{ __('Checkout Time') }}
                                                </label>
                                                <div class="col-sm-4">
                                                    <div class="input-wrapper">
                                                        <input type="time" class="form-control" id="checkout_time" name="checkout_time" value="12:00">
                                                        <span class="lnr lnr-clock icon"></span>
                                                    </div>
                                                </div>                                         
                                            </div>                                            
                                        </div>

                                        <div class="col-lg-5">
                                            <h4 class="confirm-booking-card-header">Room Details</h4>          

                                            @foreach ($rooms as $room)
                                            @if ($room->id == $room_id)
                                            <div class="form-group row mb-2">
                                                <label class="col-sm-3 col-form-label text-right">
                                                    {{ __('Room Name') }}
                                                </label>
                                                <div class="col-sm-9">
                                                    <p class="confirm-booking-text">{{ $room->name }}</p>
                                                </div>
                                            </div>    
                                            
                                            <div class="form-group row mb-2">
                                                <label class="col-sm-3 col-form-label text-right">
                                                    {{ __('Max. Adults') }}
                                                </label>
                                                <div class="col-sm-9">
                                                    <p class="confirm-booking-text">{{ $room->max_adults }} person(s)</p>
                                                </div>
                                            </div>     
                                            
                                            <div class="form-group row mb-2">
                                                <label class="col-sm-3 col-form-label text-right">
                                                    {{ __('Max. Childs') }}
                                                </label>
                                                <div class="col-sm-9">
                                                    <p class="confirm-booking-text">{{ $room->max_childs }} person(s)</p>
                                                </div>
                                            </div>       
                                            
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label text-right">
                                                    {{ __('Price') }}
                                                </label>
                                                <div class="col-sm-9">
                                                    <p class="confirm-booking-text">{{ '$'.$room->price.'++ /night' }}</p>
                                                </div>
                                            </div>                                         
                                            @endif
                                            @endforeach                                        
                                        </div>

                                        <div class="col-lg-4">
                                            <h4 class="confirm-booking-card-header">Guest Details</h4>
                                            
                                            <div class="form-group row mb-2">
                                                <label class="col-sm-3 col-form-label text-right">
                                                    {{ __('Name') }}
                                                </label>
                                                <div class="col-sm-9">
                                                    <p class="confirm-booking-text">{{ Auth::user()->first_name.' '.Auth::user()->last_name }}</p>
                                                </div>
                                            </div>  
                                            
                                            <div class="form-group row mb-2">
                                                <label class="col-sm-3 col-form-label text-right">
                                                    {{ __('Email') }}
                                                </label>
                                                <div class="col-sm-9">
                                                    <p class="confirm-booking-text">{{ Auth::user()->email }}</p>
                                                </div>
                                            </div>  
                                            
                                            <div class="form-group row mb-2">
                                                <label class="col-sm-3 col-form-label text-right">
                                                    {{ __('Phone') }}
                                                </label>
                                                <div class="col-sm-9">
                                                    <p class="confirm-booking-text">{{ Auth::user()->phone }}</p>
                                                </div>
                                            </div>   
                                            
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label text-right">
                                                    {{ __('Address') }}
                                                </label>
                                                <div class="col-sm-9">
                                                    <p class="confirm-booking-text">{{ Auth::user()->address.', '.Auth::user()->city.', '.Auth::user()->state.'-'.Auth::user()->postal_code.', '.Auth::user()->country }}</p>
                                                </div>
                                            </div> 
                                        </div>

                                        <div class="col-lg-3">
                                            <h4 class="confirm-booking-card-header">Payment Mode</h4>
                                            
                                            <div class="form-group row">
                                                <div class="col-sm-12 mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="payment_mode" id="flexRadioDefault1" value="Pay on arrival" checked>
                                                        <label class="form-check-label" for="payment_mode">
                                                            {{ __('Pay on arrival') }}
                                                        </label>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-sm-12 mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="payment_mode" id="flexRadioDefault2" value="Card" disabled>
                                                        <label class="form-check-label" for="payment_mode">
                                                            {{ __('Card') }}
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="payment_mode" id="flexRadioDefault3" value="Mobile Banking" disabled>
                                                        <label class="form-check-label" for="payment_mode">
                                                            {{ __('Mobile Banking') }}
                                                        </label>
                                                    </div>
                                                </div> --}}
                                            </div>  
                                        </div>
                                        
                                    <input id="guest_id" name="guest_id" value="{{ Auth::user()->id }}" hidden>
                                    <input type="text" id="room_id" name="room_id" value="{{ $room_id }}" hidden>   
                                    <input id="staff_id" name="staff_id" value="1" hidden>                                    
                                    <input id="checkin_date" name="checkin_date" value="{{ $checkin_date }}" hidden>
                                    <input id="checkout_date" name="checkout_date" value="{{ $checkout_date }}" hidden>
                                    <input id="total_adults" name="total_adults" value="{{ $total_adults }}" hidden>
                                    <input id="total_childs" name="total_childs" value="{{ $total_childs }}" hidden>
                                    <input id="booking_status" name="booking_status" value="3" hidden>
                                    <input id="booking_comment" name="booking_comment" value="Booking created by Guest" hidden>
                                    <input id="created_by" name="created_by" value="6" hidden>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary front-btn-booking text-uppercase">
                                            {{ __('Book') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>




@endsection
