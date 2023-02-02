<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\CountryList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserEditFormRequest;

class ProfileSettingsController extends Controller
{
    public function myProfile()
    {
        $users = Auth::guard('admin')->user();
        return view('admin.profile-settings.my-profile', compact('users'));
    }

    public function editMyProfile(Admin $user)
    {
        $users = Auth::guard('admin')->user();
        $countries = CountryList::all()->where('is_active','1');
        return view('admin.profile-settings.edit-profile', compact('user','users','countries'));
    }

    public function updateMyProfile(UserEditFormRequest $request, $user)
    {
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
        $users->updated_by = $validatedData['updated_by'];

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

        return redirect('admin/profile-settings/my-profile')->with('message','Congratulations! Your Profile Has Been Updated Successfully.');
    }

    public function changePassword()
    {
        return view('admin.profile-settings.change-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required','string','min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $currentPasswordStatus = Hash::check($request->current_password, auth()->guard('admin')->user()->password);
        if($currentPasswordStatus){
            Admin::findOrFail(Auth::guard('admin')->user()->id)->update([
                'password' => Hash::make($request->password),
            ]);
            return redirect('admin/profile-settings/my-profile')->with('message','Password Updated Successfully!');
        }
        else{
            return redirect('admin/profile-settings/change-password')->with('error','Old Password does not match!');
        }
    }
}
