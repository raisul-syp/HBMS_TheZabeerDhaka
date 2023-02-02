<?php

namespace App\Http\Livewire\Admin\Permission;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $user;
    public $permission_id;

    public function deleteRecord($permission_id)
    {
        $this->permission_id = $permission_id;
    }

    public function destroyRecord()
    { 
        if(is_null($this->user) || !$this->user->can('Permission.Delete')) {
            abort(403, 'Sorry! You do not have permission to delete any Permission.');
        }

        $permission = Permission::find($this->permission_id);
        $permission->is_delete = '0';
        $permission->update();
        return redirect('admin/role-permission/permission')->with('message','Permission Has Been Deleted Successfully.');
        $this->dispatchBrowserEvent('close-modal');
    }
    
    public function render()
    {
        $permissions = Permission::where('is_delete','1')->orderBy('id','ASC')->paginate(10);
        $serialNo = ($permissions->perPage() * ($permissions->currentPage() - 1)) + 1;
        return view('livewire.admin.permission.index', compact('permissions', 'serialNo'));
    }
}
