@extends('layouts.guest')
@section('title', 'Edit My Profile')
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
                        <h4>Edit My Profile</h4>
                    </div>
                    <div class="section_breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Guest</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('guest/profile') }}">My Profile</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit My Profile</a></li>
                        </ol>
                    </div>
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
                    @endforeach
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ url('guest/profile/edit/'.$guests->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card profile-card">
                            <div class="card-header">
                                <div class="header-title">
                                    <h4>Edit Personal Information</h4>
                                    <div class="profile-buttons">
                                        <a href="{{ url('guest/profile/') }}" class="btn btn-icon btn-square btn-outline-primary list-button">
                                            <i data-feather="chevron-left"></i>
                                            <span>Back To Profile</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <table class="table">
                                            <tbody>
                                            <tr >
                                                <th class="text-start">First Name <small class="text-danger">*</small></th>
                                                <td class="text-start">
                                                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $guests->first_name }}" placeholder="First Name">
                                                    @error('first_name')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-start">Last Name <small class="text-danger">*</small></th>
                                                <td class="text-start">
                                                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $guests->last_name }}" placeholder="Last Name">
                                                    @error('last_name')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-start">Email Address <small class="text-danger">*</small></th>
                                                <td class="text-start">
                                                    <input type="email" class="form-control" id="email" name="email" value="{{ $guests->email }}" placeholder="Email Address">
                                                    @error('email')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-start">Phone Number</th>
                                                <td class="text-start">
                                                    <input type="tel" class="form-control" id="phone" name="phone" value="{{ $guests->phone }}" placeholder="Phone Number">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-start">Address</th>
                                                <td class="text-start">
                                                    <input type="text" class="form-control" id="address" name="address" value="{{ $guests->address }}" placeholder="Address">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-start">City</th>
                                                <td class="text-start">
                                                    <input type="text" class="form-control" id="city" name="city" value="{{ $guests->city }}" placeholder="City">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-start">State</th>
                                                <td class="text-start">
                                                    <input type="text" class="form-control" id="state" name="state" value="{{ $guests->state }}" placeholder="State">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-start">Postal Code</th>
                                                <td class="text-start">
                                                    <input type="number" class="form-control" id="postal_code" name="postal_code" value="{{ $guests->postal_code }}" placeholder="Postal Code">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-start">Country</th>
                                                <td class="text-start">
                                                    <div class="input-wrapper">
                                                        <select class="form-control guest-select" id="country" name="country" >
                                                            <option selected disabled>--Select Your Country--</option>
                                                            @forelse ($countries as $country)
                                                            <option value="{{ $country->country_name }}" {{ old('country', $guest->country) == $country->country_name ? 'selected' : '' }}>{{ $country->country_name }}</option>
                                                            @empty
                                                            <option>No Data</option>
                                                            @endforelse
                                                        </select>
                                                        <span class="lnr lnr-chevron-down icon"></span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-start">Gender</th>
                                                <td class="text-start">
                                                    <div class="input-wrapper">
                                                        <select class="form-control guest-select" id="gender" name="gender" >
                                                            <option selected disabled>--Select Your Gender--</option>
                                                            <option value="Male" {{ old('gender', $guest->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                                            <option value="Female" {{ old('gender', $guest->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                                                        </select>
                                                        <span class="lnr lnr-chevron-down icon"></span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-start">Date of Birth</th>
                                                <td class="text-start">
                                                    <div class="input-wrapper">
                                                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ $guest->date_of_birth }}">
                                                        <span class="lnr lnr-calendar-full icon"></span>
                                                    </div>
                                                </td>

                                                <input type="text" hidden id="updated_by" name="updated_by" value="5">
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-4">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th class="text-start">Profile Photo</th>
                                                </tr>
                                                <tr>
                                                    <td class="text-start">
                                                        <input type="file" class="dropify" id="profile_photo" name="profile_photo" data-default-file="{{ asset('uploads/guests/profile_photo/'.$guests->profile_photo) }}" />
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <th class="text-start">Cover Photo</th>
                                                </tr>
                                                <tr>
                                                    <td class="text-start">
                                                        <input type="file" class="dropify" id="cover_photo" name="cover_photo" data-default-file="{{ asset('uploads/guests/cover_photo/'.$guests->cover_photo) }}" />
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
                                        {{ __('Update') }}
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
