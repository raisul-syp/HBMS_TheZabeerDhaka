<?php

namespace App\Http\Livewire\Admin\Website\Menu;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Website\NavigationMenu;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $user;
    public $menu_id;

    public function deleteRecord($menu_id)
    {
        $this->menu_id = $menu_id;
    }

    public function destroyRecord()
    {
        if(is_null($this->user) || !$this->user->can('Website.Menu.Delete')) {
            abort(403, 'Sorry! You do not have permission to delete any Menu of Website.');
        }

        $menus =  NavigationMenu::find($this->menu_id);
        $menus->is_delete = '0';
        $menus->update();

        return redirect('admin/website/menu')->with('message','Menu Has Been Deleted Successfully.');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $menus = NavigationMenu::where('is_active','1')->where('is_delete','1')->orderBy('id','ASC')->paginate(10);
        $serialNo = ($menus->perPage() * ($menus->currentPage() - 1)) + 1;
        return view('livewire.admin.website.menu.index', compact('menus', 'serialNo'));
    }
}
