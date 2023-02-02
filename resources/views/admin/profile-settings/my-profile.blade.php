@extends('layouts.admin')
@section('title', 'My Profile')

@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h2 class="page-header-title">{{ __('My Profile') }}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Profile Settings') }}</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('My Profile') }}</a></li>
                </ol>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <a href="{{ url('admin/profile-settings/my-profile/edit/'.$users->id) }}" class="btn btn-warning text-white mr-1">{{ __('Edit Profile') }}</a>
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
            <div class="card">
                <div class="profile">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo">
                                @if ($users->cover_photo)
                                <img src="{{ asset('uploads/users/cover_photo/'.$users->cover_photo) }}" class="img-fluid w-100" alt="">
                                @else
                                <img src="{{ asset('admin/images/profile/cover.jpg') }}" class="img-fluid" alt="">
                                @endif
                            </div>
                            <div class="profile-photo">
                                @if ($users->profile_photo)
                                <img src="{{ asset('uploads/users/profile_photo/'.$users->profile_photo) }}" class="img-fluid rounded-circle" alt="">
                                @else
                                <img src="{{ asset('admin/images/profile/profile.png') }}" class="img-fluid rounded-circle" alt="">
                                @endif
                            </div>
                        </div>
                        <div class="profile-info">
                            <div class="row justify-content-end">
                                <div class="col-lg-8">
                                    <div class="profile-details">
                                        <table class="table table-bordered table-responsive-sm">
                                            <tbody>
                                            <tr>
                                                <th class="text-start">Full Name</th>
                                                <td class="text-start">{{ $users->first_name.' '.$users->last_name }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-start">Email Address</th>
                                                <td class="text-start">{{ $users->email }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-start">Phone Number</th>
                                                <td class="text-start">
                                                    @if ($users->phone)
                                                    {{ $users->phone }}
                                                    @else
                                                    <strong class="text-danger">No Data</strong>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-start">Address</th>
                                                <td class="text-start">
                                                    @if ($users->address && $users->city || $users->state && $users->postal_code && $users->country)
                                                    {{ $users->address.', '.$users->city.' '.$users->state.'- '.$users->postal_code.', '.$users->country.'.' }}
                                                    @else
                                                    <strong class="text-danger">No Data</strong>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-start">Gender</th>
                                                <td class="text-start">
                                                    @if ($users->gender)
                                                    {{ $users->gender }}
                                                    @else
                                                    <strong class="text-danger">No Data</strong>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-start">Date of Birth</th>
                                                <td class="text-start">
                                                    @if ($users->date_of_birth)
                                                    {{ date('d F, Y', strtotime($users->date_of_birth)) }}
                                                    @else
                                                    <strong class="text-danger">No Data</strong>
                                                    @endif
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
