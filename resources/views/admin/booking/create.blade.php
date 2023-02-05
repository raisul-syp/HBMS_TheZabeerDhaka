@extends('layouts.admin')
@section('title', 'Create A New Booking')

@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h2 class="page-header-title">{{ __('Create A New Booking') }}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Bookings') }}</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('Add Booking') }}</a></li>
                </ol>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <a href="{{ url('admin/booking') }}" class="btn btn-dark text-white">{{ __('Back To List') }}</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    @include('alertMessage.admin.error')
                @endforeach
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form action="{{ url('admin/booking') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="form-title">
                            <h4>{{ __('Booking Form') }}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right" for="guest_id">
                                {{ __('Guest') }}
                                <small class="text-danger">*</small>
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control js-basic-single" id="guest_id" name="guest_id">
                                    <option selected disabled>--Select Guest--</option>
                                    @forelse ($guests as $guest)
                                    <option value="{{ $guest->id }}">{{ $guest->first_name.' '.$guest->last_name }}</option>
                                    @empty
                                    <option>No Data</option>
                                    @endforelse
                                </select>
                                @error('guest_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right" for="staff_id">
                                {{ __('Booked By') }}
                                <small class="text-danger">*</small>
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control js-basic-single" id="staff_id" name="staff_id">
                                    <option selected disabled>--Select Staff--</option>
                                    @forelse ($staffs as $staff)
                                    <option value="{{ $staff->id }}">{{ $staff->first_name.' '.$staff->last_name }}</option>
                                    @empty
                                    <option>No Data</option>
                                    @endforelse
                                </select>
                                @error('staff_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">
                                {{ __('Checkin Date & Time') }}
                                <small class="text-danger">*</small>
                            </label>
                            <div class="col-sm-5">
                                <input type="date" class="form-control checkin-date" id="checkin_date" name="checkin_date" value="{{ $todayDate }}">
                                @error('checkin_date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-sm-5">
                                <input type="time" class="form-control" id="checkin_time" name="checkin_time" value="14:00">
                                @error('checkin_time')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">
                                {{ __('Checkout Date & Time') }}
                                <small class="text-danger">*</small>
                            </label>
                            <div class="col-sm-5">
                                <input type="date" class="form-control checkout-date" id="checkout_date" name="checkout_date" value="{{ $tomorrowDate }}">
                                @error('checkout_date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-sm-5">
                                <input type="time" class="form-control" id="checkout_time" name="checkout_time" value="12:00">
                                @error('checkout_time')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">
                                {{ __('Total Guest') }}
                                <small class="text-danger">*</small>
                            </label>
                            <div class="col-sm-5">
                                <select class="form-control js-basic-single" id="total_adults" name="total_adults">
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
                                @error('total_adults')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-sm-5">
                                <select class="form-control js-basic-single" id="total_childs" name="total_childs">
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
                                @error('total_childs')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right" for="room_id">
                                {{ __('Available Rooms') }}
                                <small class="text-danger">*</small>
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control js-basic-single room-list" id="room_id" name="room_id">
                                </select>
                                @error('room_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right" for="booking_status">
                                {{ __('Booking Status') }}
                                <small class="text-danger">*</small>
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control js-basic-single" id="booking_status" name="booking_status">
                                    <option value="0">Pending</option>
                                    <option value="1">Booked</option>
                                    <option value="2">Cancel</option>
                                    <option value="3">Payment Pending</option>
                                </select>
                                @error('booking_status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right" for="payment_mode">
                                {{ __('Payment Mode') }}
                                <small class="text-danger">*</small>
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control js-basic-single" id="payment_mode" name="payment_mode">
                                    <option value="Pay on arrival">Pay on arrival</option>
                                    <option value="Card">Card</option>
                                    <option value="Mobile Banking">Mobile Banking</option>
                                </select>
                                @error('payment_mode')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right" for="booking_comment">
                                {{ __('Booking Comment') }}
                            </label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="booking_comment" name="booking_comment" rows="5" placeholder="Add booking comment..."></textarea>
                            </div>
                        </div>

                        <input type="text" hidden id="created_by" name="created_by" value="{{ Auth::guard('admin')->user()->role_as }}">
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary text-uppercase text-right">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>


@section('scripts')
{{-- <script type="text/javascript">
    $(document).ready(function(){
        $(".checkin-date").on('blur',function(){
            var _checkindate = $(this).val();

            // Ajax
            $.ajax({
                url: "{{ url('admin/booking') }}/available-rooms/"+_checkindate,
                type: 'get',
                dataType: 'json',
                beforeSend: function(){
                    $(".room-list").html('<option>Loading...</option>');
                },
                success: function(res){
                    var _html = '';
                    $.each(res.data,function(index,row){
                        _html +='<option value="'+row.id+'">'+row.name+" - "+row.quantity+" rooms are available</option>";
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
            var checkout_date = $(".checkout-date").val();

            // Ajax
            $.ajax({
                url: "{{ url('admin/booking') }}/available-rooms/"+_checkindate + "/" + checkout_date,
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
