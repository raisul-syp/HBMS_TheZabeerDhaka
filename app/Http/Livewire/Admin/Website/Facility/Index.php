<?php

namespace App\Http\Livewire\Admin\Website\Facility;

use App\Models\Website\Facility;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $user;
    public $facility_id;

    public function deleteRecord($facility_id)
    {
        $this->facility_id = $facility_id;
    }

    public function destroyRecord()
    {
        if(is_null($this->user) || !$this->user->can('Website.Facilities.Delete')) {
            abort(403, 'Sorry! You do not have permission to delete any Facility of Website.');
        }

        $facilities =  Facility::find($this->facility_id);
        $facilities->is_delete = '0';
        $facilities->update();

        return redirect('admin/website/facilities')->with('message','Facility Has Been Deleted Successfully.');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $facilities = Facility::where('is_active','1')->where('is_delete','1')->orderBy('id','ASC')->paginate(10);
        $serialNo = ($facilities->perPage() * ($facilities->currentPage() - 1)) + 1;
        return view('livewire.admin.website.facility.index', compact('facilities', 'serialNo'));
    }
}
