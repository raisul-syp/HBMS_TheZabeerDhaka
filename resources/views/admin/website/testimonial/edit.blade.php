@extends('layouts.admin')
@section('title', 'Edit Testimonial')

@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h2 class="page-header-title">{{ __('Edit Testimonial') }}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Website') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Testimonials') }}</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('Edit Testimonial') }}</a></li>
                </ol>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <a href="{{ url('admin/website/testimonials') }}" class="btn btn-dark text-white">{{ __('Back To List') }}</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form action="{{ url('admin/website/testimonials/edit/'.$testimonial->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="form-title">
                            <h4>{{ __('Testimonial Form') }}</h4>
                        </div>
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#testimonial_info">
                                    <span>
                                        <strong>
                                            <i class="ti-info"></i>
                                            <span class="ml-2">{{ __('Testimonial Info') }}</span>
                                        </strong>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#testimonial_seo">
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
                            <div class="tab-pane fade active show" id="testimonial_info" role="tabpanel">
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="name">
                                            {{ __('Name') }}
                                            <small class="text-danger">*</small>
                                        </label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $testimonial->name }}" placeholder="Add Name...">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="designation">
                                            {{ __('Designation') }}
                                        </label>
                                        <input type="text" class="form-control" id="designation" name="designation" value="{{ $testimonial->designation }}" placeholder="Add Designation...">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="company">
                                            {{ __('Company Name') }}
                                        </label>
                                        <input type="text" class="form-control" id="company" name="company" value="{{ $testimonial->company }}" placeholder="Add Company Name...">
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="message">
                                            {{ __('Message') }}
                                            <small class="text-danger">*</small>
                                        </label>
                                        <textarea class="form-control" name="message" id="message" rows="3" placeholder="Add Message...">{{ $testimonial->message }}</textarea>
                                        @error('message')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-5">
                                        <label for="slug">
                                            {{ __('Slug') }}
                                        </label>
                                        <input type="text" class="form-control" id="slug" name="slug" value="{{ $testimonial->slug }}" placeholder="Add Slug...">
                                    </div>
                                    <div class="form-group col-lg-5">
                                        <label for="display_order">
                                            {{ __('Display Order') }}
                                        </label>
                                        <input type="number" class="form-control" id="display_order" name="display_order" value="{{ $testimonial->display_order }}" placeholder="Add 2nd Button Title...">
                                    </div>
                                    <div class="form-group col-lg-2">
                                        <div for="is_active">
                                            {{ __('Status') }}
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" {{ $testimonial->is_active == '1' ? 'checked':'' }}>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="image">
                                            {{ __('Image') }}
                                        </label>
                                        <input type="file" class="dropify" id="image" name="image" data-default-file="{{ asset('frontend/images/testimonials/'.$testimonial->image) }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="testimonial_seo" role="tabpanel">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right" for="meta_title">
                                        {{ __('Meta Title') }}
                                        <small class="text-danger">*</small>
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ $testimonial->meta_title }}" placeholder="Add Meta Title...">
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
                                        <input type="text" class="form-control" id="meta_keyword" name="meta_keyword" value="{{ $testimonial->meta_keyword }}" placeholder="Add Meta Keyword...">
                                        @error('meta_keyword')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <label class="col-sm-2 col-form-label text-right" for="meta_decription">{{ __('Meta Decription') }}</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="meta_decription" name="meta_decription" rows="4" placeholder="Add Meta Description...">{{ $testimonial->meta_decription }}</textarea>
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
