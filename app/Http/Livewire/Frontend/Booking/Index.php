<?php

namespace App\Http\Livewire\Frontend\Booking;

use App\Models\Booking;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        $guests = Auth::user();
        $bookings = Booking::all()->where('guest_id', $guests->id)->where('is_delete','1')->sortByDesc('created_at');
        $serialNo = 1;
        // $serialNo = ($bookings->perPage() * ($bookings->currentPage() - 1)) + 1;
        return view('livewire.frontend.booking.index', compact('guests', 'bookings', 'serialNo'));
    }
}
