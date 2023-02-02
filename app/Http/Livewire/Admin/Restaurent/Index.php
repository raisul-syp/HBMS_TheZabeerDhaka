<?php

namespace App\Http\Livewire\Admin\Restaurent;

use App\Models\Restaurent;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $user;
    public $restaurent_id;

    public function deleteRecord($restaurent_id)
    {
        $this->restaurent_id = $restaurent_id;
    }

    public function destroyRecord()
    {  
        if(is_null($this->user) || !$this->user->can('Restaurants.Delete')) {
            abort(403, 'Sorry! You do not have permission to delete any Restaurant.');
        }

        $restaurent =  Restaurent::find($this->restaurent_id);
        $restaurent->is_delete = '0';
        $restaurent->update();
        return redirect('admin/restaurent')->with('message','Restaurent Has Been Deleted Successfully.');
        $this->dispatchBrowserEvent('close-modal');
    }
    
    public function render()
    {
        $restaurents = Restaurent::where('is_delete','1')->orderBy('id','ASC')->paginate(10);
        $serialNo = ($restaurents->perPage() * ($restaurents->currentPage() - 1)) + 1;
        return view('livewire.admin.restaurent.index', compact('restaurents', 'serialNo'));
    }
}
