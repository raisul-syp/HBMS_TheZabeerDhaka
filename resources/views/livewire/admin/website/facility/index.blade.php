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
                        <th>Display Order</th>
                        <th>Status</th>
                        @if (Auth::guard('admin')->user()->can('Website.Facilities.Edit') || Auth::guard('admin')->user()->can('Website.Facilities.Delete'))
                        <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($facilities as $facility)
                    <tr>
                        <td>{{ $serialNo++  }}</td>
                        <td style="width: 6%;">
                            <div class="facility-list-img">
                                <img src="{{ asset('frontend/images/facilities/'.$facility->image) }}" alt="{{ $facility->name }}">
                            </div>
                        </td>
                        <td>{{ $facility->name }}</td>
                        <td>{{ $facility->display_order }}</td>
                        <td>
                            @if ($facility->is_active == '1')
                                <span class="badge badge-success text-white">Active</span>
                            @else
                                <span class="badge badge-danger">Deactive</span>
                            @endif
                        </td>
                        @if (Auth::guard('admin')->user()->can('Website.Facilities.Edit') || Auth::guard('admin')->user()->can('Website.Facilities.Delete'))
                        <td>
                            @if (Auth::guard('admin')->user()->can('Website.Facilities.Edit'))
                            <span data-toggle="tooltip" data-placement="top" title="Edit">
                                <a href="{{ url('admin/website/facilities/edit/'.$facility->id) }}" class="btn btn-icon btn-square btn-outline-warning list-button"><i class="fa fa-pencil-square-o"></i></a>
                            </span>
                            @endif
                            @if (Auth::guard('admin')->user()->can('Website.Facilities.Delete'))
                            <span data-toggle="tooltip" data-placement="top" title="Delete">
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
