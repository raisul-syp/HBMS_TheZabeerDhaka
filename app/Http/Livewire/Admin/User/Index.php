<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\Admin;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $user;
    public $user_id;

    public function deleteRecord($user_id)
    {
        $this->user_id = $user_id;
    }

    public function destroyRecord()
    { 
        if(is_null($this->user) || !$this->user->can('Users.Delete')) {
            abort(403, 'Sorry! You do not have permission to delete any User.');
        }

        $users =  Admin::find($this->user_id);
        $users->is_delete = '0';
        $users->update();
        return redirect('admin/user')->with('message','User Has Been Deleted Successfully.');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $users = Admin::where('is_delete','1')->orderBy('id','ASC')->paginate(10);
        $roles = Role::all()->where('is_active', 1)->where('is_delete', 1);
        $serialNo = ($users->perPage() * ($users->currentPage() - 1)) + 1;
        return view('livewire.admin.user.index', compact('users', 'roles', 'serialNo'));
    }
}
