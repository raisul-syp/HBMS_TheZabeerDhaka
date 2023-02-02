<div class="card">
    <div class="card-header">
        <h4 class="card-title">Booking Table</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-responsive-sm">
                <thead class="text-center bg-primary text-white">
                    <tr>
                        <th>#</th>
                        <th>Guest Name</th>
                        <th>Room</th>
                        <th>Booked By</th>
                        <th>Guests</th>
                        <th>Checkin Date & Time</th>
                        <th>Checkout Date & Time</th>
                        <th>Booking Status</th>
                        <th>Payment Mode</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($bookings as $booking)
                    <tr>
                        <td>{{ $serialNo++ }}</td>
                        <td>{{ $booking->guests->first_name.' '.$booking->guests->last_name }}</td>
                        <td>{{ $booking->rooms->name }}</td>
                        <td>{{ $booking->staffs->first_name.' '.$booking->staffs->last_name }}</td>
                        <td>
                            <strong>Adults: </strong>{{ $booking->total_adults }} <br>
                            <strong>Childs: </strong>{{ $booking->total_childs }}
                        </td>
                        <td>
                            {{ date('d F Y', strtotime($booking->checkin_date)) }} <br> 
                            {{ date('h:i A', strtotime($booking->checkin_time)) }}
                        </td>
                        <td>
                            {{ date('d F Y', strtotime($booking->checkout_date)) }} <br> 
                            {{ date('h:i A', strtotime($booking->checkout_time)) }}
                        </td>
                        <td>
                            @if ($booking->booking_status == '0')
                            <span class="badge badge-warning text-white">Pending</span>
                            @elseif ($booking->booking_status == '1')
                            <span class="badge badge-success text-white">Booked</span>
                            @elseif ($booking->booking_status == '2')
                            <span class="badge badge-danger text-white">Canceled</span>
                            @elseif ($booking->booking_status == '3')
                            <span class="badge badge-info text-white">Payment Pending</span>
                            @endif
                        </td>
                        <td>{{ $booking->payment_mode }}</td>
                        <td>
                            <span data-toggle="tooltip" data-placement="top" title="Booking Details">
                                <a href="{{ url('admin/booking/details/'.$booking->id) }}" class="btn btn-icon btn-square btn-outline-info list-button" target="_blank"><i class="fa fa-file-text-o"></i></a>
                            </span>
                            @if (Auth::guard('admin')->user()->can('Bookings.Edit'))
                            <span data-toggle="tooltip" data-placement="top" title="Edit">
                                <a href="{{ url('admin/booking/edit/'.$booking->id) }}" class="btn btn-icon btn-square btn-outline-warning list-button"><i class="fa fa-pencil-square-o"></i></a>
                            </span>
                            @endif
                            @if (Auth::guard('admin')->user()->can('Bookings.Delete'))
                            <span data-toggle="tooltip" data-placement="top" title="Delete">
                                <a href="#" wire:click="deleteRecord({{ $booking->id }})" class="btn btn-icon btn-square btn-outline-danger list-button" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o"></i></a>
                            </span>
                            @endif
                            @include('modal.admin.delete')
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

        <div class="pagination-section">
            {{ $bookings->links() }}
        </div>
    </div>
</div>