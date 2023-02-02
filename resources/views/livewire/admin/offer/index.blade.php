<div class="card">
    <div class="card-header">
        <h4 class="card-title">Offer Table</h4>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-responsive-sm">
                <thead class="text-center bg-primary text-white">
                    <tr>
                        <th>#</th>
                        <th>Thumb</th>
                        <th>Name</th>
                        <th>Offer Category</th>
                        <th>Offer Duration</th>
                        <th>Status</th>
                        @if (Auth::guard('admin')->user()->can('Offers.Edit') || Auth::guard('admin')->user()->can('Offers.Delete'))
                        <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($offers as $offer)
                    <tr>
                        <td>{{ $serialNo++ }}</td>
                        <td>
                            <img src="{{ asset('uploads/offer/'.$offer->thumb) }}" alt="" class="list-image">
                        </td>
                        <td>{{ $offer->name }}</td>
                        <td>{{ $offer->offer_category }}</td>
                        <td>
                            <strong>Start:</strong> {{ date('d M Y', strtotime($offer->start_date)) }} <br>
                            <strong>End:</strong> {{ date('d M Y', strtotime($offer->end_date)) }}
                        </td>
                        <td>
                            @if ($offer->is_active == '1')
                                <span class="badge badge-success text-white">Active</span>
                            @else
                                <span class="badge badge-danger">Deactive</span>
                            @endif
                        </td>
                        @if (Auth::guard('admin')->user()->can('Offers.Edit') || Auth::guard('admin')->user()->can('Offers.Delete'))
                        <td>
                            @if (Auth::guard('admin')->user()->can('Offers.Edit'))
                            <span data-toggle="tooltip" data-placement="top" title="Edit">
                                <a href="{{ url('admin/offers/edit/'.$offer->id) }}" class="btn btn-icon btn-square btn-outline-warning list-button"><i class="fa fa-pencil-square-o"></i></a>
                            </span>
                            @endif
                            @if (Auth::guard('admin')->user()->can('Offers.Delete'))
                            <span data-toggle="tooltip" data-placement="top" title="Delete">
                                <a href="#" wire:click="deleteRecord({{ $offer->id }})" class="btn btn-icon btn-square btn-outline-danger list-button" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o"></i></a>
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
            {{ $offers->links() }}
        </div>
    </div>
</div>
