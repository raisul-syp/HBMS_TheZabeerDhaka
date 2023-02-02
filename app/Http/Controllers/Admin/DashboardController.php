<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\User;
use App\Models\Offer;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
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
        if(is_null($this->user) || !$this->user->can('Dashboard.Index')) {
            abort(403, 'Sorry! You do not have permission to view Dashboard.');
        }

        $serialNoBokking = '1';
        $serialNoOffer = '1';
        $serialNoRoom = '1';
        $serialNoGuest = '1';
        $todayDate = Carbon::today()->format('Y-m-d');
        $rooms = Room::orderBy('created_at', 'desc')->where('is_active','1')->where('is_delete','1')->get();
        $offers = Offer::orderBy('created_at', 'asc')->where('start_date', '>', $todayDate)->where('is_active', '1')->where('is_delete', '1')->get();
        $guests = User::orderBy('created_at', 'desc')->where('is_active','1')->where('is_delete','1')->get();
        $bookings = Booking::orderBy('created_at', 'desc')->where('is_delete','1')->get();
        return view('admin.dashboard', compact('serialNoBokking','serialNoOffer','serialNoRoom','serialNoGuest','todayDate','rooms','offers','guests','bookings'));
    }
}
