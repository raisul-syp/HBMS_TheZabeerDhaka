<?php

namespace App\Http\Livewire\Admin\Roomtype;

use Livewire\Component;
use App\Models\Roomtype;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $user;
    public $roomtype_id;

    public function deleteRecord($roomtype_id)
    {
        $this->roomtype_id = $roomtype_id;
    }

    public function destroyRecord()
    {
        if(is_null($this->user) || !$this->user->can('RoomType.Delete')) {
            abort(403, 'Sorry! You do not have permission to delete any Room Type.');
        }

        $roomtype =  Roomtype::find($this->roomtype_id);
        $roomtype->is_delete = '0';
        $roomtype->update();
        return redirect('admin/roomtype')->with('message','Room Type Has Been Deleted Successfully.');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $roomtypes = Roomtype::where('is_delete','1')->orderBy('id','ASC')->paginate(10);
        $serialNo = ($roomtypes->perPage() * ($roomtypes->currentPage() - 1)) + 1;
        return view('livewire.admin.roomtype.index', compact('roomtypes', 'serialNo'));
    }
}
