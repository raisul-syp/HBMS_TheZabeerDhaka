<?php

namespace App\Http\Controllers\Admin\Website;

use Illuminate\Http\Request;
use App\Models\Website\ContactInfo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Website\ContactInfoFormRequest;

class ContactInfoController extends Controller
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
        if(is_null($this->user) || !$this->user->can('Website.ContactInfos.Index')) {
            abort(403, 'Sorry! You do not have permission to view any Contact Info of Website.');
        }
        
        return view('admin.website.contactinfo.index');
    }

    public function create()
    {
        if(is_null($this->user) || !$this->user->can('Website.ContactInfos.Create')) {
            abort(403, 'Sorry! You do not have permission to create any Contact Info of Website.');
        }
        
        return view('admin.website.contactinfo.create');
    }

    public function store(ContactInfoFormRequest $request)
    {
        if(is_null($this->user) || !$this->user->can('Website.ContactInfos.Create')) {
            abort(403, 'Sorry! You do not have permission to create any Contact Info of Website.');
        }
        
        $validatedData = $request->validated();

        $contacts = new ContactInfo();

        $contacts->hotel_name = $validatedData['hotel_name'];
        $contacts->phone = $validatedData['phone'];
        $contacts->email = $validatedData['email'];
        $contacts->address = $validatedData['address'];
        $contacts->google_map = $validatedData['google_map'];
        $contacts->display_order = $validatedData['display_order'];
        $contacts->phone_sales = $validatedData['phone_sales'];
        $contacts->phone_reservation = $validatedData['phone_reservation'];
        $contacts->email_sales = $validatedData['email_sales'];
        $contacts->email_reservation = $validatedData['email_reservation'];
        $contacts->meta_title = $validatedData['meta_title'];
        $contacts->meta_keyword = $validatedData['meta_keyword'];
        $contacts->meta_decription = $validatedData['meta_decription'];
        $contacts->is_active = $request->is_active == true ? '1':'0';
        $contacts->created_by = $validatedData['created_by'];
        $contacts->save();

        return redirect('admin/website/contactinfo')->with('message','Congratulations! New Contact Information Has Been Created Successfully.');
    }

    public function edit(ContactInfo $contacts)
    {
        if(is_null($this->user) || !$this->user->can('Website.ContactInfos.Edit')) {
            abort(403, 'Sorry! You do not have permission to edit any Contact Info of Website.');
        }
        
        return view('admin.website.contactinfo.edit', compact('contacts'));
    }

    public function update(ContactInfoFormRequest $request, int $contacts_id)
    {
        if(is_null($this->user) || !$this->user->can('Website.ContactInfos.Edit')) {
            abort(403, 'Sorry! You do not have permission to edit any Contact Info of Website.');
        }
        
        $validatedData = $request->validated();

        $contacts = ContactInfo::findOrFail($contacts_id);

        $contacts->hotel_name = $validatedData['hotel_name'];
        $contacts->phone = $validatedData['phone'];
        $contacts->email = $validatedData['email'];
        $contacts->address = $validatedData['address'];
        $contacts->google_map = $validatedData['google_map'];
        $contacts->display_order = $validatedData['display_order'];
        $contacts->phone_sales = $validatedData['phone_sales'];
        $contacts->phone_reservation = $validatedData['phone_reservation'];
        $contacts->email_sales = $validatedData['email_sales'];
        $contacts->email_reservation = $validatedData['email_reservation'];
        $contacts->meta_title = $validatedData['meta_title'];
        $contacts->meta_keyword = $validatedData['meta_keyword'];
        $contacts->meta_decription = $validatedData['meta_decription'];
        $contacts->is_active = $request->is_active == true ? '1':'0';
        $contacts->updated_by = $validatedData['updated_by'];
        $contacts->update();

        return redirect('admin/website/contactinfo')->with('message','Congratulations! New Contact Information Has Been Updated Successfully.');
    }
}
