<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
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
        if(is_null($this->user) || !$this->user->can('Permission.Index')) {
            abort(403, 'Sorry! You do not have permission to view any Permission.');
        }
        
        return view('admin.permission.index');
    }

    public function create()
    {
        if(is_null($this->user) || !$this->user->can('Permission.Create')) {
            abort(403, 'Sorry! You do not have permission to create any Permission.');
        }
        
        return view('admin.permission.create');
    }

    public function store(Request $request)
    {
        if(is_null($this->user) || !$this->user->can('Permission.Create')) {
            abort(403, 'Sorry! You do not have permission to create any Permission.');
        }
        
        $request->validate([
            'name' => 'required|max:100|unique:permissions',
            'group_name' => 'required|max:100',
        ]);

        Permission::create([
            'name' => $request->name,
            'guard_name' => 'admin',
            'group_name' => $request->group_name,
            'is_active' => $request->is_active == true ? '1':'0',
            'created_by' => $request->created_by,
        ]);

        return redirect('admin/role-permission/permission')->with('message','Congratulations! New Permission Has Been Created Successfully.');
    }

    public function edit(Permission $permission)
    {
        if(is_null($this->user) || !$this->user->can('Permission.Edit')) {
            abort(403, 'Sorry! You do not have permission to edit any Permission.');
        }
        
        return view('admin.permission.edit', compact('permission'));
    }

    public function update(Request $request, $permission)
    {
        if(is_null($this->user) || !$this->user->can('Permission.Edit')) {
            abort(403, 'Sorry! You do not have permission to edit any Permission.');
        }
        
        $request->validate([
            'name' => 'required|max:100|unique:permissions,name,'.$permission,
            'group_name' => 'required|max:100',
        ]);

        $permission = Permission::findOrFail($permission);

        $permission->update([
            'name' => $request->name,
            'guard_name' => 'admin',
            'group_name' => $request->group_name,
            'is_active' => $request->is_active == true ? '1':'0',
            'updated_by' => $request->updated_by,
        ]);

        return redirect('admin/role-permission/permission')->with('message','Congratulations! New Permission Has Been Updated Successfully.');
    }
}
