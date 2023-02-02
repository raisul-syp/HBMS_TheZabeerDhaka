<div class="card">
    <div class="card-header">
        <h4 class="card-title">Wellness Table</h4>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-responsive-sm">
                <thead class="text-center bg-primary text-white">
                    <tr>
                        <th>#</th>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        @if (Auth::guard('admin')->user()->can('Wellness.Edit') || Auth::guard('admin')->user()->can('Wellness.Delete'))
                        <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($wellnesses as $wellness)
                    <tr>
                        <td>{{ $serialNo++ }}</td>
                        <td>
                            <img src="{{ asset('uploads/wellness/logo/'.$wellness->logo_image) }}" alt="" class="list-image">
                        </td>
                        <td>{{ $wellness->name }}</td>
                        <td>{{ $wellness->slug }}</td>
                        <td>
                            @if ($wellness->is_active == '1')
                                <span class="badge badge-success text-white">Active</span>
                            @else
                                <span class="badge badge-danger">Deactive</span>
                            @endif
                        </td>
                        @if (Auth::guard('admin')->user()->can('Wellness.Edit') || Auth::guard('admin')->user()->can('Wellness.Delete'))
                        <td>
                            @if (Auth::guard('admin')->user()->can('Wellness.Edit'))
                            <span data-toggle="tooltip" data-placement="top" title="Edit">
                                <a href="{{ url('admin/wellness/edit/'.$wellness->id) }}" class="btn btn-icon btn-square btn-outline-warning list-button"><i class="fa fa-pencil-square-o"></i></a>
                            </span>
                            @endif
                            @if (Auth::guard('admin')->user()->can('Wellness.Delete'))
                            <span data-toggle="tooltip" data-placement="top" title="Delete">
                                <a href="#" wire:click="deleteRecord({{ $wellness->id }})" class="btn btn-icon btn-square btn-outline-danger list-button" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o"></i></a>
                            </span>
                            @endif
                            @include('modal.admin.delete')
                        </td>
                        @endif
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">
                            <h4 class="mb-0">{{ __('No Records Available!') }}</h4>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination-section">
            {{ $wellnesses->links() }}
        </div>
    </div>
</div>
