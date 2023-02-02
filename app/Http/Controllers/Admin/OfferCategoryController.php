<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\OfferCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\OfferCategoryFormRequest;

class OfferCategoryController extends Controller
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
            abort(403, 'Sorry! You do not have permission to view any Offer Category.');
        }
        
        return view('admin.offer-category.index');
    }

    public function create()
    {
        if(is_null($this->user) || !$this->user->can('Offers.Create')) {
            abort(403, 'Sorry! You do not have permission to create any Offer Category.');
        }
        
        return view('admin.offer-category.create');
    }

    public function store(OfferCategoryFormRequest $request)
    {
        if(is_null($this->user) || !$this->user->can('Offers.Create')) {
            abort(403, 'Sorry! You do not have permission to create any Offer Category.');
        }
        
        $validatedData = $request->validated();

        $offer_cat = new OfferCategory();

        $offer_cat->name = $validatedData['name'];
        $offer_cat->slug = Str::slug($validatedData['slug']);

        $offer_cat->meta_title = $validatedData['meta_title'];
        $offer_cat->meta_keyword = $validatedData['meta_keyword'];
        $offer_cat->meta_decription = $validatedData['meta_decription'];

        $offer_cat->is_active = $request->is_active == true ? '1':'0';
        $offer_cat->created_by = $validatedData['created_by'];
        $offer_cat->save();

        return redirect('admin/offer-category')->with('message','Congratulations! New Offer Category Has Been Created Successfully.');
    }

    public function edit(OfferCategory $offer_cat)
    {
        if(is_null($this->user) || !$this->user->can('Offers.Edit')) {
            abort(403, 'Sorry! You do not have permission to edit any Offer Category.');
        }
        
        return view('admin.offer-category.edit', compact('offer_cat'));
    }

    public function update(OfferCategoryFormRequest $request, int $offer_category_id)
    {
        if(is_null($this->user) || !$this->user->can('Offers.Edit')) {
            abort(403, 'Sorry! You do not have permission to edit any Offer Category.');
        }
        
        $validatedData = $request->validated();

        $offer_cat = OfferCategory::findOrFail($offer_category_id);

        $offer_cat->name = $validatedData['name'];
        $offer_cat->slug = Str::slug($validatedData['slug']);

        $offer_cat->meta_title = $validatedData['meta_title'];
        $offer_cat->meta_keyword = $validatedData['meta_keyword'];
        $offer_cat->meta_decription = $validatedData['meta_decription'];

        $offer_cat->is_active = $request->is_active == true ? '1':'0';
        $offer_cat->updated_by = $validatedData['updated_by'];
        $offer_cat->update();

        return redirect('admin/offer-category')->with('message','Congratulations! New Offer Category Has Been Updated Successfully.');
    }
}
