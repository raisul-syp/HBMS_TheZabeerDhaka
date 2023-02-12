<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Settings;
use App\Models\Room;
use App\Models\Hotel;
use App\Models\Offer;
use App\Models\Website\Page;
use Illuminate\Http\Request;
use App\Models\Website\Slider;
use Illuminate\Support\Carbon;
use App\Models\Website\Facility;
use App\Models\Website\Testimonial;
use App\Http\Controllers\Controller;
use App\Models\Booking;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $todayDate = Carbon::today()->format('Y-m-d');
        $tomorrowDate = Carbon::tomorrow()->format('Y-m-d');
        $checkin_date = $request->checkin_date;
        $checkout_date = $request->checkout_date;
        $total_adults = $request->adults;
        $total_childs = $request->children;

        $settings = Settings::all()->where('is_active','1')->where('is_delete','1');
        $sliders = Slider::all()->where('is_active','1')->where('is_delete','1');
        $aboutUs = Page::all()->where('name','About Us')->where('is_active','1')->where('is_delete','1');
        $rooms = Room::all()->where('is_active','1')->where('is_delete','1');
        $testimonials = Testimonial::all()->where('is_active','1')->where('is_delete','1');
        $facilities = Facility::all()->where('is_active','1')->where('is_delete','1');
        $offers = Offer::all()->where('end_date', '>', $todayDate)->where('is_active', '1')->where('is_delete', '1');

        $available_rooms = Room::whereNotIn('id', function($query) use ($checkin_date, $checkout_date) {
            $query->select('room_id')->from('hb_bookings')
            ->whereBetween('checkin_date', [$checkin_date, $checkout_date])
            ->orWhereBetween('checkout_date', [$checkin_date, $checkout_date]);
        })
        ->where('max_adults', '>=', (int) $total_adults)
        ->where('max_childs', '>=', (int) $total_childs)
        ->where('is_active', 1)
        ->get();

        return view('frontend.index', compact('settings','sliders','aboutUs','rooms','testimonials','facilities','offers','todayDate','tomorrowDate','available_rooms'));
    }

    // public function checkAvailability(Request $request)
    // {
    //     $checkin_date = $request->input('checkin_date');
    //     $checkout_date = $request->input('checkout_date');
    //     $total_adults = $request->input('adults');
    //     $total_childs = $request->input('children');

    //     $available_rooms = Room::whereNotIn('id', function($query) use ($checkin_date, $checkout_date) {
    //         $query->select('room_id')->from('hb_bookings')
    //         ->whereBetween('checkin_date', [$checkin_date, $checkout_date])
    //         ->orWhereBetween('checkout_date', [$checkin_date, $checkout_date]);
    //     })
    //     ->where('quantity', '<=', '10')
    //     ->where('max_adults', '>=', (int) $total_adults)
    //     ->where('max_childs', '>=', (int) $total_childs)
    //     ->where('is_active', 1)
    //     ->get();

    //     return view('frontend.available-rooms', compact('available_rooms', 'checkin_date', 'checkout_date', 'total_adults', 'total_childs'));
    // }

    public function checkAvailability(Request $request)
    {
        $settings = Settings::all()->where('is_active','1')->where('is_delete','1');
        $checkin_date = $request->input('checkin_date');
        $checkout_date = $request->input('checkout_date');
        $total_adults = $request->input('adults');
        $total_childs = $request->input('children');

        $available_rooms = Room::with([
            'bookings' => function ($query) use ($checkin_date, $checkout_date) {
                $query->where(function ($query) use ($checkin_date, $checkout_date) {
                    $query->whereBetween('checkin_date', [$checkin_date, $checkout_date])
                          ->orWhereBetween('checkout_date', [$checkin_date, $checkout_date]);
                })
                ->where('booking_status', 1);
            }
        ])
        ->where('max_adults', '>=', (int) $total_adults)
        ->where('max_childs', '>=', (int) $total_childs)
        ->where('is_active', 1)
        ->get();
        return view('frontend.available-rooms', compact('settings','available_rooms', 'checkin_date', 'checkout_date', 'total_adults', 'total_childs'));
    }

    public function roomDetails($pageDetail_slug)
    {
        $room = Room::where('slug', $pageDetail_slug)->first();
        return view('frontend.room-details', compact('room'));
    }
}
