@extends('layouts.admin')
@section('title', 'Change Password')

@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h2 class="page-header-title">{{ __('Change Password') }}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Profile Settings') }}</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('Change Password') }}</a></li>
                </ol>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <a href="{{ url('admin/profile-settings/my-profile') }}" class="btn btn-dark text-white">{{ __('Back To Profile') }}</a>
        </div>
    </div>

    <div class="row mt-4">        
        <div class="col-lg-12">
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger solid alert-right-icon alert-dismissible fade show">
                <span><i class="fas fa-exclamation-triangle"></i></span>
                {{ $error }}
            </div>
            {{-- @include('alertMessage.admin.error') --}}
            @endforeach
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form action="{{ url('admin/profile-settings/change-password/') }}" method="POST">
                @csrf

                <div class="card profile-card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="form-title">
                            <h4>Change Your Password</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right" for="current_password">Old Password <small class="text-danger">*</small></label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Old Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right" for="password">New Password <small class="text-danger">*</small></label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="password" placeholder="New Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right" for="password_confirmation">Confirm Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Confirm Password">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary text-uppercase text-right">
                                {{ __('Submit') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
