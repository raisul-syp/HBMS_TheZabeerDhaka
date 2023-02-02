<div class="card">
    <div class="card-header">
        <h4 class="card-title">Settings Table</h4>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-responsive-sm">
                <thead class="text-center bg-primary text-white">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Display Order</th>
                        <th>Status</th>
                        @if (Auth::guard('admin')->user()->can('Settings.Edit') || Auth::guard('admin')->user()->can('Settings.Delete'))
                        <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($settings as $setting)
                    <tr>
                        <td>{{ $serialNo }}</td>
                        <td>{{ $setting->name }}</td>
                        <td>{{ $setting->phone }}</td>
                        <td>{{ $setting->email }}</td>
                        <td>{{ $setting->address }}</td>
                        <td>{{ $setting->display_order }}</td>
                        <td>
                            @if ($setting->is_active == '1')
                                <span class="badge badge-success text-white">Active</span>
                            @else
                                <span class="badge badge-danger">Deactive</span>
                            @endif
                        </td>
                        @if (Auth::guard('admin')->user()->can('Settings.Edit') || Auth::guard('admin')->user()->can('Settings.Delete'))
                        <td>
                            @if (Auth::guard('admin')->user()->can('Settings.Edit'))
                            <span data-toggle="tooltip" data-placement="top" title="Edit">
                                <a href="{{ url('admin/settings/edit/'.$setting->id) }}" class="btn btn-icon btn-square btn-outline-warning list-button"><i class="fa fa-pencil-square-o"></i></a>
                            </span>
                            @endif
                            @if (Auth::guard('admin')->user()->can('Settings.Delete'))
                            <span data-toggle="tooltip" data-placement="top" title="Delete">
                                <a href="#" wire:click="deleteRecord({{ $setting->id }})" class="btn btn-icon btn-square btn-outline-danger list-button" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o"></i></a>
                            </span>
                            @endif
                            @include('modal.admin.delete')
                        </td>
                        @endif
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
            {{ $settings->links() }}
        </div>
    </div>
</div>
