@extends('layouts.admin')
@section('title', 'User List')

@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h2 class="page-header-title">{{ __('User List') }}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('User') }}</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('User List') }}</a></li>
                </ol>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            @if (Auth::guard('admin')->user()->can('Users.Create'))
            <a href="{{ url('admin/user/create') }}" class="btn btn-success text-white ml-1">{{ __('Add User') }}</a>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            @if (session('success'))
                @include('alertMessage.admin.success')
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <livewire:admin.user.index />
        </div>
    </div>
</div>
@endsection
