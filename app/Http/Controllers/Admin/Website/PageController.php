<?php

namespace App\Http\Controllers\Admin\Website;

use App\Models\Hotel;
use Illuminate\Support\Str;
use App\Models\Website\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Website\PageFormRequest;

class PageController extends Controller
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
        if(is_null($this->user) || !$this->user->can('Website.Pages.Index')) {
            abort(403, 'Sorry! You do not have permission to view any Page of Website.');
        }
        
        return view('admin.website.page.index');
    }

    public function create()
    {
        if(is_null($this->user) || !$this->user->can('Website.Pages.Create')) {
            abort(403, 'Sorry! You do not have permission to create any Page of Website.');
        }
        
        return view('admin.website.page.create');
    }

    public function store(PageFormRequest $request)
    {
        if(is_null($this->user) || !$this->user->can('Website.Pages.Create')) {
            abort(403, 'Sorry! You do not have permission to create any Page of Website.');
        }
        
        $validatedData = $request->validated();

        $page = new Page();

        $page->name = $validatedData['name'];
        $page->title = $validatedData['title'];
        $page->sub_title = $validatedData['sub_title'];
        $page->short_description = $validatedData['short_description'];
        $page->long_description = $validatedData['long_description'];
        $page->slug = Str::slug($validatedData['slug']);
        $page->display_order = $validatedData['display_order'];

        if($request->hasFile('image')){
            $uploadPath = 'frontend/images/pages';
            $file = $request->file('image');

            $extension = $file->getClientOriginalExtension();
            $filename = Str::slug($page->name).'.'.$extension;
            $file->move($uploadPath,$filename);

            $page->image = $filename;
        }

        $page->meta_title = $validatedData['meta_title'];
        $page->meta_keyword = $validatedData['meta_keyword'];
        $page->meta_decription = $validatedData['meta_decription'];

        $page->footer_item = $request->footer_item == true ? '1':'0';
        $page->is_active = $request->is_active == true ? '1':'0';
        $page->created_by = $validatedData['created_by'];
        $page->save();

        return redirect('admin/website/pages')->with('message','Congratulations! New Page Has Been Created Successfully.');
    }

    public function edit(Page $page)
    {
        if(is_null($this->user) || !$this->user->can('Website.Pages.Edit')) {
            abort(403, 'Sorry! You do not have permission to edit any Page of Website.');
        }
        
        return view('admin.website.page.edit', compact('page'));
    }

    public function update(PageFormRequest $request, $page)
    {
        if(is_null($this->user) || !$this->user->can('Website.Pages.Edit')) {
            abort(403, 'Sorry! You do not have permission to edit any Page of Website.');
        }
        
        $validatedData = $request->validated();

        $page = Page::findOrFail($page);

        $page->name = $validatedData['name'];
        $page->title = $validatedData['title'];
        $page->sub_title = $validatedData['sub_title'];
        $page->short_description = $validatedData['short_description'];
        $page->long_description = $validatedData['long_description'];
        $page->slug = Str::slug($validatedData['slug']);
        $page->display_order = $validatedData['display_order'];

        if($request->hasFile('image')){
            $uploadPath = 'frontend/images/pages';
            $previousPath = 'frontend/images/pages/'.$page->image;
            if(File::exists($previousPath)){
                File::delete($previousPath);
            }
            $file = $request->file('image');

            $extension = $file->getClientOriginalExtension();
            $filename = Str::slug($page->name).'.'.$extension;
            $file->move($uploadPath,$filename);

            $page->image = $filename;
        }

        $page->meta_title = $validatedData['meta_title'];
        $page->meta_keyword = $validatedData['meta_keyword'];
        $page->meta_decription = $validatedData['meta_decription'];

        $page->footer_item = $request->footer_item == true ? '1':'0';
        $page->is_active = $request->is_active == true ? '1':'0';
        $page->updated_by = $validatedData['updated_by'];
        $page->update();

        return redirect('admin/website/pages')->with('message','Congratulations! New Page Has Been Updated Successfully.');
    }
}
