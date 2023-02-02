<div class="card">
    <div class="card-header">
        <h4 class="card-title">Room Type Table</h4>
    </div>
    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-responsive-sm">
                <thead class="text-center bg-primary text-white">
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        @if (Auth::guard('admin')->user()->can('RoomType.Edit') || Auth::guard('admin')->user()->can('RoomType.Delete'))
                        <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($roomtypes as $roomtype)
                    <tr>
                        <td>{{ $serialNo++ }}</td>
                        <td>
                            @if ($roomtype->image != null)
                            <img src="{{ asset('uploads/roomviews/'.$roomtype->image) }}" class="data-table-image">
                            @else
                            <img src="{{ asset('admin/images/no-photo.png') }}" class="data-table-image">
                            @endif
                        </td>
                        <td>{{ $roomtype->name }}</td>
                        <td>{{ $roomtype->slug }}</td>
                        <td>
                            @if ($roomtype->is_active == '1')
                                <span class="badge badge-success text-white">Active</span>
                            @else
                                <span class="badge badge-danger">Deactive</span>
                            @endif
                        </td>
                        @if (Auth::guard('admin')->user()->can('RoomType.Edit') || Auth::guard('admin')->user()->can('RoomType.Delete'))
                        <td>
                            @if (Auth::guard('admin')->user()->can('RoomType.Edit'))
                            <span>
                                <a href="{{ url('admin/roomtype/edit/'.$roomtype->id) }}" class="btn btn-icon btn-square btn-outline-warning list-button"><i class="fa fa-pencil-square-o"></i></a>
                            </span>
                            @endif
                            @if (Auth::guard('admin')->user()->can('RoomType.Delete'))
                            <span>
                                <a href="#" wire:click="deleteRecord({{ $roomtype->id }})" class="btn btn-icon btn-square btn-outline-danger list-button" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o"></i></a>
                            </span>
                            @endif
                            @include('modal.admin.delete')
                        </td>
                        @endif
                    </tr>                        
                    @empty
                    <tr>
                        <td colspan="5">
                            <h4 class="mb-0">{{ __('No Records Available!') }}</h4>
                        </td>
                    </tr>                        
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="pagination-section">
            {{ $roomtypes->links() }}
        </div>
    </div>

</div>