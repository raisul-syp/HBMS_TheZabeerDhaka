@extends('layouts.admin')
@section('title', 'Admin Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Hi {{ Auth::guard('admin')->user()->first_name }}, welcome back!</h4>
                <p class="mb-0">Your business dashboard template</p>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Layout</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-sm-12">
            @if (session('message'))
                @include('alertMessage.admin.success')
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-one card-body">
                    <div class="stat-icon d-inline-block">
                        <i class="ti-home text-success border-success"></i>
                    </div>
                    <div class="stat-content d-inline-block">
                        @forelse ($rooms->slice(0,1) as $room)
                        <div class="stat-text">Rooms</div>
                        <div class="stat-digit">{{ $room->count() }}</div>                      
                        @empty
                        <div class="stat-text">Rooms</div>
                        <div class="stat-digit">0</div>                      
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-one card-body">
                    <div class="stat-icon d-inline-block">
                        <i class="ti-briefcase text-primary border-primary"></i>
                    </div>
                    <div class="stat-content d-inline-block">
                        @forelse ($guests->slice(0,1) as $guest)
                        <div class="stat-text">Guests</div>
                        <div class="stat-digit">{{ $guest->count() }}</div>                      
                        @empty
                        <div class="stat-text">Guests</div>
                        <div class="stat-digit">0</div>                      
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-one card-body">
                    <div class="stat-icon d-inline-block">
                        <i class="ti-gift text-pink border-pink"></i>
                    </div>
                    <div class="stat-content d-inline-block">
                        @forelse ($offers->slice(0,1) as $offer)
                        <div class="stat-text">Offers</div>
                        <div class="stat-digit">{{ $offer->count() }}</div>                      
                        @empty
                        <div class="stat-text">Offers</div>
                        <div class="stat-digit">0</div>                      
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-one card-body">
                    <div class="stat-icon d-inline-block">
                        <i class="ti-bookmark text-danger border-danger"></i>
                    </div>
                    <div class="stat-content d-inline-block">
                        @forelse ($bookings->slice(0,1) as $booking)
                        <div class="stat-text">Bookings</div>
                        <div class="stat-digit">{{ $bookings->count() }}</div>                            
                        @empty
                        <div class="stat-text">Bookings</div>
                        <div class="stat-digit">0</div>                            
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="card-title">Bookings</h4>
                    @if (Auth::guard('admin')->user()->can('Bookings.Index'))
                    <a href="{{ url('admin/booking') }}" class="btn btn-primary btn-xs">Booking List</a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table student-data-table m-t-20">
                            <thead class="text-center bg-primary text-white">
                                <tr>
                                    <th>#</th>
                                    <th>Guest Name</th>
                                    <th>Room</th>
                                    <th>Checkin & Checkout</th>
                                    <th>Booking Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @forelse ($bookings->slice(0,5) as $booking)
                                <tr>
                                    <td>{{ $serialNoBokking++ }}</td>
                                    <td>{{ $booking->guests->first_name.' '.$booking->guests->last_name }}</td>
                                    <td>{{ $booking->rooms->name }}</td>
                                    <td>
                                        <strong>Checkin:</strong> {{ date('d F Y', strtotime($booking->checkin_date)).', '.date('h:i A', strtotime($booking->checkin_time)) }} <br>
                                        <strong>Checkout:</strong> {{ date('d F Y', strtotime($booking->checkout_date)).', '.date('h:i A', strtotime($booking->checkout_time)) }}
                                    </td>
                                    <td>
                                        @if ($booking->booking_status == 1)
                                        <span class="badge badge-success text-white">Booked</span>
                                        @elseif ($booking->booking_status == 2)
                                        <span class="badge badge-danger">Canceled</span>
                                        @else
                                        <span class="badge badge-warning text-white">Pending</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8">
                                        <h4 class="mb-0">{{ __('No Records Available!') }}</h4>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="card-title">Offers</h4>
                    @if (Auth::guard('admin')->user()->can('Offers.Index'))
                    <a href="{{ url('admin/offers') }}" class="btn btn-primary btn-xs">Offer List</a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table student-data-table m-t-20">
                            <thead class="text-center bg-primary text-white">
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Offer Schedule</th>
                                    <th>Offer Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @forelse ($offers->slice(0,5) as $offer)
                                <tr>
                                    <td>{{ $serialNoOffer++ }}</td>
                                    <td>{{ $offer->name }}</td>
                                    <td>
                                        <strong>Start:</strong> {{ date('d M Y, h:i A', strtotime($offer->start_date)) }} <br>
                                        <strong>End:</strong> {{ date('d M Y, h:i A', strtotime($offer->end_date)) }}
                                    </td>
                                    <td>
                                        @if ($offer->is_active == 1)
                                        <span class="badge badge-success text-white">Active</span>
                                        @else
                                        <span class="badge badge-warning text-white">Deactive</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8">
                                        <h4 class="mb-0">{{ __('No Records Available!') }}</h4>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="card-title">Rooms</h4>
                    @if (Auth::guard('admin')->user()->can('Rooms.Index'))
                    <a href="{{ url('admin/room') }}" class="btn btn-primary btn-xs">Room List</a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table student-data-table m-t-20">
                            <thead class="text-center bg-primary text-white">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @forelse ($rooms->slice(0,5) as $room)
                                <tr>
                                    <td>{{ $serialNoRoom++ }}</td>
                                    <td>{{ $room->name }}</td>
                                    <td>{{ $room->price }}</td>
                                    <td>
                                        @if ($room->is_active == '1')
                                            <span class="badge badge-success text-white">Active</span>
                                        @else
                                            <span class="badge badge-danger">Deactive</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10">
                                        <h4 class="mb-0">{{ __('No Records Available!') }}</h4>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="card-title">Guests</h4>
                    @if (Auth::guard('admin')->user()->can('Guests.Index'))
                    <a href="{{ url('admin/guest') }}" class="btn btn-primary btn-xs">Guest List</a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table student-data-table m-t-20">
                            <thead class="text-center bg-primary text-white">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @forelse ($guests->slice(0,5) as $guest)
                                <tr>
                                    <td>{{ $serialNoGuest++ }}</td>
                                    <td>{{ $guest->first_name.' '.$guest->last_name }}</td>
                                    <td>{{ $guest->email }}</td>
                                    <td>
                                        @if ($guest->is_active == '1')
                                            <span class="badge badge-success text-white">Active</span>
                                        @else
                                            <span class="badge badge-danger">Deactive</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9">
                                        <h4 class="mb-0">{{ __('No Records Available!') }}</h4>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
