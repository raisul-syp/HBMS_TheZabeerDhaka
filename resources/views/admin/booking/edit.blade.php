@extends('layouts.admin')
@section('title', 'Edit Booking')

@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h2 class="page-header-title">{{ __('Edit Booking') }}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Bookings') }}</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('Edit Booking') }}</a></li>
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
            <form action="{{ url('admin/booking/edit/'.$booking->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

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
                                    <option value="{{ $guest->id }}" {{ old('guest_id', $booking->guest_id) == $guest->id ? 'selected' : '' }}>{{ $guest->first_name.' '.$guest->last_name }}</option>
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
                                    <option value="{{ $staff->id }}" {{ old('guest_id', $booking->staff_id) == $staff->id ? 'selected' : '' }}>{{ $staff->first_name.' '.$staff->last_name }}</option>
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
                                <input type="date" class="form-control checkin-date" id="checkin_date" name="checkin_date" value="{{ $booking->checkin_date }}">
                                @error('checkin_date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-sm-5">
                                <input type="time" class="form-control" id="checkin_time" name="checkin_time" value="{{ $booking->checkin_time }}">
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
                                <input type="date" class="form-control checkout-date" id="checkout_date" name="checkout_date" value="{{ $booking->checkout_date }}">
                                @error('checkout_date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-sm-5">
                                <input type="time" class="form-control" id="checkout_time" name="checkout_time" value="{{ $booking->checkout_time }}">
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
                                    <option value="1" {{ old('total_adults', $booking->total_adults) == '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ old('total_adults', $booking->total_adults) == '2' ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ old('total_adults', $booking->total_adults) == '3' ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ old('total_adults', $booking->total_adults) == '4' ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ old('total_adults', $booking->total_adults) == '5' ? 'selected' : '' }}>5</option>
                                    <option value="6" {{ old('total_adults', $booking->total_adults) == '6' ? 'selected' : '' }}>6</option>
                                    <option value="7" {{ old('total_adults', $booking->total_adults) == '7' ? 'selected' : '' }}>7</option>
                                    <option value="8" {{ old('total_adults', $booking->total_adults) == '8' ? 'selected' : '' }}>8</option>
                                </select>
                                @error('total_adults')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-sm-5">
                                <select class="form-control js-basic-single" id="total_childs" name="total_childs">
                                    <option selected disabled>--Select Total Childs--</option>
                                    <option value="0" {{ old('total_childs', $booking->total_childs) == '0' ? 'selected' : '' }}>0</option>
                                    <option value="1" {{ old('total_childs', $booking->total_childs) == '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ old('total_childs', $booking->total_childs) == '2' ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ old('total_childs', $booking->total_childs) == '3' ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ old('total_childs', $booking->total_childs) == '4' ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ old('total_childs', $booking->total_childs) == '5' ? 'selected' : '' }}>5</option>
                                    <option value="6" {{ old('total_childs', $booking->total_childs) == '6' ? 'selected' : '' }}>6</option>
                                    <option value="7" {{ old('total_childs', $booking->total_childs) == '7' ? 'selected' : '' }}>7</option>
                                    <option value="8" {{ old('total_childs', $booking->total_childs) == '8' ? 'selected' : '' }}>8</option>
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
                                    @forelse ($rooms as $room)
                                    <option value="{{ $room->id }}" {{ old('guest_id', $booking->room_id) == $room->id ? 'selected' : '' }}>{{ $room->name }}</option>
                                    @empty
                                    <option>No Data</option>
                                    @endforelse
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
                                    <option value="0" {{ old('booking_status', $booking->booking_status) == '0' ? 'selected' : '' }}>Pending</option>
                                    <option value="1" {{ old('booking_status', $booking->booking_status) == '1' ? 'selected' : '' }}>Booked</option>
                                    <option value="2" {{ old('booking_status', $booking->booking_status) == '2' ? 'selected' : '' }}>Cancel</option>
                                    <option value="3" {{ old('booking_status', $booking->booking_status) == '3' ? 'selected' : '' }}>Payment Pending</option>
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
                                    <option value="Pay on arrival" {{ old('payment_mode', $booking->payment_mode) == 'Pay on arrival' ? 'selected' : '' }}>Pay on arrival</option>
                                    <option value="Card" {{ old('payment_mode', $booking->payment_mode) == 'Card' ? 'selected' : '' }}>Card</option>
                                    <option value="Mobile Banking" {{ old('payment_mode', $booking->payment_mode) == 'Mobile Banking' ? 'selected' : '' }}>Mobile Banking</option>
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
                                <textarea class="form-control" id="booking_comment" name="booking_comment" rows="5" placeholder="Add booking comment...">{{ $booking->booking_comment }}</textarea>
                            </div>
                        </div>

                        <input type="text" hidden id="updated_by" name="updated_by" value="{{ Auth::guard('admin')->user()->role_as }}">
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary text-uppercase text-right">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
