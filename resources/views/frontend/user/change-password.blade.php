@extends('layouts.guest')
@section('title', 'Change Password')
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
                        <h4>Change Password</h4>
                    </div>
                    <div class="section_breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Guest</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('guest/profile') }}">My Profile</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Change Password</a></li>
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
                
                <div class="col-lg-12">
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger solid alert-right-icon alert-dismissible fade show">
                        <span><i class="fas fa-exclamation-triangle"></i></span>
                        {{ $error }}
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ url('guest/change-password/') }}" method="POST">
                        @csrf

                        <div class="card profile-card">
                            <div class="card-header">
                                <div class="header-title">
                                    <h4>Change Your Password</h4>
                                    <div class="profile-buttons">
                                        <a href="{{ url('guest/profile') }}" class="btn btn-icon btn-square btn-outline-primary list-button">
                                            <i data-feather="chevron-left"></i>
                                            <span>Back To Profile</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <table class="table">
                                            <tbody>
                                            <tr >
                                                <th class="text-start">Old Password <small class="text-danger">*</small></th>
                                                <td class="text-start">
                                                    <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Old Password">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-start">New Password <small class="text-danger">*</small></th>
                                                <td class="text-start">
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="New Password">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-start">Confirm Password</th>
                                                <td class="text-start">
                                                    <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Confirm Password">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-end">
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
    </div>
</section>

@endsection
