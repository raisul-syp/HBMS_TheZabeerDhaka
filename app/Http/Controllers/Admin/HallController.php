<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hall;
use App\Models\Hotel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\HallFormRequest;

class HallController extends Controller
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
        if(is_null($this->user) || !$this->user->can('Halls.Index')) {
            abort(403, 'Sorry! You do not have permission to view any Hall.');
        }
        
        return view('admin.hall.index');
    }

    public function create()
    {
        if(is_null($this->user) || !$this->user->can('Halls.Create')) {
            abort(403, 'Sorry! You do not have permission to create any Hall.');
        }
        
        return view('admin.hall.create');
    }

    public function store(HallFormRequest $request)
    {
        if(is_null($this->user) || !$this->user->can('Halls.Create')) {
            abort(403, 'Sorry! You do not have permission to create any Hall.');
        }
        
        $validatedData = $request->validated();

        $hall = new Hall();

        $hall->name = $validatedData['name'];
        $hall->slug = Str::slug($validatedData['slug']);
        $hall->short_description = $validatedData['short_description'];
        $hall->long_description = $validatedData['long_description'];

        if($request->hasFile('logo_image')){
            $logoUploadPath = 'uploads/halls/logo';
            $logoFile = $request->file('logo_image');

            $logoExtension = $logoFile->getClientOriginalExtension();
            $logoFilename = Str::slug($hall->name).'.'.$logoExtension;
            $logoFile->move($logoUploadPath,$logoFilename);

            $hall->logo_image = $logoFilename;
        }

        $hall->meta_title = $validatedData['meta_title'];
        $hall->meta_keyword = $validatedData['meta_keyword'];
        $hall->meta_decription = $validatedData['meta_decription'];

        $hall->is_active = $request->is_active == true ? '1':'0';
        $hall->created_by = $validatedData['created_by'];
        $hall->save();

        if($request->hasFile('image')){
            $uploadPath = 'uploads/halls/';
            $i = 1;

            foreach($request->file('image') as $imageFile){
                $extension = $imageFile->getClientOriginalExtension();
                $filename =  $hall->slug.'-'.time().'-'.$i++.'.'.$extension;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.$filename;

                $hall->hallImages()->create([
                    'hall_id' => $hall->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }

        return redirect('admin/hall')->with('message','Congratulations! New Hall Has Been Created Successfully.');
    }

    public function edit(Hall $hall)
    {
        if(is_null($this->user) || !$this->user->can('Halls.Edit')) {
            abort(403, 'Sorry! You do not have permission to edit any Hall.');
        }
        
        return view('admin.hall.edit', compact('hall'));
    }

    public function update(HallFormRequest $request, int $hall_id)
    {
        if(is_null($this->user) || !$this->user->can('Halls.Edit')) {
            abort(403, 'Sorry! You do not have permission to edit any Hall.');
        }
        
        $validatedData = $request->validated();

        $hall = Hall::findOrFail($hall_id);

        $hall->name = $validatedData['name'];

        $hall->slug = Str::slug($validatedData['slug']);
        $hall->short_description = $validatedData['short_description'];
        $hall->long_description = $validatedData['long_description'];

        if($request->hasFile('logo_image')){
            $logoUploadPath = 'uploads/halls/logo';
            $logoPreviousPath = 'uploads/halls/logo/'.$hall->logo_image;
            if(File::exists($logoPreviousPath)){
                File::delete($logoPreviousPath);
            }
            $logoFile = $request->file('logo_image');

            $logoExtension = $logoFile->getClientOriginalExtension();
            $logoFilename = Str::slug($hall->name).'.'.$logoExtension;
            $logoFile->move($logoUploadPath,$logoFilename);

            $hall->logo_image = $logoFilename;
        }

        $hall->meta_title = $validatedData['meta_title'];
        $hall->meta_keyword = $validatedData['meta_keyword'];
        $hall->meta_decription = $validatedData['meta_decription'];

        $hall->is_active = $request->is_active == true ? '1':'0';
        $hall->updated_by = $validatedData['updated_by'];
        $hall->update();

        if($request->hasFile('image')){
            $uploadPath = 'uploads/halls/';
            $i = 1;

            foreach($request->file('image') as $imageFile){
                $extension = $imageFile->getClientOriginalExtension();
                $filename =  $hall->slug.'-'.time().'-'.$i++.'.'.$extension;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.$filename;

                $hall->hallImages()->create([
                    'hall_id' => $hall->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }

        return redirect('admin/hall')->with('message','Congratulations! New Hall Has Been Updated Successfully.');
    }
}
