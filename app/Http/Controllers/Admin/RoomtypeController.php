<?php

namespace App\Http\Controllers\Admin;

use App\Models\Roomtype;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\RoomtypeFormRequest;

class RoomtypeController extends Controller
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
        if(is_null($this->user) || !$this->user->can('RoomType.Index')) {
            abort(403, 'Sorry! You do not have permission to view any Room Type.');
        }
        
        return view('admin.roomtype.index');
    }

    public function create()
    {
        if(is_null($this->user) || !$this->user->can('RoomType.Create')) {
            abort(403, 'Sorry! You do not have permission to create any Room Type.');
        }
        
        return view('admin.roomtype.create');
    }

    public function store(RoomtypeFormRequest $request)
    {
        if(is_null($this->user) || !$this->user->can('RoomType.Create')) {
            abort(403, 'Sorry! You do not have permission to create any Room Type.');
        }
        
        $validatedData = $request->validated();

        $roomtype = new Roomtype();

        $roomtype->name = $validatedData['name'];
        $roomtype->slug = Str::slug($validatedData['slug']) ;
        $roomtype->description = $validatedData['description'];

        if($request->hasFile('image')){
            $file = $request->file('image');

            $extension = $file->getClientOriginalExtension();
            $filename = $roomtype->slug.'.'.$extension;
            $file->move('uploads/roomviews/',$filename);

            $roomtype->image = $filename;
        }

        $roomtype->meta_title = $validatedData['meta_title'];
        $roomtype->meta_keyword = $validatedData['meta_keyword'];
        $roomtype->meta_decription = $validatedData['meta_decription'];
        $roomtype->is_active =  $request->is_active == true ? '1':'0';
        $roomtype->created_by = $validatedData['created_by'];
        $roomtype->save();

        return redirect('admin/roomtype')->with('message','Congratulations! New Room Type Has Been Created Successfully.');
    }

    public function edit(Roomtype $roomtype)
    {
        if(is_null($this->user) || !$this->user->can('RoomType.Edit')) {
            abort(403, 'Sorry! You do not have permission to edit any Room Type.');
        }
        
        return view('admin.roomtype.edit', compact('roomtype'));
    }

    public function update(RoomtypeFormRequest $request, $roomtype)
    {
        if(is_null($this->user) || !$this->user->can('RoomType.Edit')) {
            abort(403, 'Sorry! You do not have permission to edit any Room Type.');
        }
        
        $validatedData = $request->validated();
        
        $roomtype = Roomtype::findOrFail($roomtype);

        $roomtype->name = $validatedData['name'];
        $roomtype->slug = Str::slug($validatedData['slug']);
        $roomtype->description = $validatedData['description'];

        if($request->hasFile('image')){
            $path = 'uploads/roomviews/'.$roomtype->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');

            $extension = $file->getClientOriginalExtension();
            $filename = $roomtype->slug.'.'.$extension;
            $file->move('uploads/roomviews/',$filename);

            $roomtype->image = $filename;
        }
        
        $roomtype->meta_title = $validatedData['meta_title'];
        $roomtype->meta_keyword = $validatedData['meta_keyword'];
        $roomtype->meta_decription = $validatedData['meta_decription'];
        $roomtype->is_active = $request->is_active == true ? '1':'0'; 
        $roomtype->updated_by = $validatedData['updated_by'];
        $roomtype->update();

        return redirect('admin/roomtype')->with('message','Congratulations! Room Type Has Been Updated Successfully.');
    }
}
