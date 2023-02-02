@extends('layouts.admin')
@section('title', 'Edit Page')

@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h2 class="page-header-title">{{ __('Edit Page') }}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Website') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Pages') }}</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('Edit Page') }}</a></li>
                </ol>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <a href="{{ url('admin/website/pages') }}" class="btn btn-dark text-white">{{ __('Back To List') }}</a>
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
            <form action="{{ url('admin/website/pages/edit/'.$page->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="form-title">
                            <h4>{{ __('Page Form') }}</h4>
                        </div>
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#page_info">
                                    <span>
                                        <strong>
                                            <i class="ti-info"></i>
                                            <span class="ml-2">{{ __('Page Info') }}</span>
                                        </strong>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#page_seo">
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
                            <div class="tab-pane fade active show" id="page_info" role="tabpanel">
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="name">
                                            {{ __('Name') }}
                                            <small class="text-danger">*</small>
                                        </label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $page->name }}" placeholder="Add Name...">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="title">
                                            {{ __('Title') }}
                                            <small class="text-danger">*</small>
                                        </label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ $page->title }}" placeholder="Add Title...">
                                        @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="sub_title">
                                            {{ __('Sub Title') }}
                                        </label>
                                        <input type="text" class="form-control" id="sub_title" name="sub_title" value="{{ $page->sub_title }}" placeholder="Add Sub Title...">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="slug">
                                            {{ __('Slug') }}
                                            <small class="text-danger">*</small>
                                        </label>
                                        <input type="text" class="form-control" id="slug" name="slug" value="{{ $page->slug }}" placeholder="Add Slug...">
                                        @error('slug')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="display_order">
                                            {{ __('Display Order') }}
                                        </label>
                                        <input type="number" class="form-control" id="display_order" name="display_order" value="{{ $page->display_order }}" placeholder="Add 2nd Button Title...">
                                    </div>
                                    <div class="form-group col-lg-2">
                                        <div for="footer_item">
                                            {{ __('Footer Item') }}
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="footer_item" name="footer_item" {{ $page->footer_item == '1' ? 'checked':'' }}>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-2">
                                        <div for="is_active">
                                            {{ __('Status') }}
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" {{ $page->is_active == '1' ? 'checked':'' }}>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="short_description">
                                            {{ __('Short Description') }}
                                        </label>
                                        <textarea class="form-control" name="short_description" id="short_description" rows="3" placeholder="Add Short Description...">{{ $page->short_description }}</textarea>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="long_description">
                                            {{ __('Long Description') }}
                                        </label>
                                        <textarea class="form-control" id="long_description" name="long_description">{{ $page->long_description }}</textarea>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="image">
                                            {{ __('Image') }}
                                        </label>
                                        <input type="file" class="dropify" id="image" name="image" data-default-file="{{ asset('frontend/images/pages/'.$page->image) }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="page_seo" role="tabpanel">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right" for="meta_title">
                                        {{ __('Meta Title') }}
                                        <small class="text-danger">*</small>
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ $page->meta_title }}" placeholder="Add Meta Title...">
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
                                        <input type="text" class="form-control" id="meta_keyword" name="meta_keyword" value="{{ $page->meta_keyword }}" placeholder="Add Meta Keyword...">
                                        @error('meta_keyword')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <label class="col-sm-2 col-form-label text-right" for="meta_decription">{{ __('Meta Decription') }}</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="meta_decription" name="meta_decription" rows="4" placeholder="Add Meta Description...">{{ $page->meta_decription }}</textarea>
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
