@extends('layouts.admin')
@section('title', 'Facility List')

@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h2 class="page-header-title">{{ __('Facility List') }}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Facilities') }}</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('Facility List') }}</a></li>
                </ol>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            @if (Auth::guard('admin')->user()->can('Facilities.Create'))
            <a href="{{ url('admin/facility/create') }}" class="btn btn-success text-white">{{ __('Add Facility') }}</a>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            @if (session('message'))
                @include('alertMessage.admin.success')
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <livewire:admin.facility.index />
        </div>
    </div>
</div>
@endsection
