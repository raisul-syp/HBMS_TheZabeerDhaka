@extends('layouts.admin')
@section('title', 'Create A New Settings')

@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h2 class="page-header-title">{{ __('Create A New Settings') }}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Settings') }}</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('Add Settings') }}</a></li>
                </ol>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <a href="{{ url('admin/settings') }}" class="btn btn-dark text-white">{{ __('Back To List') }}</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form action="{{ url('admin/settings') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="form-title">
                            <h4>{{ __('Settings Form') }}</h4>
                        </div>
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#settings_info">
                                    <span>
                                        <strong>
                                            <i class="ti-info"></i>
                                            <span class="ml-2">{{ __('Settings Info') }}</span>
                                        </strong>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#settings_image">
                                    <span>
                                        <strong>
                                            <i class="ti-image"></i>
                                            <span class="ml-2">{{ __('Images') }}</span>
                                        </strong>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#settings_social">
                                    <span>
                                        <strong>
                                            <i class="ti-link"></i>
                                            <span class="ml-2">{{ __('Social Links') }}</span>
                                        </strong>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#settings_seo">
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
                            <div class="tab-pane fade active show" id="settings_info" role="tabpanel">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right" for="name">
                                        {{ __('Name') }}
                                        <small class="text-danger">*</small>
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Add Name...">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right" for="phone">
                                        {{ __('Phone') }}
                                        <small class="text-danger">*</small>
                                    </label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-primary">
                                                    <i class="fa fa-phone"></i>
                                                </span>
                                            </div>
                                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Add Phone...">
                                            @error('phone')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right" for="email">
                                        {{ __('Email') }}
                                        <small class="text-danger">*</small>
                                    </label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-primary">
                                                    <i class="fa fa-envelope"></i>
                                                </span>
                                            </div>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Add Email...">
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right" for="address">
                                        {{ __('Address') }}
                                        <small class="text-danger">*</small>
                                    </label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-primary">
                                                    <i class="fa fa-map-marker"></i>
                                                </span>
                                            </div>
                                            <textarea class="form-control" name="address" id="address" rows="3" placeholder="Add Address..."></textarea>
                                            @error('address')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right" for="display_order">
                                        {{ __('Display Order') }}
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="display_order" name="display_order" value="0">
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <label class="col-sm-2 col-form-label text-right" for="is_active">
                                        {{ __('Status') }}
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" checked>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="settings_image" role="tabpanel">
                                <div class="form-group row">
                                    <div class="col-sm-2 col-form-label text-right" for="logo">{{ __('Logo') }}</div>
                                    <div class="col-sm-10">
                                        <input type="file" class="dropify" id="logo" name="logo" />
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-sm-2 col-form-label text-right" for="icon">{{ __('Icon') }}</div>
                                    <div class="col-sm-10">
                                        <input type="file" class="dropify" id="icon" name="icon" />
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="settings_social" role="tabpanel">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right" for="social_fb">
                                        {{ __('Facebook') }}
                                    </label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-primary">
                                                    <i class="fa fa-facebook"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" id="social_fb" name="social_fb" placeholder="Add Facebook URL...">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right" for="social_tw">
                                        {{ __('Twitter') }}
                                    </label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-primary">
                                                    <i class="fa fa-twitter"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" id="social_tw" name="social_tw" placeholder="Add Twitter URL...">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right" for="social_insta">
                                        {{ __('Instagram') }}
                                    </label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-primary">
                                                    <i class="fa fa-instagram"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" id="social_insta" name="social_insta" placeholder="Add Instagram URL...">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <label class="col-sm-2 col-form-label text-right" for="social_yt">
                                        {{ __('Youtube') }}
                                    </label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-primary">
                                                    <i class="fa fa-youtube-play"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" id="social_yt" name="social_yt" placeholder="Add Youtube URL...">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="settings_seo" role="tabpanel">
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
