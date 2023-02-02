<?php

namespace App\Http\Livewire\Admin\Facility;

use Livewire\Component;
use App\Models\Facility;
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
        if(is_null($this->user) || !$this->user->can('Facilities.Delete')) {
            abort(403, 'Sorry! You do not have permission to delete any Facility.');
        }

        $facility =  Facility::find($this->facility_id);
        $facility->is_delete = '0';
        $facility->update();
        return redirect('admin/facility')->with('message','Facility Has Been Deleted Successfully.');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $facilities = Facility::where('is_delete','1')->orderBy('id','ASC')->paginate(10);
        $serialNo = ($facilities->perPage() * ($facilities->currentPage() - 1)) + 1;
        return view('livewire.admin.facility.index', compact('facilities', 'serialNo'));
    }
}
