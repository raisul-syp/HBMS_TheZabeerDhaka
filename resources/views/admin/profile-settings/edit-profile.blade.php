@extends('layouts.admin')
@section('title', 'Edit My Profile')

@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h2 class="page-header-title">{{ __('Edit My Profile') }}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Profile Settings') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('My Profile') }}</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('Edit My Profile') }}</a></li>
                </ol>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <a href="{{ url('admin/profile-settings/my-profile') }}" class="btn btn-dark text-white">{{ __('Back To Profile') }}</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form action="{{ url('admin/profile-settings/my-profile/edit/'.$user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <div class="form-title">
                                    <h4>{{ __('User Info') }}</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="first_name">
                                                {{ __('First Name') }}
                                                <small class="text-danger">*</small>
                                            </label>
                                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}" placeholder="Add first name...">
                                            @error('first_name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="last_name">
                                                {{ __('Last Name') }}
                                                <small class="text-danger">*</small>
                                            </label>
                                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}" placeholder="Add last name...">
                                            @error('last_name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="email">
                                                {{ __('Email') }}
                                                <small class="text-danger">*</small>
                                            </label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="Add email address...">
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="phone">
                                                {{ __('Phone') }}
                                            </label>
                                            <input type="tel" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" placeholder="Add phone number...">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="role_as">
                                                {{ __('Role') }}
                                            </label>
                                            <select class="form-control" id="role_as" name="role_as" >
                                                <option value="0" {{ old('role_as', $user->role_as) == 0 ? 'selected' : '' }}>Admin</option>
                                                <option value="1" {{ old('role_as', $user->role_as) == 1 ? 'selected' : '' }}>Staff</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="gender">
                                                {{ __('Gender') }}
                                            </label>
                                            <select class="form-control" id="gender" name="gender" >
                                                <option selected disabled>--Select Your Gender--</option>
                                                <option value="Male" {{ old('gender', $user->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                                <option value="Female" {{ old('gender', $user->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="date_of_birth">
                                                {{ __('Date Of Birth') }}
                                            </label>
                                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ $user->date_of_birth }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="address">
                                                {{ __('Address') }}
                                            </label>
                                            <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}" placeholder="Add address">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="city">
                                                {{ __('City') }}
                                            </label>
                                            <input type="text" class="form-control" id="city" name="city" value="{{ $user->city }}" placeholder="Add city">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="state">
                                                {{ __('State') }}
                                            </label>
                                            <input type="text" class="form-control" id="state" name="state" value="{{ $user->state }}" placeholder="Add state">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="postal_code">
                                                {{ __('Postal Code') }}
                                            </label>
                                            <input type="number" class="form-control" id="postal_code" name="postal_code" value="{{ $user->postal_code }}" placeholder="Add postal code">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="country">
                                                {{ __('Country') }}
                                            </label>
                                            <select class="form-control" id="country" name="country" >
                                                <option selected disabled>--Select Your Country--</option>
                                                @forelse ($countries as $country)
                                                <option value="{{ $country->country_name }}" {{ old('country', $user->country) == $country->country_name ? 'selected' : '' }}>{{ $country->country_name }}</option>
                                                @empty
                                                <option>No Data</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="admin_comment">
                                                {{ __('Admin Comment') }}
                                            </label>
                                            <textarea class="form-control" id="admin_comment" name="admin_comment" rows="4" placeholder="Add admin comment">{{ $user->admin_comment }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <div class="form-title">
                                    <h4>{{ __('Images') }}</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="profile_photo">
                                                {{ __('Profile Photo') }}
                                            </label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="profile_photo" name="profile_photo">
                                                <label class="custom-file-label">{{ __('Choose file') }}</label>
                                            </div>

                                            <div class="text-center mt-2">
                                                @if ($user->profile_photo)
                                                <img src="{{ asset('uploads/users/profile_photo/'.$user->profile_photo) }}" alt="" class="user-preview-profilePhoto">
                                                @else
                                                <img src="{{ asset('admin/images/no-photo.png') }}" alt="" class="user-preview-profilePhoto">
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="cover_photo">
                                                {{ __('Cover Photo') }}
                                            </label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="cover_photo" name="cover_photo">
                                                <label class="custom-file-label">{{ __('Choose file') }}</label>
                                            </div>

                                            <div class="text-center mt-2">
                                                @if ($user->cover_photo)
                                                <img src="{{ asset('uploads/users/cover_photo/'.$user->cover_photo) }}" alt="" class="user-preview-coverPhoto">
                                                @else
                                                <img src="{{ asset('admin/images/no-photo.png') }}" alt="" class="user-preview-profilePhoto">
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group d-flex">
                                            <div for="is_active">
                                                {{ __('Status') }}
                                            </div>
                                            <div class="form-check ml-4">
                                                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" checked>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="text" hidden id="updated_by" name="updated_by" value="{{ Auth::guard('admin')->user()->role_as }}">
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
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
