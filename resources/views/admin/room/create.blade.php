@extends('layouts.admin')
@section('title', 'Create A New Room')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h2 class="page-header-title">{{ __('Create A New Room') }}</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Rooms') }}</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('Add Room') }}</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <a href="{{ url('admin/room') }}" class="btn btn-dark text-white">{{ __('Back To List') }}</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        @include('alertMessage.admin.error')
                    @endforeach
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <form action="{{ url('admin/room') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div class="form-title">
                                <h4>{{ __('Room Form') }}</h4>
                            </div>
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#room_info">
                                        <span>
                                            <strong>
                                                <i class="ti-info"></i>
                                                <span class="ml-2">{{ __('Room Info') }}</span>
                                            </strong>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#room_price">
                                        <span>
                                            <strong>
                                                <i class="ti-money"></i>
                                                <span class="ml-2">{{ __('Price & Discount') }}</span>
                                            </strong>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#room_facility">
                                        <span>
                                            <strong>
                                                <i class="ti-tag"></i>
                                                <span class="ml-2">{{ __('Facility & View') }}</span>
                                            </strong>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#room_image">
                                        <span>
                                            <strong>
                                                <i class="ti-image"></i>
                                                <span class="ml-2">{{ __('Images') }}</span>
                                            </strong>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#room_seo">
                                        <span>
                                            <strong>
                                                <i class="ti-search"></i>
                                                <span class="ml-2">{{ __('SEO') }}</span>
                                            </strong>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane fade active show" id="room_info" role="tabpanel">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label text-right" for="name">
                                            {{ __('Name') }}
                                            <small class="text-danger">*</small>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Add Name...">
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label text-right" for="slug">
                                            {{ __('Slug') }}
                                            <small class="text-danger">*</small>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="slug" name="slug"
                                                placeholder="Add Slug...">
                                            @error('slug')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label text-right" for="short_description">
                                            {{ __('Short Description') }}
                                            <small class="text-danger">*</small>
                                        </label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="short_description" name="short_description" rows="3"
                                                placeholder="Add Short Description..."></textarea>
                                            @error('short_description')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label text-right"
                                            for="long_description">{{ __('Long Description') }}</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="long_description" name="long_description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label text-right"
                                            for="max_adults">{{ __('Max Adults') }}</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="max_adults" name="max_adults"
                                                placeholder="Add max adults...">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label text-right"
                                            for="max_childs">{{ __('Max Childs') }}</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="max_childs" name="max_childs"
                                                placeholder="Add max childs...">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label text-right"
                                            for="quantity">{{ __('Quantity') }}</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="quantity" name="quantity"
                                                placeholder="Add Quantity...">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-sm-2 col-form-label text-right" for="is_active">
                                            {{ __('Status') }}</div>
                                        <div class="col-sm-10">
                                            <label class="switch switch-square">
                                                <input type="checkbox" class="switch-input" id="is_active"
                                                    name="is_active" checked>
                                                <span class="switch-toggle-slider"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="room_price" role="tabpanel">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label text-right"
                                            for="price">{{ __('Price') }}</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">
                                                        <i class="fa fa-usd"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="price" name="price"
                                                    value="0" placeholder="Add Price...">
                                                <div class="input-group-append">
                                                    <span class="input-group-text bg-primary">per night</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-2 col-form-label text-right" for="has_discount">
                                            {{ __('Has Discount') }}</div>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="has_discount"
                                                    name="has_discount">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label text-right"
                                            for="discount_rate">{{ __('Discount Rate') }}</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">
                                                        <i class="fa fa-percent"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="discount_rate"
                                                    name="discount_rate" value="0" placeholder="Add Discount Rate..." readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label class="col-sm-2 col-form-label text-right"
                                            for="discount_price">{{ __('Discount Price') }}</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">
                                                        <i class="fa fa-usd"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="discount_price"
                                                    name="discount_price" value="0" placeholder="Add Discount Price..." readonly>
                                                <div class="input-group-append">
                                                    <span class="input-group-text bg-primary">per night</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="room_facility" role="tabpanel">
                                    <div class="form-group row">
                                        <div class="col-sm-2 col-form-label text-right" for="roomViews">
                                            {{ __('Room View') }}
                                        </div>
                                        <div class="col-sm-10">
                                            @forelse ($views as $roomViewItem)
                                                <div class="form-check mb-2">
                                                    <input type="checkbox" class="form-check-input" name="roomViews[]"
                                                        value="{{ $roomViewItem->id }}">
                                                    <label class="form-check-label">{{ $roomViewItem->name }}</label>
                                                </div>
                                            @empty
                                                <h6>No Facilities Found!</h6>
                                            @endforelse
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-sm-2 col-form-label text-right" for="facilities">
                                            {{ __('Room Facility') }}
                                        </div>
                                        <div class="col-sm-10">
                                            @forelse ($facilities as $facilityItem)
                                                <div class="form-check mb-2">
                                                    <input type="checkbox" class="form-check-input" name="facilities[]"
                                                        value="{{ $facilityItem->id }}">
                                                    <label class="form-check-label">{{ $facilityItem->name }}</label>
                                                </div>
                                            @empty
                                                <h6>No Facilities Found!</h6>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="room_image" role="tabpanel">
                                    <div class="form-group row mb-0">
                                        <div class="col-sm-2 col-form-label text-right" for="image">
                                            {{ __('Image') }}</div>
                                        <div class="col-sm-10">
                                            <input type="file" class="dropify" id="image" name="image[]"
                                                multiple />
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="room_seo" role="tabpanel">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label text-right" for="meta_title">
                                            {{ __('Meta Title') }}
                                            <small class="text-danger">*</small>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="meta_title" name="meta_title"
                                                placeholder="Add Meta Title...">
                                            @error('meta_title')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label text-right" for="meta_keyword">
                                            {{ __('Meta Keyword') }}
                                            <small class="text-danger">*</small>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="meta_keyword"
                                                name="meta_keyword" placeholder="Add Meta Keyword...">
                                            @error('meta_keyword')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label class="col-sm-2 col-form-label text-right"
                                            for="meta_decription">{{ __('Meta Decription') }}</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="meta_decription" name="meta_decription" rows="4"
                                                placeholder="Add Meta Description..."></textarea>
                                        </div>
                                    </div>

                                    <input type="text" hidden id="created_by" name="created_by"
                                        value="{{ Auth::guard('admin')->user()->role_as }}">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary text-uppercase text-right">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

{{-- @section('scripts')
    <script type="text/javascript">
        $(function() {
            $("#has_discount").click(function() {
                if ($(this).is(":checked")) {
                    $("#discount_rate").removeAttr("disabled");
                    $("#discount_price").removeAttr("disabled");
                } else {
                    $("#discount_rate").attr("disabled", "disabled");
                    $("#discount_price").attr("disabled", "disabled");
                }
            });
        });
    </script>
@endsection --}}
