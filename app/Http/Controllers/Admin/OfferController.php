<?php

namespace App\Http\Controllers\Admin;

use App\Models\Offer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\OfferCategory;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\OfferFormRequest;

class OfferController extends Controller
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
        if(is_null($this->user) || !$this->user->can('Offers.Index')) {
            abort(403, 'Sorry! You do not have permission to view any Offer.');
        }
        
        return view('admin.offer.index');
    }

    public function create()
    {
        if(is_null($this->user) || !$this->user->can('Offers.Create')) {
            abort(403, 'Sorry! You do not have permission to create any Offer.');
        }
        
        $offerDateTime = Carbon::now();
        $offerCategory = OfferCategory::all()->where('is_active','1')->where('is_delete','1');
        return view('admin.offer.create', compact('offerDateTime','offerCategory'));
    }

    public function store(OfferFormRequest $request)
    {
        if(is_null($this->user) || !$this->user->can('Offers.Create')) {
            abort(403, 'Sorry! You do not have permission to create any Offer.');
        }
        
        $validatedData = $request->validated();

        $offer = new Offer();

        $offer->name = $validatedData['name'];
        $offer->slug = Str::slug($validatedData['slug']);
        $offer->offer_category = $validatedData['offer_category'];
        $offer->short_description = $validatedData['short_description'];
        $offer->long_description = $validatedData['long_description'];
        $offer->start_date = $validatedData['start_date'];
        $offer->end_date = $validatedData['end_date'];

        if($request->hasFile('thumb')){
            $uploadPath = 'uploads/offer';
            $file = $request->file('thumb');

            $extension = $file->getClientOriginalExtension();
            $filename = Str::slug($offer->name).'.'.$extension;
            $file->move($uploadPath,$filename);

            $offer->thumb = $filename;
        }

        $offer->meta_title = $validatedData['meta_title'];
        $offer->meta_keyword = $validatedData['meta_keyword'];
        $offer->meta_decription = $validatedData['meta_decription'];

        $offer->is_active = $request->is_active == true ? '1':'0';
        $offer->created_by = $validatedData['created_by'];
        $offer->save();

        return redirect('admin/offers')->with('message','Congratulations! New Offer Has Been Created Successfully.');
    }

    public function edit(Offer $offer)
    {
        if(is_null($this->user) || !$this->user->can('Offers.Edit')) {
            abort(403, 'Sorry! You do not have permission to edit any Offer.');
        }
        
        $offerCategory = OfferCategory::all()->where('is_active','1')->where('is_delete','1');
        return view('admin.offer.edit', compact('offer','offerCategory'));
    }

    public function update(OfferFormRequest $request, int $offer_id)
    {
        if(is_null($this->user) || !$this->user->can('Offers.Edit')) {
            abort(403, 'Sorry! You do not have permission to edit any Offer.');
        }
        
        $validatedData = $request->validated();

        $offer = Offer::findOrFail($offer_id);

        $offer->name = $validatedData['name'];
        $offer->slug = Str::slug($validatedData['slug']);
        $offer->offer_category = $validatedData['offer_category'];
        $offer->short_description = $validatedData['short_description'];
        $offer->long_description = $validatedData['long_description'];
        $offer->start_date = $validatedData['start_date'];
        $offer->end_date = $validatedData['end_date'];

        if($request->hasFile('thumb')){
            $uploadPath = 'uploads/offer';
            $previousPath = 'uploads/offer/'.$offer->thumb;
            if(File::exists($previousPath)){
                File::delete($previousPath);
            }
            $file = $request->file('thumb');

            $extension = $file->getClientOriginalExtension();
            $filename = Str::slug($offer->name).'.'.$extension;
            $file->move($uploadPath,$filename);

            $offer->thumb = $filename;
        }

        $offer->meta_title = $validatedData['meta_title'];
        $offer->meta_keyword = $validatedData['meta_keyword'];
        $offer->meta_decription = $validatedData['meta_decription'];

        $offer->is_active = $request->is_active == true ? '1':'0';
        $offer->updated_by = $validatedData['updated_by'];
        $offer->update();

        return redirect('admin/offers')->with('message','Congratulations! New Offer Has Been Updated Successfully.');
    }
}
