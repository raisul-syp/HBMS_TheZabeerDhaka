@extends('layouts.guest')
@section('title', 'Available Rooms')

@section('content')
    <section id="roomAvailability_section" class="roomAvailability_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
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
                                                            value="{{ $checkin_date }}">
                                                        <span class="lnr lnr-calendar-full icon"></span>
                                                    </div>
                                                </div>
                                                <div class="form_input col-12 mb-3">
                                                    <div class="input-wrapper">
                                                        <input type="date" class="form-control check-in-out"
                                                            id="checkout_date" name="checkout_date"
                                                            value="{{ $checkout_date }}">
                                                        <span class="lnr lnr-calendar-full icon"></span>
                                                    </div>
                                                </div>
                                                <div class="form_input col-12 mb-3">
                                                    <div class="input-wrapper">
                                                        <select class="form-select" id="adults" name="adults">
                                                            <option value="0" {{ old('adults', $total_adults) == '0' ? 'selected' : '' }}>0</option>
                                                            <option value="1" {{ old('adults', $total_adults) == '1' ? 'selected' : '' }}>1</option>
                                                            <option value="2" {{ old('adults', $total_adults) == '2' ? 'selected' : '' }}>2</option>
                                                            <option value="3" {{ old('adults', $total_adults) == '3' ? 'selected' : '' }}>3</option>
                                                            <option value="4" {{ old('adults', $total_adults) == '4' ? 'selected' : '' }}>4</option>
                                                            <option value="5" {{ old('adults', $total_adults) == '5' ? 'selected' : '' }}>5</option>
                                                            <option value="6" {{ old('adults', $total_adults) == '6' ? 'selected' : '' }}>6</option>
                                                            <option value="7" {{ old('adults', $total_adults) == '7' ? 'selected' : '' }}>7</option>
                                                            <option value="8" {{ old('adults', $total_adults) == '8' ? 'selected' : '' }}>8</option>
                                                        </select>
                                                        <span class="lnr lnr-chevron-down icon"></span>
                                                    </div>
                                                </div>
                                                <div class="form_input col-12 mb-3">
                                                    <div class="input-wrapper">
                                                        <select class="form-select" id="children" name="children">
                                                            <option value="0" {{ old('children', $total_childs) == '0' ? 'selected' : '' }}>0</option>
                                                            <option value="1" {{ old('children', $total_childs) == '1' ? 'selected' : '' }}>1</option>
                                                            <option value="2" {{ old('children', $total_childs) == '2' ? 'selected' : '' }}>2</option>
                                                            <option value="3" {{ old('children', $total_childs) == '3' ? 'selected' : '' }}>3</option>
                                                            <option value="4" {{ old('children', $total_childs) == '4' ? 'selected' : '' }}>4</option>
                                                            <option value="5" {{ old('children', $total_childs) == '5' ? 'selected' : '' }}>5</option>
                                                            <option value="6" {{ old('children', $total_childs) == '6' ? 'selected' : '' }}>6</option>
                                                            <option value="7" {{ old('children', $total_childs) == '7' ? 'selected' : '' }}>7</option>
                                                            <option value="8" {{ old('children', $total_childs) == '8' ? 'selected' : '' }}>8</option>
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

                <div class="col-lg-9">
                    <div class="availableRoom-div">
                        <div class="row">
                            <div class="col-lg-12">
                                @forelse ($available_rooms as $room)
                                @if ($room->quantity - $room->bookings->count() > 0)
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="availableRoom-card">
                                            <div class="row">
                                                <div class="col-lg-4 mb-2 mb-lg-0">
                                                    <div class="room-img">
                                                        @foreach ($room->roomImages as $roomImage)
                                                        <img src="{{ asset($roomImage->image) }}" alt="">
                                                        @break
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <div class="col-lg-8">
                                                    <div class="room-info">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="room-title">
                                                                    <a href="{{ url('rooms/room-details/' . $room->id) }}">{{ $room->name }}</a>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12">
                                                                <div class="room-dscrp">
                                                                    {{ $room->short_description }}
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="room-capacity">
                                                                    <strong>Max. Guest: </strong>{{ $room->max_adults + $room->max_childs.' person(s)' }} <br>
                                                                </div>
                                                                <div class="room-availability-count">
                                                                    <span class="badge rounded-pill bg-success available-badge">{{ $room->quantity - $room->bookings->where('room_id', $room->id)->count() }} rooms are available out of {{ $room->quantity }}</span>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="room-pricing">
                                                                    <h5>${{ $room->price }}++<span>/night</span></h5>
                                                                    <small class="text-danger">Rack Rate</small>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 mb-2 mb-lg-0">
                                                                <div class="room-view-btn">
                                                                    <a href="{{ 'http://localhost:8000/rooms/room-details/'.$room->slug }}" class="btn btn-primary">View Room</a>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                @if (Auth::user())
                                                                <form action="{{ url('confirm-booking') }}" method="GET">
                                                                    <input type="date" id="checkin_date" name="checkin_date" value="{{ $checkin_date }}" hidden>
                                                                    <input type="date" id="checkout_date" name="checkout_date" value="{{ $checkout_date }}" hidden>
                                                                    <input type="text" id="total_adults" name="total_adults" value="{{ $total_adults }}" hidden>
                                                                    <input type="text" id="total_childs" name="total_childs" value="{{ $total_childs }}" hidden>
                                                                    <input type="text" id="room_id" name="room_id" value="{{ $room->id }}" hidden>
                                                                    <div class="booking-btn">
                                                                        <button type="submit" class="btn btn-primary">Book Now</button>
                                                                    </div>
                                                                </form>
                                                                @else
                                                                <div class="booking-btn">
                                                                    <a href="{{ route('login') }}" class="btn btn-primary">Book Now</a>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @empty
                                    No Rooms Found
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
