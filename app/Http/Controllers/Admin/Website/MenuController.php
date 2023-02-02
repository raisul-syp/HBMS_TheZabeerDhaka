<?php

namespace App\Http\Controllers\Admin\Website;

use App\Models\Hotel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Website\NavigationMenu;
use App\Http\Requests\Website\NavmenuFormRequest;

class MenuController extends Controller
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
        if(is_null($this->user) || !$this->user->can('Website.Menu.Index')) {
            abort(403, 'Sorry! You do not have permission to view any Menu of Website.');
        }
        
        return view('admin.website.menu.index');
    }

    public function create()
    {
        if(is_null($this->user) || !$this->user->can('Website.Menu.Create')) {
            abort(403, 'Sorry! You do not have permission to create any Menu of Website.');
        }
        
        return view('admin.website.menu.create');
    }

    public function store(NavmenuFormRequest $request)
    {
        if(is_null($this->user) || !$this->user->can('Website.Menu.Create')) {
            abort(403, 'Sorry! You do not have permission to create any Menu of Website.');
        }
        
        $validatedData = $request->validated();

        $menu = new NavigationMenu();

        $menu->name = $validatedData['name'];
        $menu->slug = Str::slug($validatedData['slug']);
        $menu->display_order = $validatedData['display_order'];

        $menu->meta_title = $validatedData['meta_title'];
        $menu->meta_keyword = $validatedData['meta_keyword'];
        $menu->meta_decription = $validatedData['meta_decription'];

        $menu->is_active = $request->is_active == true ? '1':'0';
        $menu->created_by = $validatedData['created_by'];
        $menu->save();

        return redirect('admin/website/menu')->with('message','Congratulations! New Navigation Menu Has Been Created Successfully.');
    }

    public function edit(NavigationMenu $menu)
    {
        if(is_null($this->user) || !$this->user->can('Website.Menu.Edit')) {
            abort(403, 'Sorry! You do not have permission to edit any Menu of Website.');
        }
        
        return view('admin.website.menu.edit', compact('menu'));
    }

    public function update(NavmenuFormRequest $request, $menu)
    {
        if(is_null($this->user) || !$this->user->can('Website.Menu.Edit')) {
            abort(403, 'Sorry! You do not have permission to edit any Menu of Website.');
        }
        
        $validatedData = $request->validated();

        $menu = NavigationMenu::findOrFail($menu);

        $menu->name = $validatedData['name'];
        $menu->slug = Str::slug($validatedData['slug']);
        $menu->display_order = $validatedData['display_order'];

        $menu->meta_title = $validatedData['meta_title'];
        $menu->meta_keyword = $validatedData['meta_keyword'];
        $menu->meta_decription = $validatedData['meta_decription'];

        $menu->is_active = $request->is_active == true ? '1':'0';
        $menu->updated_by = $validatedData['updated_by'];
        $menu->update();

        return redirect('admin/website/menu')->with('message','Congratulations! New Navigation Menu Has Been Updated Successfully.');
    }
}
