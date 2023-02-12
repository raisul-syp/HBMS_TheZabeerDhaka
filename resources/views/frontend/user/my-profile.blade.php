@extends('layouts.guest')
@section('title', 'My Profile')
@foreach ($settings as $setting)
@section('meta_decription', "$setting->meta_decription")
@section('meta_keyword', "$setting->meta_keyword")
@endforeach

@section('content')
<section id="about_section" class="about_section content_section" style="padding: 40px 0;">
    <div class="about_section_inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title">
                        <h4>My Profile</h4>
                    </div>
                    <div class="section_breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Guest</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">My Profile</a></li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-12">
                    @if (session('message'))
                    <div class="alert alert-success solid alert-right-icon alert-dismissible fade show">                       
                        <span><i class="fas fa-check"></i></span>
                        {{ session('message') }}
                    </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card profile-card">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-header">
                                    <div class="header-title">
                                        <h4>Personal Information</h4>
                                        <div class="profile-buttons">
                                            <a href="{{ url('guest/profile/edit/'.$guests->id) }}" class="btn btn-outline-primary">
                                                <i data-feather="edit"></i>
                                                <span>Edit Profile</span>
                                            </a>
                                            <a href="{{ url('guest/change-password') }}" class="btn btn-outline-primary">
                                                <i data-feather="key"></i>
                                                <span>Change Password</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="image-body cover">
                                    @if ($guests->cover_photo != null)
                                    <img src="{{ '/uploads/guests/cover_photo/'.$guests->cover_photo }}">
                                    @else
                                    <img src="{{ asset('admin/images/no-photo.png') }}">
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="image-body profile">
                                    @if ($guests->profile_photo != null)
                                    <img src="{{ '/uploads/guests/profile_photo/'.$guests->profile_photo }}">
                                    @else
                                    <img src="{{ asset('admin/images/no-photo.png') }}">
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="card-body profile-body">
                                    <table class="table">
                                        <tbody>
                                          <tr>
                                            <th class="text-start">Full Name</th>
                                            <td class="text-start">{{ $guests->first_name.' '.$guests->last_name }}</td>
                                          </tr>
                                          <tr>
                                            <th class="text-start">Email Address</th>
                                            <td class="text-start">{{ $guests->email }}</td>
                                          </tr>
                                          <tr>
                                            <th class="text-start">Phone Number</th>
                                            <td class="text-start">
                                                @if ($guests->phone)
                                                {{ $guests->phone }}
                                                @else
                                                <strong class="text-danger">No Data</strong>
                                                @endif
                                            </td>
                                          </tr>
                                          <tr>
                                            <th class="text-start">Address</th>
                                            <td class="text-start">
                                                @if ($guests->address && $guests->city || $guests->state && $guests->postal_code && $guests->country)
                                                {{ $guests->address.', '.$guests->city.', '.$guests->state.'-'.$guests->postal_code.', '.$guests->country.'.' }}
                                                @else
                                                <strong class="text-danger">No Data</strong>
                                                @endif
                                            </td>
                                          </tr>
                                          <tr>
                                            <th class="text-start">Gender</th>
                                            <td class="text-start">
                                                @if ($guests->gender)
                                                {{ $guests->gender }}
                                                @else
                                                <strong class="text-danger">No Data</strong>
                                                @endif
                                            </td>
                                          </tr>
                                          <tr>
                                            <th class="text-start">Date of Birth</th>
                                            <td class="text-start">
                                                @if ($guests->date_of_birth)
                                                {{ date('d F, Y', strtotime($guests->date_of_birth)) }}
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
</section>

@endsection
