<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hotel;
use App\Models\Settings;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SettingsFormRequest;

class SettingsController extends Controller
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
        if(is_null($this->user) || !$this->user->can('Settings.Index')) {
            abort(403, 'Sorry! You do not have permission to view any Settings.');
        }
        
        return view('admin.settings.index');
    }

    public function create()
    {
        if(is_null($this->user) || !$this->user->can('Settings.Create')) {
            abort(403, 'Sorry! You do not have permission to create any Settings.');
        }
        
        return view('admin.settings.create');
    }

    public function store(SettingsFormRequest $request)
    {
        if(is_null($this->user) || !$this->user->can('Settings.Create')) {
            abort(403, 'Sorry! You do not have permission to create any Settings.');
        }
        
        $validatedData = $request->validated();

        $settings = new Settings();

        $settings->name = $validatedData['name'];
        $settings->phone = $validatedData['phone'];
        $settings->email = $validatedData['email'];
        $settings->address = $validatedData['address'];
        $settings->display_order = $validatedData['display_order'];

        if($request->hasFile('logo')){
            $logoUploadPath = 'uploads/site';
            $logoFile = $request->file('logo');

            $logoExtension = $logoFile->getClientOriginalExtension();
            $logoFilename = 'logo-'.Str::slug($settings->name).'.'.$logoExtension;
            $logoFile->move($logoUploadPath,$logoFilename);

            $settings->logo = $logoFilename;
        }

        if($request->hasFile('icon')){
            $iconUploadPath = 'uploads/site';
            $iconFile = $request->file('icon');

            $iconExtension = $iconFile->getClientOriginalExtension();
            $iconFilename = 'icon-'.Str::slug($settings->name).'.'.$iconExtension;
            $iconFile->move($iconUploadPath,$iconFilename);

            $settings->icon = $iconFilename;
        }

        $settings->social_fb = $validatedData['social_fb'];
        $settings->social_tw = $validatedData['social_tw'];
        $settings->social_insta = $validatedData['social_insta'];
        $settings->social_yt = $validatedData['social_yt'];

        $settings->meta_title = $validatedData['meta_title'];
        $settings->meta_keyword = $validatedData['meta_keyword'];
        $settings->meta_decription = $validatedData['meta_decription'];

        $settings->is_active = $request->is_active == true ? '1':'0';
        $settings->created_by = $validatedData['created_by'];
        $settings->save();

        return redirect('admin/settings')->with('message','Congratulations! New Settings Has Been Created Successfully.');
    }

    public function edit(Settings $settings)
    {
        if(is_null($this->user) || !$this->user->can('Settings.Edit')) {
            abort(403, 'Sorry! You do not have permission to edit any Settings.');
        }
        
        return view('admin.settings.edit', compact('settings'));
    }

    public function update(SettingsFormRequest $request, int $settings_id)
    {
        if(is_null($this->user) || !$this->user->can('Settings.Edit')) {
            abort(403, 'Sorry! You do not have permission to edit any Settings.');
        }
        
        $validatedData = $request->validated();

        $settings = Settings::findOrFail($settings_id);

        $settings->name = $validatedData['name'];
        $settings->phone = $validatedData['phone'];
        $settings->email = $validatedData['email'];
        $settings->address = $validatedData['address'];
        $settings->display_order = $validatedData['display_order'];

        if($request->hasFile('logo')){
            $logoUploadPath = 'uploads/site';
            $logoPreviousPath = 'uploads/site/'.$settings->logo;
            if(File::exists($logoPreviousPath)){
                File::delete($logoPreviousPath);
            }
            $logoFile = $request->file('logo');

            $logoExtension = $logoFile->getClientOriginalExtension();
            $logoFilename = 'logo-'.Str::slug($settings->name).'.'.$logoExtension;
            $logoFile->move($logoUploadPath,$logoFilename);

            $settings->logo = $logoFilename;
        }

        if($request->hasFile('icon')){
            $iconUploadPath = 'uploads/site';
            $iconPreviousPath = 'uploads/site/'.$settings->icon;
            if(File::exists($iconPreviousPath)){
                File::delete($iconPreviousPath);
            }
            $iconFile = $request->file('icon');

            $iconExtension = $iconFile->getClientOriginalExtension();
            $iconFilename = 'icon-'.Str::slug($settings->name).'.'.$iconExtension;
            $iconFile->move($iconUploadPath,$iconFilename);

            $settings->icon = $iconFilename;
        }

        $settings->social_fb = $validatedData['social_fb'];
        $settings->social_tw = $validatedData['social_tw'];
        $settings->social_insta = $validatedData['social_insta'];
        $settings->social_yt = $validatedData['social_yt'];

        $settings->meta_title = $validatedData['meta_title'];
        $settings->meta_keyword = $validatedData['meta_keyword'];
        $settings->meta_decription = $validatedData['meta_decription'];

        $settings->is_active = $request->is_active == true ? '1':'0';
        $settings->updated_by = $validatedData['updated_by'];
        $settings->update();

        return redirect('admin/settings')->with('message','Congratulations! Your Settings Has Been Updated Successfully.');
    }
}
