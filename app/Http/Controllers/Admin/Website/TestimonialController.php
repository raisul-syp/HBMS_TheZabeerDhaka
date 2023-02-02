<?php

namespace App\Http\Controllers\Admin\Website;

use App\Models\Hotel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Website\Testimonial;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Website\TestimonialFormRequest;

class TestimonialController extends Controller
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
        if(is_null($this->user) || !$this->user->can('Website.Testimonials.Index')) {
            abort(403, 'Sorry! You do not have permission to view any Testimonial of Website.');
        }
        
        return view('admin.website.testimonial.index');
    }

    public function create()
    {
        if(is_null($this->user) || !$this->user->can('Website.Testimonials.Create')) {
            abort(403, 'Sorry! You do not have permission to create any Testimonial of Website.');
        }
        
        return view('admin.website.testimonial.create');
    }

    public function store(TestimonialFormRequest $request)
    {
        if(is_null($this->user) || !$this->user->can('Website.Testimonials.Create')) {
            abort(403, 'Sorry! You do not have permission to create any Testimonial of Website.');
        }
        
        $validatedData = $request->validated();

        $testimonial = new Testimonial();

        $testimonial->name = $validatedData['name'];
        $testimonial->designation = $validatedData['designation'];
        $testimonial->company = $validatedData['company'];
        $testimonial->message = $validatedData['message'];
        $testimonial->slug = Str::slug($validatedData['slug']);
        $testimonial->display_order = $validatedData['display_order'];

        if($request->hasFile('image')){
            $uploadPath = 'frontend/images/testimonials';
            $file = $request->file('image');

            $extension = $file->getClientOriginalExtension();
            $filename = Str::slug($testimonial->name).'.'.$extension;
            $file->move($uploadPath,$filename);

            $testimonial->image = $filename;
        }

        $testimonial->meta_title = $validatedData['meta_title'];
        $testimonial->meta_keyword = $validatedData['meta_keyword'];
        $testimonial->meta_decription = $validatedData['meta_decription'];

        $testimonial->is_active = $request->is_active == true ? '1':'0';
        $testimonial->created_by = $validatedData['created_by'];
        $testimonial->save();

        return redirect('admin/website/testimonials')->with('message','Congratulations! New Testimonial Has Been Created Successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        if(is_null($this->user) || !$this->user->can('Website.Testimonials.Edit')) {
            abort(403, 'Sorry! You do not have permission to edit any Testimonial of Website.');
        }
        
        return view('admin.website.testimonial.edit', compact('testimonial'));
    }

    public function update(TestimonialFormRequest $request, $testimonial)
    {
        if(is_null($this->user) || !$this->user->can('Website.Testimonials.Edit')) {
            abort(403, 'Sorry! You do not have permission to edit any Testimonial of Website.');
        }
        
        $validatedData = $request->validated();

        $testimonial = Testimonial::findOrFail($testimonial);

        $testimonial->name = $validatedData['name'];
        $testimonial->designation = $validatedData['designation'];
        $testimonial->company = $validatedData['company'];
        $testimonial->message = $validatedData['message'];
        $testimonial->slug = Str::slug($validatedData['slug']);
        $testimonial->display_order = $validatedData['display_order'];

        if($request->hasFile('image')){
            $uploadPath = 'frontend/images/testimonials';
            $previousPath = 'frontend/images/testimonials/'.$testimonial->image;
            if(File::exists($previousPath)){
                File::delete($previousPath);
            }
            $file = $request->file('image');

            $extension = $file->getClientOriginalExtension();
            $filename = Str::slug($testimonial->name).'.'.$extension;
            $file->move($uploadPath,$filename);

            $testimonial->image = $filename;
        }

        $testimonial->meta_title = $validatedData['meta_title'];
        $testimonial->meta_keyword = $validatedData['meta_keyword'];
        $testimonial->meta_decription = $validatedData['meta_decription'];

        $testimonial->is_active = $request->is_active == true ? '1':'0';
        $testimonial->updated_by = $validatedData['updated_by'];
        $testimonial->update();

        return redirect('admin/website/testimonials')->with('message','Congratulations! New Testimonial Has Been Updated Successfully.');
    }
}
