<div class="card">
    <div class="card-header">
        <h4 class="card-title">FAQ Table</h4>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-responsive-sm">
                <thead class="text-center bg-primary text-white">
                    <tr>
                        <th>#</th>
                        <th>Question</th>
                        <th>FAQ Type</th>
                        <th>Status</th>
                        @if (Auth::guard('admin')->user()->can('FAQ.Edit') || Auth::guard('admin')->user()->can('FAQ.Delete'))
                        <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($faqs as $faq)
                    <tr>
                        <td>{{ $serialNo++ }}</td>
                        <td>{{ $faq->question }}</td>
                        <td>{{ $faq->faq_type }}</td>
                        <td>
                            @if ($faq->is_active == '1')
                                <span class="badge badge-success text-white">Active</span>
                            @else
                                <span class="badge badge-danger">Deactive</span>
                            @endif
                        </td>
                        @if (Auth::guard('admin')->user()->can('FAQ.Edit') || Auth::guard('admin')->user()->can('FAQ.Delete'))
                        <td>
                            @if (Auth::guard('admin')->user()->can('FAQ.Edit'))
                            <span data-toggle="tooltip" data-placement="top" title="Edit">
                                <a href="{{ url('admin/faq/edit/'.$faq->id) }}" class="btn btn-icon btn-square btn-outline-warning list-button"><i class="fa fa-pencil-square-o"></i></a>
                            </span>
                            @endif
                            @if (Auth::guard('admin')->user()->can('FAQ.Delete'))
                            <span data-toggle="tooltip" data-placement="top" title="Delete">
                                <a href="#" wire:click="deleteRecord({{ $faq->id }})" class="btn btn-icon btn-square btn-outline-danger list-button" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o"></i></a>
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
            {{ $faqs->links() }}
        </div>
    </div>
</div>
