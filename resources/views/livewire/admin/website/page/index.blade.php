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
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Display Order</th>
                        <th>Footer Item</th>
                        <th>Status</th>
                        @if (Auth::guard('admin')->user()->can('Website.Pages.Edit') || Auth::guard('admin')->user()->can('Website.Pages.Delete'))
                        <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($pages as $page)
                    <tr>
                        <td>{{ $serialNo++  }}</td>
                        <td>{{ $page->name }}</td>
                        <td>{{ $page->slug }}</td>
                        <td>{{ $page->display_order }}</td>
                        <td>
                            @if ($page->footer_item == '1')
                                <span class="badge badge-success text-white">Yes</span>
                            @else
                                <span class="badge badge-danger">No</span>
                            @endif
                        </td>
                        <td>
                            @if ($page->is_active == '1')
                                <span class="badge badge-success text-white">Active</span>
                            @else
                                <span class="badge badge-danger">Deactive</span>
                            @endif
                        </td>
                        @if (Auth::guard('admin')->user()->can('Website.Pages.Edit') || Auth::guard('admin')->user()->can('Website.Pages.Delete'))
                        <td>
                            @if (Auth::guard('admin')->user()->can('Website.Pages.Edit'))
                            <span data-toggle="tooltip" data-placement="top" title="Edit">
                                <a href="{{ url('admin/website/pages/edit/'.$page->id) }}" class="btn btn-icon btn-square btn-outline-warning list-button"><i class="fa fa-pencil-square-o"></i></a>
                            </span>
                            @endif
                            @if (Auth::guard('admin')->user()->can('Website.Pages.Delete'))
                            <span data-toggle="tooltip" data-placement="top" title="Delete">
                                <a href="#" wire:click="deleteRecord({{ $page->id }})" class="btn btn-icon btn-square btn-outline-danger list-button" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o"></i></a>
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
            {{ $pages->links() }}
        </div>
    </div>
</div>
