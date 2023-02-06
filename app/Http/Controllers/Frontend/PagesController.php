<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Faq;
use App\Models\Hall;
use App\Models\Room;
use App\Models\Offer;
use App\Models\Settings;
use App\Models\Wellness;
use App\Models\Restaurent;
use App\Models\Website\Page;
use Illuminate\Http\Request;
use App\Models\OfferCategory;
use Illuminate\Support\Carbon;
use App\Models\Website\ContactInfo;
use App\Http\Controllers\Controller;
use App\Mail\ContactUsMailable;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function aboutUs()
    {
        $pages = Page::all()->where('is_active', '1')->where('is_delete', '1');
        return view('frontend.about-us', compact('pages'));
    }

    public function contactUs()
    {
        $pages = Page::all()->where('is_active', '1')->where('is_delete', '1');
        $contacts = ContactInfo::all()->where('is_active', '1')->where('is_delete', '1');
        return view('frontend.contact-us', compact('pages', 'contacts'));
    }

    public function sendContactUs(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'subject' => 'required',
                'message' => 'required',
            ]);
    
            $data = array(
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'msg' => $request->message,
            );
            
            Mail::send(new ContactUsMailable($data));
            return redirect('contact-us')->with('success', 'Thank you for your query! We will get back you soon.');
        }
        catch(\Exception $e) {
            return redirect('contact-us')->with('danger', 'Something Went Wrong!');
        }
    }

    public function pages($page_slug)
    {
        $page = Page::where('slug', $page_slug)->first();
        $offerDateTime = Carbon::now();
        $offerCategory = OfferCategory::all()->where('is_active', '1')->where('is_delete', '1');
        $offers = Offer::all()->where('end_date', '>', $offerDateTime)->where('is_active', '1')->where('is_delete', '1');
        $faqs = Faq::all()->where('is_active', '1')->where('is_delete', '1');
        $rooms = Room::all()->where('is_active','1')->where('is_delete','1');
        $restaurants = Restaurent::all()->where('is_active','1')->where('is_delete','1');
        $halls = Hall::all()->where('is_active','1')->where('is_delete','1');
        $wellnesses = Wellness::all()->where('is_active','1')->where('is_delete','1');
        return view('frontend.page', compact('page','offerDateTime','offerCategory','offers', 'faqs','rooms','restaurants','halls','wellnesses'));
    }

    public function offerDetails($pageDetail_slug)
    {
        $todayDate = Carbon::today()->format('Y-m-d');
        $tomorrowDate = Carbon::tomorrow()->format('Y-m-d');
        $offer = Offer::where('slug', $pageDetail_slug)->first();
        return view('frontend.details.offer', compact('todayDate','tomorrowDate','offer'));
    }

    public function roomDetails($pageDetail_slug)
    {
        $todayDate = Carbon::today()->format('Y-m-d');
        $tomorrowDate = Carbon::tomorrow()->format('Y-m-d');
        $room = Room::where('slug', $pageDetail_slug)->first();
        return view('frontend.details.room', compact('todayDate','tomorrowDate','room'));
    }

    public function restaurantDetails($pageDetail_slug)
    {
        $todayDate = Carbon::today()->format('Y-m-d');
        $tomorrowDate = Carbon::tomorrow()->format('Y-m-d');
        $restaurant = Restaurent::where('slug', $pageDetail_slug)->first();
        return view('frontend.details.restaurant', compact('todayDate','tomorrowDate','restaurant'));
    }

    public function hallDetails($pageDetail_slug)
    {
        $todayDate = Carbon::today()->format('Y-m-d');
        $tomorrowDate = Carbon::tomorrow()->format('Y-m-d');
        $hall = Hall::where('slug', $pageDetail_slug)->first();
        return view('frontend.details.hall', compact('todayDate','tomorrowDate','hall'));
    }

    public function wellnessDetails($pageDetail_slug)
    {
        $todayDate = Carbon::today()->format('Y-m-d');
        $tomorrowDate = Carbon::tomorrow()->format('Y-m-d');
        $wellness = Wellness::where('slug', $pageDetail_slug)->first();
        return view('frontend.details.wellness', compact('todayDate','tomorrowDate','wellness'));
    }

    // public function checkAvailability(Request $request)
    // {
    //     $checkin_date = $request->checkin_date;
    //     $checkout_date = $request->checkout_date;
    //     $hotel_location = $request->hotel_location;
    //     $total_adults = $request->adults;
    //     $total_childs = $request->children;

    //     $available_rooms = Room::whereNotIn('id', function($query) use ($checkin_date, $checkout_date) {
    //         $query->select('room_id')->from('hb_bookings')
    //         ->whereBetween('checkin_date', [$checkin_date, $checkout_date])
    //         ->orWhereBetween('checkout_date', [$checkin_date, $checkout_date]);
    //     })
    //     ->where('hotel_id', $hotel_location)
    //     ->where('max_adults', '>=', (int) $total_adults)
    //     ->where('max_childs', '>=', (int) $total_childs)
    //     ->where('is_active', 1)
    //     ->get();

    //     return view('frontend.available-rooms', compact('available_rooms'));
    // }

    public function checkAvailability(Request $request)
    {
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
        return view('frontend.available-rooms', compact('available_rooms', 'checkin_date', 'checkout_date', 'total_adults', 'total_childs'));
    }
}
