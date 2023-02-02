<div class="card-body">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Room Name</th>
                    <th>Guests</th>
                    <th>Check-In</th>
                    <th>Check-Out</th>
                    <th>Booking Status</th>
                    <th>Payment Mode</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($bookings as $booking)
                <tr>
                    <td>{{ $serialNo++ }}</td>
                    <td>{{ $booking->rooms->name }}</td>
                    <td>
                        <strong>Adults: </strong>{{ $booking->total_adults }} <br>
                        <strong>Childs: </strong>{{ $booking->total_childs }}
                    </td>
                    <td>
                        {{ date('d M Y', strtotime($booking->checkin_date)) }} <br>
                        {{ date('h:i A', strtotime($booking->checkin_time)) }}
                    </td>
                    <td>
                        {{ date('d M Y', strtotime($booking->checkout_date)) }} <br>
                        {{ date('h:i A', strtotime($booking->checkout_time)) }}
                    </td>
                    <td>
                        @if ($booking->booking_status == '0')
                            <span class="badge bg-warning">Pending</span>
                        @elseif ($booking->booking_status == '1')
                            <span class="badge bg-success">Booked</span>
                        @elseif ($booking->booking_status == '2')
                            <span class="badge bg-danger">Canceled</span>
                        @elseif ($booking->booking_status == '3')
                            <span class="badge bg-info">Payment Pending</span>
                        @endif
                    </td>
                    <td>{{ $booking->payment_mode }}</td>
                    <td>{{ '$'.$booking->rooms->price }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">No Bookings History</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- <div class="pagination-section">
        {{ $bookings->links() }}
    </div> --}}
</div>