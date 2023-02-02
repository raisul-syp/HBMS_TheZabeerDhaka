<?php

namespace App\Http\Livewire\Admin\OfferCategory;

use App\Models\OfferCategory;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $user;
    public $offer_category_id;

    public function deleteRecord($offer_category_id)
    {
        $this->offer_category_id = $offer_category_id;
    }

    public function destroyRecord()
    {
        if(is_null($this->user) || !$this->user->can('Offers.Delete')) {
            abort(403, 'Sorry! You do not have permission to delete any Offer Category.');
        }

        $offer_category =  OfferCategory::find($this->offer_category_id);
        $offer_category->is_delete = '0';
        $offer_category->update();
        return redirect('admin/offer-category')->with('message','Offer Category Has Been Deleted Successfully.');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $offer_categories = OfferCategory::where('is_delete','1')->orderBy('id','ASC')->paginate(10);
        $serialNo = ($offer_categories->perPage() * ($offer_categories->currentPage() - 1)) + 1;
        return view('livewire.admin.offer-category.index', compact('offer_categories','serialNo'));
    }
}
