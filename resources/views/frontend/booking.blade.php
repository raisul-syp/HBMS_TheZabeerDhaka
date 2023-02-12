@extends('layouts.guest')
@section('title', 'Room Booking')
@foreach ($settings as $setting)
@section('meta_decription', "$setting->meta_decription")
@section('meta_keyword', "$setting->meta_keyword")
@endforeach

@section('content')
<section id="about_section" class="about_section content_section" style="padding: 40px 0;">
    <div class="about_section_inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title">
                        <h4>Room Booking</h4>
                    </div>
                    <div class="section_breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Room Booking</a></li>
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
                    <form action="{{ url('/booking') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="booking-form-inner">
                            <div class="card">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <div class="form-title">
                                        <h4>{{ __('Booking Form') }}</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-2 col-form-label text-right">
                                            {{ __('Checkin Date & Time') }}
                                        </label>
                                        <div class="col-sm-5">
                                            <div class="input-wrapper">
                                                <input type="date" class="form-control checkin-date" id="checkin_date" name="checkin_date" value="{{ $todayDate }}">
                                                <span class="lnr lnr-calendar-full icon"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="input-wrapper">
                                                <input type="time" class="form-control" id="checkin_time" name="checkin_time" value="14:00">
                                                <span class="lnr lnr-clock icon"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-2 col-form-label text-right">
                                            {{ __('Checkout Date & Time') }}
                                        </label>
                                        <div class="col-sm-5">
                                            <div class="input-wrapper">
                                                <input type="date" class="form-control checkout-date" id="checkout_date" name="checkout_date" value="{{ $tomorrowDate }}">
                                                <span class="lnr lnr-calendar-full icon"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="input-wrapper">
                                                <input type="time" class="form-control" id="checkout_time" name="checkout_time" value="12:00">
                                                <span class="lnr lnr-clock icon"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-2 col-form-label text-right">
                                            {{ __('Total Guest') }}
                                        </label>
                                        <div class="col-sm-5">
                                            <select class="form-control" id="total_adults" name="total_adults">
                                                <option selected disabled>--Select Total Adults--</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-5">
                                            <select class="form-control" id="total_childs" name="total_childs">
                                                <option selected disabled>--Select Total Childs--</option>
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
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-2 col-form-label text-right" for="room_id">
                                            {{ __('Available Rooms') }}
                                        </label>
                                        <div class="col-sm-10">
                                            <select class="form-control room-list" id="room_id" name="room_id">
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-2 col-form-label text-right" for="payment_mode">
                                            {{ __('Payment Mode') }}
                                        </label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="payment_mode" name="payment_mode">
                                                <option value="Pay on arrival">Pay on arrival</option>
                                                {{-- <option value="Card" disabled>Card</option>
                                                <option value="Mobile Banking" disabled>Mobile Banking</option> --}}
                                            </select>
                                        </div>
                                    </div> 
                                    <input id="guest_id" name="guest_id" value="{{ Auth::user()->id }}" hidden>
                                    <input id="staff_id" name="staff_id" value="1" hidden>
                                    <input id="booking_status" name="booking_status" value="0" hidden>
                                    <input id="booking_comment" name="booking_comment" value="Booking created by Guest" hidden>
                                    <input id="created_by" name="created_by" value="6" hidden>
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


@section('scripts')
{{-- <script type="text/javascript">
    $(document).ready(function(){
        $(".checkin-date").on('blur',function(){
            var _checkindate = $(this).val();

            // Ajax
            $.ajax({
                url: "{{ url('booking') }}/available-rooms/"+_checkindate,
                type: 'get',
                dataType: 'json',
                beforeSend: function(){
                    $(".room-list").html('<option>Loading...</option>');
                },
                success: function(res){
                    var _html = '';
                    $.each(res.data,function(index,row){
                        _html +='<option value="'+row.id+'">'+row.name+" ("+row.quantity+" rooms are available)</option>";
                    });
                    $(".room-list").html(_html);
                }
            });
        });
    });
</script> --}}

<script type="text/javascript">
    $(document).ready(function(){
        $(".checkin-date").on('blur',function(){
            var _checkindate = $(this).val();
            var _checkoutdate = $(".checkout-date").val();

            // Ajax
            $.ajax({
                url: "{{ url('booking') }}/available-rooms/"+_checkindate + "/" + _checkoutdate,
                type: 'get',
                dataType: 'json',
                beforeSend: function(){
                    $(".room-list").html('<option>Loading...</option>');
                },
                success: function(res){
                    var _html = '';
                    $.each(res.data,function(index,row){
                        _html +='<option value="'+row.id+'">'+row.name+" ( "+row.available_quantity+" rooms are available out of "+row.quantity+" )</option>";
                    });
                    $(".room-list").html(_html);
                }
            });
        });
    });
</script>
@endsection

@endsection
