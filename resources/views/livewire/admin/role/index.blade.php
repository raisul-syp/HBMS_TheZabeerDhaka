<div class="card">
    <div class="card-header">
        <h4 class="card-title">Role Table</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-responsive-sm">
                <thead class="text-center bg-primary text-white">
                    <tr>
                        <th width="5%">#</th>
                        <th width="15%">Name</th>
                        <th width="50%">Permissions</th>
                        <th width="10%">Status</th>
                        @if (Auth::guard('admin')->user()->can('Role.Edit') || Auth::guard('admin')->user()->can('Role.Delete'))
                        <th width="20%">Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($roles as $role)
                    <tr>
                        <td>{{ $serialNo++ }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            @forelse ($role->permissions as $permission)
                            <span class="badge badge-primary mb-1">{{ $permission->name }}</span>
                            @empty
                            <small class="text-danger">No Permissions Assigned!</small>
                            @endforelse
                        </td>
                        <td>
                            @if ($role->is_active == '1')
                                <span class="badge badge-success text-white">Active</span>
                            @else
                                <span class="badge badge-danger">Deactive</span>
                            @endif
                        </td>
                        @if (Auth::guard('admin')->user()->can('Role.Edit') || Auth::guard('admin')->user()->can('Role.Delete'))
                        <td>
                            @if (Auth::guard('admin')->user()->can('Role.Edit'))
                            <span>
                                <a href="{{ url('admin/role-permission/role/edit/'.$role->id) }}" class="btn btn-icon btn-square btn-outline-warning list-button"><i class="fa fa-pencil-square-o"></i></a>
                            </span>
                            @endif
                            @if (Auth::guard('admin')->user()->can('Role.Delete'))
                            <span>
                                <a href="#" wire:click="deleteRecord({{ $role->id }})" class="btn btn-icon btn-square btn-outline-danger list-button" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o"></i></a>
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
            {{ $roles->links() }}
        </div>
    </div>
</div>

