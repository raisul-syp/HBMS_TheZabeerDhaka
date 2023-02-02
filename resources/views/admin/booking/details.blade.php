@extends('layouts.admin')
@section('title', 'Booking Details')

@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h2 class="page-header-title">{{ __('Booking Details') }}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Bookings') }}</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('Booking Details') }}</a></li>
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
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="form-title">
                        <h4>Booking Details</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="details-header">
                                <h4>Booking Information</h4>
                            </div>
                            <div class="details-body">
                                <p class="mb-0"><strong>Booking ID:</strong> <span>{{ $booking->id }}</span></p>
                                <p class="mb-0"><strong>Booking Date:</strong> <span>{{ date('d F Y, h:i A', strtotime($booking->created_at)) }}</span></p>
                                <p class="mb-0"><strong>Payment Mode:</strong> <span>{{ $booking->payment_mode }}</span></p>
                                <p class="mb-0"><strong>Booking Status:</strong>
                                    <span>
                                        @if ($booking->booking_status == '0')
                                        <span class="badge badge-outline-warning">Pending</span>
                                        @elseif ($booking->booking_status == '1')
                                        <span class="badge badge-outline-success">Booked</span>
                                        @elseif ($booking->booking_status == '2')
                                        <span class="badge badge-outline-danger">Canceled</span>
                                        @elseif ($booking->booking_status == '3')
                                        <span class="badge badge-outline-info">Payment Pending</span>
                                        @endif
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="details-header">
                                <h4>Guest Details</h4>
                            </div>
                            <div class="details-body">
                                @foreach ($guests as $guest)
                                @if ($booking->guest_id == $guest->id)
                                <p class="mb-0"><strong>Guest Name:</strong> <span>{{ $guest->first_name.' '.$guest->last_name }}</span></p>
                                <p class="mb-0"><strong>Email Address:</strong> <span>{{ $guest->email }}</span></p>
                                <p class="mb-0"><strong>Phone Number:</strong> <span>{{ $guest->phone }}</span></p>
                                <p class="mb-0"><strong>Address:</strong> <span>{{ $guest->address.', '.$guest->city.'-'.$guest->postal_code.', '.$guest->country }}</span></p>              
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="details-header">
                                <h4>Assignee Details</h4>
                            </div>
                            <div class="details-body">
                                @foreach ($staffs as $staff)
                                @if ($booking->staff_id == $staff->id)
                                <p class="mb-0"><strong>Staff Name:</strong> <span>{{ $staff->first_name.' '.$staff->last_name }}</span></p>
                                <p class="mb-0"><strong>Email Address:</strong> <span>{{ $staff->email }}</span></p>
                                <p class="mb-0"><strong>Phone Number:</strong> <span>{{ $staff->phone }}</span></p>
                                <p class="mb-0"><strong>Role:</strong>                                     
                                    @foreach ($staff->roles as $role)
                                    <span>{{ $role->name }}</span>
                                    @endforeach
                                </p>              
                                @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="col-lg-12 mt-5">
                            <div class="details-header">
                                <h4>Booking Items</h4>
                            </div>
                            <div class="details-body">
                                <table class="table table-bordered">
                                    <thead class="bg-primary text-white">
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>Room Name</th>
                                            <th>Check In</th>
                                            <th>Check Out</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rooms as $room)
                                        @if ($booking->room_id == $room->id)
                                        <tr class="text-center">
                                            <th>{{ $serialNo++ }}</th>
                                            <td>{{ $room->name }}</td>
                                            <td>
                                                {{ date('d F Y', strtotime($booking->checkin_date)) }},
                                                {{ date('h:i A', strtotime($booking->checkin_time)) }}
                                            </td>
                                            <td>
                                                {{ date('d F Y', strtotime($booking->checkout_date)) }},
                                                {{ date('h:i A', strtotime($booking->checkout_time)) }}
                                            </td>
                                            <th>{{ '$'.$room->price }}</th>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
