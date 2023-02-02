<?php

namespace App\Http\Livewire\Admin\Hall;

use App\Models\Hall;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $user;
    public $hall_id;

    public function deleteRecord($hall_id)
    {
        $this->hall_id = $hall_id;
    }

    public function destroyRecord()
    {  
        if(is_null($this->user) || !$this->user->can('Halls.Delete')) {
            abort(403, 'Sorry! You do not have permission to delete any Hall.');
        }

        $hall =  Hall::find($this->hall_id);
        $hall->is_delete = '0';
        $hall->update();
        return redirect('admin/hall')->with('message','Hall Has Been Deleted Successfully.');
        $this->dispatchBrowserEvent('close-modal');
    }
    
    public function render()
    {
        $halls = Hall::where('is_delete','1')->orderBy('id','ASC')->paginate(10);
        $serialNo = ($halls->perPage() * ($halls->currentPage() - 1)) + 1;
        return view('livewire.admin.hall.index', compact('halls', 'serialNo'));
    }
}
