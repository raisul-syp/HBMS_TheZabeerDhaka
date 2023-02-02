<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index()
    {
        if(is_null($this->user) || !$this->user->can('Role.Index')) {
            abort(403, 'Sorry! You do not have permission to view any Role.');
        }
        
        return view('admin.role.index');
    }

    public function create()
    {
        if(is_null($this->user) || !$this->user->can('Role.Create')) {
            abort(403, 'Sorry!, You do not have permission to create any Role.');
        }

        $all_permissions = Permission::all();
        $permission_groups = Admin::getPermissionGroups();
        return view('admin.role.create', compact('all_permissions', 'permission_groups'));
    }

    public function store(Request $request)
    {
        if(is_null($this->user) || !$this->user->can('Role.Create')) {
            abort(403, 'Sorry!, You do not have permission to create any Role.');
        }

        $request->validate([
            'name' => 'required|max:100|unique:roles',
        ]);

        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'admin',
            'is_active' => $request->is_active == true ? '1':'0',
            'created_by' => $request->created_by,
        ]);

        $permission = $request->input('permissions');

        if(!empty($permission)) {
            $role->syncPermissions($permission);
        }

        return redirect('admin/role-permission/role')->with('message','Congratulations! New Role Has Been Created Successfully.');
    }

    public function edit(Role $role)
    {
        if(is_null($this->user) || !$this->user->can('Role.Edit')) {
            abort(403, 'Sorry!, You do not have permission to edit any Role.');
        }

        $all_permissions = Permission::all();
        $permission_groups = Admin::getPermissionGroups();
        return view('admin.role.edit', compact('role', 'all_permissions', 'permission_groups'));
    }

    public function update(Request $request, $role)
    {
        if(is_null($this->user) || !$this->user->can('Role.Edit')) {
            abort(403, 'Sorry!, You do not have permission to edit any Role.');
        }

        $request->validate([
            'name' => 'required|max:100|unique:roles,name,'.$role,
        ]);

        $role = Role::findOrFail($role);

        $role->update([
            'name' => $request->name,
            'guard_name' => 'admin',
            'is_active' => $request->is_active == true ? '1':'0',
            'updated_by' => $request->updated_by,
        ]);

        $permission = $request->input('permissions');

        if(!empty($permission)) {
            $role->syncPermissions($permission);
        }

        return redirect('admin/role-permission/role')->with('message','Congratulations! New Role Has Been Updated Successfully.');
    }
}
