@extends('layouts.admin')
@section('title', 'Edit Slider')

@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h2 class="page-header-title">{{ __('Edit Slider') }}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Website') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Sliders') }}</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('Edit Slider') }}</a></li>
                </ol>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <a href="{{ url('admin/website/sliders') }}" class="btn btn-dark text-white">{{ __('Back To List') }}</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form action="{{ url('admin/website/sliders/edit/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="form-title">
                            <h4>{{ __('Slider Form') }}</h4>
                        </div>
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#slider_info">
                                    <span>
                                        <strong>
                                            <i class="ti-info"></i>
                                            <span class="ml-2">{{ __('Slider Info') }}</span>
                                        </strong>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#slider_seo">
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
                            <div class="tab-pane fade active show" id="slider_info" role="tabpanel">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="name">
                                            {{ __('Name') }}
                                            <small class="text-danger">*</small>
                                        </label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $slider->name }}" placeholder="Add Name...">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="slug">
                                            {{ __('Slug') }}
                                        </label>
                                        <input type="text" class="form-control" id="slug" name="slug" value="{{ $slider->slug }}" placeholder="Add Slug...">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="desktop_image">
                                            {{ __('Desktop Slider Image') }}
                                        </label>
                                        <input type="file" class="dropify" id="desktop_image" name="desktop_image" data-default-file="{{ asset('frontend/images/sliders/'.$slider->desktop_image) }}" />
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="mobile_image">
                                            {{ __('Mobile Slider Image') }}
                                        </label>
                                        <input type="file" class="dropify" id="mobile_image" name="mobile_image" data-default-file="{{ asset('frontend/images/sliders/'.$slider->mobile_image) }}" />
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="content_1">
                                            {{ __('Content 1') }}
                                            <small class="text-danger">*</small>
                                        </label>
                                        <input type="text" class="form-control" id="content_1" name="content_1" value="{{ $slider->content_1 }}" placeholder="Add 1st Content...">
                                        @error('content_1')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="content_2">
                                            {{ __('Content 2') }}
                                            <small class="text-danger">*</small>
                                        </label>
                                        <input type="text" class="form-control" id="content_2" name="content_2" value="{{ $slider->content_2 }}" placeholder="Add 2nd Content...">
                                        @error('content_2')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="content_3">
                                            {{ __('Content 3') }}
                                        </label>
                                        <input type="text" class="form-control" id="content_3" name="content_3" value="{{ $slider->content_3 }}" placeholder="Add 3rd Content...">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="content_4">
                                            {{ __('Content 4') }}
                                        </label>
                                        <input type="text" class="form-control" id="content_4" name="content_4" value="{{ $slider->content_4 }}" placeholder="Add 3rd Content...">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="content_5">
                                            {{ __('Content 5') }}
                                        </label>
                                        <input type="text" class="form-control" id="content_5" name="content_5" value="{{ $slider->content_5 }}" placeholder="Add 3rd Content...">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="display_order">
                                            {{ __('Display Order') }}
                                        </label>
                                        <input type="number" class="form-control" id="display_order" name="display_order" value="{{ $slider->display_order }}" placeholder="Add 2nd Button Title...">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <div for="is_active">
                                            {{ __('Status') }}
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" {{ $slider->is_active == '1' ? 'checked':'' }}>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="slider_seo" role="tabpanel">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right" for="meta_title">
                                        {{ __('Meta Title') }}
                                        <small class="text-danger">*</small>
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ $slider->meta_title }}" placeholder="Add Meta Title...">
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
                                        <input type="text" class="form-control" id="meta_keyword" name="meta_keyword" value="{{ $slider->meta_keyword }}" placeholder="Add Meta Keyword...">
                                        @error('meta_keyword')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <label class="col-sm-2 col-form-label text-right" for="meta_decription">{{ __('Meta Decription') }}</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="meta_decription" name="meta_decription" rows="4" placeholder="Add Meta Description...">{{ $slider->meta_decription }}</textarea>
                                    </div>
                                </div>

                                <input type="text" hidden id="updated_by" name="updated_by" value="{{ Auth::guard('admin')->user()->role_as }}">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary text-uppercase text-right">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
