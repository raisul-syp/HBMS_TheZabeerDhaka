<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Booking;
use App\Models\Settings;
use App\Models\CountryList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\GuestEditFormRequest;

class UserController extends Controller
{
    public function myProfile()
    {
        $settings = Settings::all()->where('is_active','1')->where('is_delete','1');
        $guests = Auth::user();
        return view('frontend.user.my-profile', compact('settings','guests'));
    }

    public function editMyProfile(User $guest)
    {
        $settings = Settings::all()->where('is_active','1')->where('is_delete','1');
        $guests = Auth::user();
        $countries = CountryList::all()->where('is_active','1');
        return view('frontend.user.edit-profile', compact('settings','guest','guests','countries'));
    }

    public function updateMyProfile(GuestEditFormRequest $request, $guest)
    {
        // $guests = Auth::user();
        $validatedData = $request->validated();

        $guests = User::findOrFail($guest);

        $guests->first_name = $validatedData['first_name'];
        $guests->last_name = $validatedData['last_name'];
        $guests->email = $validatedData['email'];
        $guests->gender = $validatedData['gender'];
        $guests->date_of_birth = $validatedData['date_of_birth'];
        $guests->phone = $validatedData['phone'];
        $guests->address = $validatedData['address'];
        $guests->city = $validatedData['city'];
        $guests->state = $validatedData['state'];
        $guests->postal_code = $validatedData['postal_code'];
        $guests->country = $validatedData['country'];
        $guests->updated_by = $validatedData['updated_by'];

        if($request->hasFile('profile_photo')){
            $uploadProfilePath = 'uploads/guests/profile_photo/';
            $profilePath = 'uploads/guests/profile_photo/'.$guests->profile_photo;
            if(File::exists($profilePath)){
                File::delete($profilePath);
            }

            $profilePhotoFile = $request->file('profile_photo');
            $profileExtension = $profilePhotoFile->getClientOriginalExtension();
            $profileName =  $guests->first_name.'-'.time().'.'.$profileExtension;
            $profilePhotoFile->move($uploadProfilePath,$profileName);

            $guests->profile_photo = $profileName;
        }

        if($request->hasFile('cover_photo')){
            $uploadCoverPath = 'uploads/guests/cover_photo/';
            $coverPath = 'uploads/guests/cover_photo/'.$guests->cover_photo;
            if(File::exists($coverPath)){
                File::delete($coverPath);
            }

            $coverPhotoFile = $request->file('cover_photo');
            $coverExtension = $coverPhotoFile->getClientOriginalExtension();
            $coverName =  $guests->first_name.'-'.time().'.'.$coverExtension;
            $coverPhotoFile->move($uploadCoverPath,$coverName);

            $guests->cover_photo = $coverName;
        }

        $guests->update();

        return redirect('guest/profile')->with('message','Congratulations! Your Personal Information Has Been Updated Successfully.');
    }

    public function changePassword()
    {
        $settings = Settings::all()->where('is_active','1')->where('is_delete','1');
        return view('frontend.user.change-password', compact('settings'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required','string','min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $currentPasswordStatus = Hash::check($request->current_password, auth()->user()->password);
        if($currentPasswordStatus){
            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);
            return redirect()->back()->with('message','Password Updated Successfully!');
        }
        else{
            return redirect()->back()->with('error','Old Password does not match!');
        }
    }

    public function bookingHistory()
    {
        $settings = Settings::all()->where('is_active','1')->where('is_delete','1');
        // $serialNo = 1;
        // $guests = Auth::user();
        // $bookings = Booking::all()->where('guest_id', $guests->id);
        // return view('frontend.user.booking-history', compact('serialNo', 'guests', 'bookings'));
        return view('frontend.user.booking-history', compact('settings'));
    }
}
