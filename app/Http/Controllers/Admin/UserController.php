<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\CountryList;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use App\Mail\AdminRegisterMailable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests\UserEditFormRequest;

class UserController extends Controller
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
        if(is_null($this->user) || !$this->user->can('Users.Index')) {
            abort(403, 'Sorry! You do not have permission to view any User.');
        }
        
        return view('admin.user.index');
    }

    public function create()
    {
        if(is_null($this->user) || !$this->user->can('Users.Create')) {
            abort(403, 'Sorry! You do not have permission to create any User.');
        }
        
        $countries = CountryList::all()->where('is_active', 1);
        $roles = Role::all()->where('is_active', 1)->where('is_delete', 1);
        return view('admin.user.create', compact('countries', 'roles'));
    }

    public function store(UserFormRequest $request)
    {
        if(is_null($this->user) || !$this->user->can('Users.Create')) {
            abort(403, 'Sorry! You do not have permission to create any User.');
        }
        
        try {
            $validatedData = $request->validated();

            $users = new Admin;

            $users->first_name = $validatedData['first_name'];
            $users->last_name = $validatedData['last_name'];
            $users->email = $validatedData['email'];
            $users->password = Hash::make($request->password);
            $users->gender = $validatedData['gender'];
            $users->date_of_birth = $validatedData['date_of_birth'];
            $users->phone = $validatedData['phone'];
            $users->address = $validatedData['address'];
            $users->city = $validatedData['city'];
            $users->state = $validatedData['state'];
            $users->postal_code = $validatedData['postal_code'];
            $users->country = $validatedData['country'];
            $users->admin_comment = $validatedData['admin_comment'];
            $users->is_active = $request->is_active == true ? '1':'0';
            $users->created_by = $validatedData['created_by'];
            $users->role_as = $validatedData['role_as'];

            if($users->role_as) {
                $users->assignRole($users->role_as);
            }

            if($request->hasFile('profile_photo')){
                $uploadProfilePath = 'uploads/users/profile_photo/';

                $profilePhotoFile = $request->file('profile_photo');
                $profileExtension = $profilePhotoFile->getClientOriginalExtension();
                $profileName =  $users->first_name.'-'.time().'.'.$profileExtension;
                $profilePhotoFile->move($uploadProfilePath,$profileName);

                $users->profile_photo = $profileName;
            }

            if($request->hasFile('cover_photo')){
                $uploadCoverPath = 'uploads/users/cover_photo/';

                $coverPhotoFile = $request->file('cover_photo');
                $coverExtension = $coverPhotoFile->getClientOriginalExtension();
                $coverName =  $users->first_name.'-'.time().'.'.$coverExtension;
                $coverPhotoFile->move($uploadCoverPath,$coverName);

                $users->cover_photo = $coverName;
            }

            $users->save();

            $data = array(
                'user_name' => $request->first_name.' '.$request->last_name,
                'user_email' => $request->email,
                'user_password' => $request->password,
                'user_role' => $request->role_as,
            );

            Mail::send(new AdminRegisterMailable($data));
            return redirect('admin/user')->with('success','Congratulations! New User Has Been Created Successfully.');
        }
        catch(\Exception $e) {
            return redirect('admin/user/create')->with('error','Something Went Wrong!');
        }
    }

    public function edit(Admin $user)
    {
        if(is_null($this->user) || !$this->user->can('Users.Edit')) {
            abort(403, 'Sorry! You do not have permission to edit any User.');
        }
        
        $countries = CountryList::all()->where('is_active', 1);
        $roles = Role::all()->where('is_active', 1)->where('is_delete', 1);
        return view('admin.user.edit', compact('user', 'countries', 'roles'));
    }

    public function update(UserEditFormRequest $request, $user)
    {
        if(is_null($this->user) || !$this->user->can('Users.Edit')) {
            abort(403, 'Sorry! You do not have permission to edit any User.');
        }
        
        $validatedData = $request->validated();

        $users = Admin::findOrFail($user);

        $users->first_name = $validatedData['first_name'];
        $users->last_name = $validatedData['last_name'];
        $users->email = $validatedData['email'];
        $users->gender = $validatedData['gender'];
        $users->date_of_birth = $validatedData['date_of_birth'];
        $users->phone = $validatedData['phone'];
        $users->address = $validatedData['address'];
        $users->city = $validatedData['city'];
        $users->state = $validatedData['state'];
        $users->postal_code = $validatedData['postal_code'];
        $users->country = $validatedData['country'];
        $users->admin_comment = $validatedData['admin_comment'];
        $users->is_active = $request->is_active == true ? '1':'0';
        $users->updated_by = $validatedData['updated_by'];
        $users->role_as = $validatedData['role_as'];

        $users->roles()->detach();
        if($users->role_as) {
            $users->assignRole($users->role_as);
        }

        if($request->hasFile('profile_photo')){
            $uploadProfilePath = 'uploads/users/profile_photo/';
            $profilePath = 'uploads/users/profile_photo/'.$users->profile_photo;
            if(File::exists($profilePath)){
                File::delete($profilePath);
            }

            $profilePhotoFile = $request->file('profile_photo');
            $profileExtension = $profilePhotoFile->getClientOriginalExtension();
            $profileName =  $users->first_name.'-'.time().'.'.$profileExtension;
            $profilePhotoFile->move($uploadProfilePath,$profileName);

            $users->profile_photo = $profileName;
        }

        if($request->hasFile('cover_photo')){
            $uploadCoverPath = 'uploads/users/cover_photo/';
            $coverPath = 'uploads/users/cover_photo/'.$users->cover_photo;
            if(File::exists($coverPath)){
                File::delete($coverPath);
            }

            $coverPhotoFile = $request->file('cover_photo');
            $coverExtension = $coverPhotoFile->getClientOriginalExtension();
            $coverName =  $users->first_name.'-'.time().'.'.$coverExtension;
            $coverPhotoFile->move($uploadCoverPath,$coverName);

            $users->cover_photo = $coverName;
        }

        $users->update();

        return redirect('admin/user')->with('message','Congratulations! Targeted User Has Been Updated Successfully.');
    }
}
