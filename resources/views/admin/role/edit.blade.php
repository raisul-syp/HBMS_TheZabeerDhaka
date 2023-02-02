@extends('layouts.admin')
@section('title', 'Edit Role')

@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h2 class="page-header-title">{{ __('Edit Role') }}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Role & Permission') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('admin/role-permission/role') }}">{{ __('Manage Role') }}</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('Edit Role') }}</a></li>
                </ol>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <a href="{{ url('admin/role-permission/role') }}" class="btn btn-dark text-white">{{ __('Back To List') }}</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form action="{{ url('admin/role-permission/role/edit/'.$role->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="form-title">
                            <h4>{{ __('Role Form') }}</h4>
                        </div>
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#role_info">
                                    <span>
                                        <strong>
                                            <i class="ti-info"></i>
                                            <span class="ml-2">{{ __('Role Info') }}</span>
                                        </strong>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content tabcontent-border">
                            <div class="tab-pane fade active show" id="role_info" role="tabpanel">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right" for="name">
                                        {{ __('Role Name') }}
                                        <small class="text-danger">*</small>
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}" placeholder="Add Name...">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2 col-form-label text-right" for="is_active">{{ __('Status') }}</div>
                                    <div class="col-sm-10">
                                        <label class="switch switch-square">
                                            <input type="checkbox" class="switch-input" id="is_active" name="is_active" {{ $role->is_active == '1' ? 'checked':'' }}>
                                            <span class="switch-toggle-slider"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-sm-12">
                                        <label for="permissions">{{ __('Permissions') }}</label>
                                        <div class="table-responsive">
                                            <table class="table table-bordered verticle-middle table-responsive-sm">
                                                <thead class="bg-primary text-white text-center">
                                                    <tr>
                                                        <th scope="col">Group Name</th>
                                                        <th scope="col">All</th>
                                                        <th scope="col">Index</th>
                                                        <th scope="col">Create</th>
                                                        <th scope="col">Edit</th>
                                                        <th scope="col">Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    <tr>
                                                        <th class="bg-primary">All</th>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="permissionsAll" value="1" {{ App\Models\Admin::roleHasPermissions($role, $all_permissions) ? 'checked':'' }}>
                                                            </div> 
                                                        </td>
                                                    </tr>
                                                    @php $i = 1; @endphp
                                                    @foreach ($permission_groups as $group)
                                                    <tr>
                                                        @php 
                                                            $permissions = App\Models\Admin::getpermissionsByGroupName($group->name);
                                                            $j = 1; 
                                                        @endphp
                                                        <th class="bg-primary">{{ $group->name }}</th>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input role-permission-checkbox" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)" {{ App\Models\Admin::roleHasPermissions($role, $permissions) ? 'checked':'' }}>
                                                            </div>
                                                        </td>
                                                        @foreach ($permissions as $permission)
                                                        <td class="role-{{ $i }}-management-checkbox">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input role-permission-checkbox" id="checkPermission{{ $permission->id }}" name="permissions[]" value="{{ $permission->name }}" onclick="checkSinglePermission('role-{{ $i }}-management-checkbox', '{{ $i }}Management', {{ count($permissions) }})" {{ $role->hasPermissionTo($permission->name) ? 'checked':'' }}>
                                                            </div>   
                                                        </td>
                                                        @php $j++; @endphp  
                                                        @endforeach
                                                    </tr>
                                                    @php $i++; @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
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


@section('scripts')
    <script>
        $("#permissionsAll").click(function(){
            if($(this).is(':checked')) {
                $(".role-permission-checkbox").prop('checked', true);
            }
            else {
                $(".role-permission-checkbox").prop('checked', false);
            }
        });

        function checkPermissionByGroup(className, checkThis) {
            const groupIdName = $("#"+checkThis.id);
            const classCheckBox = $('.'+className+' input');
            
            if(groupIdName.is(':checked')) {
                classCheckBox.prop('checked', true);
            }
            else {
                classCheckBox.prop('checked', false);
            }
            implementAllChecked();
        }

        function checkSinglePermission(groupClassName, groupID, countTotalPermission) {
            const classCheckbox = $('.'+groupClassName+ ' input');
            const groupIdCheckbox = $("#"+groupID);

            if($('.'+groupClassName+ ' input:checked').length == countTotalPermission) {
                groupIdCheckbox.prop('checked', true);
            }
            else {
                groupIdCheckbox.prop('checked', false);
            }
            implementAllChecked();
        }

        function implementAllChecked() {
            const countPermissions = {{ count($all_permissions) }};
            const countPermissionGroups = {{ count($permission_groups) }};

            if($('.role-permission-checkbox:checked').length >= (countPermissions + countPermissionGroups)) {
                $("#permissionsAll").prop('checked', true);
            }
            else {
                $("#permissionsAll").prop('checked', false);
            }
        }        
    </script>
@endsection
