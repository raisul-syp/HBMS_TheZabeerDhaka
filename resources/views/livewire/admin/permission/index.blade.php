<div class="card">
    <div class="card-header">
        <h4 class="card-title">Permission Table</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-responsive-sm">
                <thead class="text-center bg-primary text-white">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Group Name</th>
                        <th>Status</th>
                        @if (Auth::guard('admin')->user()->can('Permission.Edit') || Auth::guard('admin')->user()->can('Permission.Delete'))
                        <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($permissions as $permission)
                    <tr>
                        <td>{{ $serialNo++ }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->group_name }}</td>
                        <td>
                            @if ($permission->is_active == '1')
                                <span class="badge badge-success text-white">Active</span>
                            @else
                                <span class="badge badge-danger">Deactive</span>
                            @endif
                        </td>
                        @if (Auth::guard('admin')->user()->can('Permission.Edit') || Auth::guard('admin')->user()->can('Permission.Delete'))
                        <td>
                            @if (Auth::guard('admin')->user()->can('Permission.Edit'))
                            <span>
                                <a href="{{ url('admin/role-permission/permission/edit/'.$permission->id) }}" class="btn btn-icon btn-square btn-outline-warning list-button"><i class="fa fa-pencil-square-o"></i></a>
                            </span>
                            @endif
                            @if (Auth::guard('admin')->user()->can('Permission.Delete'))
                            <span>
                                <a href="#" wire:click="deleteRecord({{ $permission->id }})" class="btn btn-icon btn-square btn-outline-danger list-button" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o"></i></a>
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
            {{ $permissions->links() }}
        </div>
    </div>
</div>

