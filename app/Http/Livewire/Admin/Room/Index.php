<?php

namespace App\Http\Livewire\Admin\Room;

use App\Models\Room;
use App\Models\Booking;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $user;
    public $room_id;

    public function deleteRecord($room_id)
    {
        $this->room_id = $room_id;
    }

    public function destroyRecord()
    {
        if(is_null($this->user) || !$this->user->can('Rooms.Delete')) {
            abort(403, 'Sorry! You do not have permission to delete any Room.');
        }

        $room =  Room::find($this->room_id);        
        $room->is_delete = '0';
        $room->update();

        return redirect('admin/room')->with('message','Room Has Been Deleted Successfully.');
        $this->dispatchBrowserEvent('close-modal');
    }
    
    public function render()
    {
        $rooms = Room::where('is_delete','1')->orderBy('id','ASC')->paginate(10);
        $serialNo = ($rooms->perPage() * ($rooms->currentPage() - 1)) + 1;
        return view('livewire.admin.room.index', compact('rooms', 'serialNo'));
    }
}
