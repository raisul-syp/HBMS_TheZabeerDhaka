<div class="card">
    <div class="card-header">
        <h4 class="card-title">Room Table</h4>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-responsive-sm">
                <thead class="text-center bg-primary text-white">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Room View</th>
                        <th>Facilities</th>
                        <th>Quantity</th>
                        <th>Booked</th>
                        <th>Available</th>
                        <th>Price</th>
                        <th>Status</th>
                        @if (Auth::guard('admin')->user()->can('Rooms.Edit') || Auth::guard('admin')->user()->can('Rooms.Delete'))
                        <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($rooms as $room)
                    <tr>
                        <td>{{ $serialNo++ }}</td>
                        <td>{{ $room->name }}</td>
                        <td>{{ $room->slug }}</td>
                        <td>
                            @forelse ($room->roomViews as $roomView)
                            <div class="room-facilities m-1" data-toggle="tooltip" data-placement="top" title="{{ $roomView->name }}">
                            @if ($roomView->image != null)
                            <img src="{{ asset('uploads/roomviews/'.$roomView->image) }}">
                            @endif
                            </div>
                            @empty
                            <small class="text-danger">No Facilities Added!</small>
                            @endforelse
                        </td>
                        <td>
                            @forelse ($room->facilities as $facility)
                            <div class="room-facilities m-1" data-toggle="tooltip" data-placement="top" title="{{ $facility->name }}">
                            @if ($facility->image != null)
                            <img src="{{ asset('uploads/facilities/'.$facility->image) }}">
                            @endif
                            </div>
                            @empty
                            <small class="text-danger">No Facilities Added!</small>
                            @endforelse
                        </td>
                        <td>{{ $room->quantity }}</td>
                        <td>
                            @forelse ($room->bookings as $bookedRoom)                            
                            {{ $bookedRoom->where('room_id', $room->id)->count() }}
                            @break   
                            @empty
                            <div class="text-danger">0</div>
                            @endforelse
                        </td>
                        <td>{{ $room->quantity - $room->bookings->where('room_id', $room->id)->count() }}</td>
                        <td>{{ $room->price }}</td>
                        <td>
                            @if ($room->is_active == '1')
                                <span class="badge badge-success text-white">Active</span>
                            @else
                                <span class="badge badge-danger">Deactive</span>
                            @endif
                        </td>
                        @if (Auth::guard('admin')->user()->can('Rooms.Edit') || Auth::guard('admin')->user()->can('Rooms.Delete'))
                        <td>
                            @if (Auth::guard('admin')->user()->can('Rooms.Edit'))
                            <span data-toggle="tooltip" data-placement="top" title="Edit">
                                <a href="{{ url('admin/room/edit/'.$room->id) }}" class="btn btn-icon btn-square btn-outline-warning list-button"><i class="fa fa-pencil-square-o"></i></a>
                            </span>
                            @endif
                            @if (Auth::guard('admin')->user()->can('Rooms.Delete'))
                            <span data-toggle="tooltip" data-placement="top" title="Delete">
                                <a href="#" wire:click="deleteRecord({{ $room->id }})" class="btn btn-icon btn-square btn-outline-danger list-button" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o"></i></a>
                            </span>
                            @endif
                            @include('modal.admin.delete')
                        </td>
                        @endif
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

        <div class="pagination-section">
            {{ $rooms->links() }}
        </div>
    </div>
</div>
