<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hotel;
use App\Models\Wellness;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\WellnessFormRequest;

class WellnessController extends Controller
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
        if(is_null($this->user) || !$this->user->can('Wellness.Index')) {
            abort(403, 'Sorry! You do not have permission to view any Wellness.');
        }
        
        return view('admin.wellness.index');
    }

    public function create()
    {
        if(is_null($this->user) || !$this->user->can('Wellness.Create')) {
            abort(403, 'Sorry! You do not have permission to create any Wellness.');
        }
        
        return view('admin.wellness.create');
    }

    public function store(WellnessFormRequest $request)
    {
        if(is_null($this->user) || !$this->user->can('Wellness.Create')) {
            abort(403, 'Sorry! You do not have permission to create any Wellness.');
        }
        
        $validatedData = $request->validated();

        $wellness = new Wellness();

        $wellness->name = $validatedData['name'];
        $wellness->slug = Str::slug($validatedData['slug']);
        $wellness->short_description = $validatedData['short_description'];
        $wellness->long_description = $validatedData['long_description'];

        if($request->hasFile('logo_image')){
            $logoUploadPath = 'uploads/wellness/logo';
            $logoFile = $request->file('logo_image');

            $logoExtension = $logoFile->getClientOriginalExtension();
            $logoFilename = Str::slug($wellness->name).'.'.$logoExtension;
            $logoFile->move($logoUploadPath,$logoFilename);

            $wellness->logo_image = $logoFilename;
        }

        $wellness->meta_title = $validatedData['meta_title'];
        $wellness->meta_keyword = $validatedData['meta_keyword'];
        $wellness->meta_decription = $validatedData['meta_decription'];

        $wellness->is_active = $request->is_active == true ? '1':'0';
        $wellness->created_by = $validatedData['created_by'];
        $wellness->save();

        if($request->hasFile('image')){
            $uploadPath = 'uploads/wellness/';
            $i = 1;

            foreach($request->file('image') as $imageFile){
                $extension = $imageFile->getClientOriginalExtension();
                $filename =  $wellness->slug.'-'.time().'-'.$i++.'.'.$extension;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.$filename;

                $wellness->wellnessImages()->create([
                    'wellness_id' => $wellness->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }

        return redirect('admin/wellness')->with('message','Congratulations! New Wellness Has Been Created Successfully.');
    }

    public function edit(Wellness $wellness)
    {
        if(is_null($this->user) || !$this->user->can('Wellness.Edit')) {
            abort(403, 'Sorry! You do not have permission to edit any Wellness.');
        }
        
        return view('admin.wellness.edit', compact('wellness'));
    }

    public function update(WellnessFormRequest $request, int $wellness_id)
    {
        if(is_null($this->user) || !$this->user->can('Wellness.Edit')) {
            abort(403, 'Sorry! You do not have permission to edit any Wellness.');
        }
        
        $validatedData = $request->validated();

        $wellness = Wellness::findOrFail($wellness_id);

        $wellness->name = $validatedData['name'];
        $wellness->slug = Str::slug($validatedData['slug']);
        $wellness->short_description = $validatedData['short_description'];
        $wellness->long_description = $validatedData['long_description'];

        if($request->hasFile('logo_image')){
            $logoUploadPath = 'uploads/wellness/logo';
            $logoPreviousPath = 'uploads/wellness/logo/'.$wellness->logo_image;
            if(File::exists($logoPreviousPath)){
                File::delete($logoPreviousPath);
            }
            $logoFile = $request->file('logo_image');

            $logoExtension = $logoFile->getClientOriginalExtension();
            $logoFilename = Str::slug($wellness->name).'.'.$logoExtension;
            $logoFile->move($logoUploadPath,$logoFilename);

            $wellness->logo_image = $logoFilename;
        }

        $wellness->meta_title = $validatedData['meta_title'];
        $wellness->meta_keyword = $validatedData['meta_keyword'];
        $wellness->meta_decription = $validatedData['meta_decription'];

        $wellness->is_active = $request->is_active == true ? '1':'0';
        $wellness->updated_by = $validatedData['updated_by'];
        $wellness->update();

        if($request->hasFile('image')){
            $uploadPath = 'uploads/wellness/';
            $i = 1;

            foreach($request->file('image') as $imageFile){
                $extension = $imageFile->getClientOriginalExtension();
                $filename =  $wellness->slug.'-'.time().'-'.$i++.'.'.$extension;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.$filename;

                $wellness->wellnessImages()->create([
                    'wellness_id' => $wellness->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }

        return redirect('admin/wellness')->with('message','Congratulations! New Wellness Has Been Updated Successfully.');
    }
}
