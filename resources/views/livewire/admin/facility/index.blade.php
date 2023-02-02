<div class="card">
    <div class="card-header">
        <h4 class="card-title">Facility Table</h4>
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
                        @if (Auth::guard('admin')->user()->can('Facilities.Edit') || Auth::guard('admin')->user()->can('Facilities.Delete'))
                        <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($facilities as $facility)
                    <tr>
                        <td>{{ $serialNo++ }}</td>
                        <td>
                            @if ($facility->image != null)
                            <img src="{{ asset('uploads/facilities/'.$facility->image) }}" class="data-table-image">
                            @else
                            <img src="{{ asset('admin/images/no-photo.png') }}" class="data-table-image">
                            @endif
                        </td>
                        <td>{{ $facility->name }}</td>
                        <td>{{ $facility->slug }}</td>
                        <td>
                            @if ($facility->is_active == '1')
                                <span class="badge badge-success text-white">Active</span>
                            @else
                                <span class="badge badge-danger">Deactive</span>
                            @endif
                        </td>
                        @if (Auth::guard('admin')->user()->can('Facilities.Edit') || Auth::guard('admin')->user()->can('Facilities.Delete'))
                        <td>
                            @if (Auth::guard('admin')->user()->can('Facilities.Edit'))
                            <span>
                                <a href="{{ url('admin/facility/edit/'.$facility->id) }}" class="btn btn-icon btn-square btn-outline-warning list-button"><i class="fa fa-pencil-square-o"></i></a>
                            </span>
                            @endif
                            @if (Auth::guard('admin')->user()->can('Facilities.Delete'))
                            <span>
                                <a href="#" wire:click="deleteRecord({{ $facility->id }})" class="btn btn-icon btn-square btn-outline-danger list-button" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o"></i></a>
                            </span>
                            @endif
                            @include('modal.admin.delete')
                        </td>
                        @endif
                    </tr>                        
                    @empty
                    <tr>
                        <td colspan="7">
                            <h4 class="mb-0">{{ __('No Records Available!') }}</h4>
                        </td>
                    </tr>                        
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination-section">
            {{ $facilities->links() }}
        </div>
    </div>
</div>

