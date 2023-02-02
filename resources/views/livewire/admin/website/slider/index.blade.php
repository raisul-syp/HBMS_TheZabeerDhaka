<div class="card">
    <div class="card-header">
        <h4 class="card-title">Menu Table</h4>
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
                        @if (Auth::guard('admin')->user()->can('Website.Sliders.Edit') || Auth::guard('admin')->user()->can('Website.Sliders.Delete'))
                        <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($sliders as $slider)
                    <tr>
                        <td>{{ $serialNo++  }}</td>
                        <td style="width: 15%;">
                            <div class="slider-list-img">
                                <img src="{{ asset('frontend/images/sliders/'.$slider->desktop_image) }}" alt="{{ $slider->name }}">
                            </div>
                        </td>
                        <td>{{ $slider->name }}</td>
                        <td>{{ $slider->display_order }}</td>
                        <td>
                            @if ($slider->is_active == '1')
                                <span class="badge badge-success text-white">Active</span>
                            @else
                                <span class="badge badge-danger">Deactive</span>
                            @endif
                        </td>
                        @if (Auth::guard('admin')->user()->can('Website.Sliders.Edit') || Auth::guard('admin')->user()->can('Website.Sliders.Delete'))
                        <td>
                            @if (Auth::guard('admin')->user()->can('Website.Sliders.Edit'))
                            <span data-toggle="tooltip" data-placement="top" title="Edit">
                                <a href="{{ url('admin/website/sliders/edit/'.$slider->id) }}" class="btn btn-icon btn-square btn-outline-warning list-button"><i class="fa fa-pencil-square-o"></i></a>
                            </span>
                            @endif
                            @if (Auth::guard('admin')->user()->can('Website.Sliders.Delete'))
                            <span data-toggle="tooltip" data-placement="top" title="Delete">
                                <a href="#" wire:click="deleteRecord({{ $slider->id }})" class="btn btn-icon btn-square btn-outline-danger list-button" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o"></i></a>
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
            {{ $sliders->links() }}
        </div>
    </div>
</div>
