@extends('layouts.admin')
@section('title', 'Create A New Facility')

@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h2 class="page-header-title">{{ __('Create A New Facility') }}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Website') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Facilities') }}</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('Add Facility') }}</a></li>
                </ol>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <a href="{{ url('admin/website/facilities') }}" class="btn btn-dark text-white">{{ __('Back To List') }}</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form action="{{ url('admin/website/facilities') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="form-title">
                            <h4>{{ __('Facility Form') }}</h4>
                        </div>
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#facility_info">
                                    <span>
                                        <strong>
                                            <i class="ti-info"></i>
                                            <span class="ml-2">{{ __('Facility Info') }}</span>
                                        </strong>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#facility_seo">
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
                            <div class="tab-pane fade active show" id="facility_info" role="tabpanel">
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="name">
                                            {{ __('Name') }}
                                            <small class="text-danger">*</small>
                                        </label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Add Name...">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="slug">
                                            {{ __('Slug') }}
                                        </label>
                                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Add Slug...">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label for="display_order">
                                            {{ __('Display Order') }}
                                        </label>
                                        <input type="number" class="form-control" id="display_order" name="display_order" value="0" placeholder="Add 2nd Button Title...">
                                    </div>
                                    <div class="form-group col-lg-1">
                                        <div for="is_active">
                                            {{ __('Status') }}
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" checked>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="description">
                                            {{ __('Description') }}
                                        </label>
                                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Add Description..."></textarea>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="image">
                                            {{ __('Image') }}
                                        </label>
                                        <input type="file" class="dropify" id="image" name="image" />
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="facility_seo" role="tabpanel">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right" for="meta_title">
                                        {{ __('Meta Title') }}
                                        <small class="text-danger">*</small>
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Add Meta Title...">
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
                                        <input type="text" class="form-control" id="meta_keyword" name="meta_keyword" placeholder="Add Meta Keyword...">
                                        @error('meta_keyword')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <label class="col-sm-2 col-form-label text-right" for="meta_decription">{{ __('Meta Decription') }}</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="meta_decription" name="meta_decription" rows="4" placeholder="Add Meta Description..."></textarea>
                                    </div>
                                </div>

                                <input type="text" hidden id="created_by" name="created_by" value="{{ Auth::guard('admin')->user()->role_as }}">
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
