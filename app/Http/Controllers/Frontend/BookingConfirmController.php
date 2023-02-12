<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Settings;
use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Mail\BookingMailable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\BookingFormRequest;

class BookingConfirmController extends Controller
{
    public function index(Request $request)
    {
        $settings = Settings::all()->where('is_active','1')->where('is_delete','1');
        $checkin_date = $request->input('checkin_date');
        $checkout_date = $request->input('checkout_date');
        $total_adults = $request->input('total_adults');
        $total_childs = $request->input('total_childs');
        $room_id = $request->input('room_id');

        $rooms = Room::all();

        return view('frontend.confirm-booking', compact('settings','checkin_date', 'checkout_date', 'total_adults', 'total_childs', 'room_id', 'rooms'));
    }

    public function store(BookingFormRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $guest = User::find($request->guest_id);
            $room = Room::find($request->room_id);
            $booking = new Booking;

            $booking->guest_id = $validatedData['guest_id'];
            $booking->room_id = $validatedData['room_id'];
            $booking->staff_id = $validatedData['staff_id'];
            $booking->checkin_date = $validatedData['checkin_date'];
            $booking->checkout_date = $validatedData['checkout_date'];
            $booking->checkin_time = $validatedData['checkin_time'];
            $booking->checkout_time = $validatedData['checkout_time'];
            $booking->total_adults = $validatedData['total_adults'];
            $booking->total_childs = $validatedData['total_childs'];
            $booking->booking_status = $validatedData['booking_status'];
            $booking->payment_mode = $validatedData['payment_mode'];
            $booking->booking_comment = $validatedData['booking_comment'];
            $booking->created_by = $validatedData['created_by'];
            $booking->save();

            $data = array(
                'guest_name' => $guest->first_name.' '.$guest->last_name,
                'guest_email' => $guest->email,
                'guest_phone' => $guest->phone,
                'room_name' => $room->name,
                'room_price' => $room->price,
                'checkin_date' => $booking->checkin_date,
                'checkin_time' => $booking->checkin_time,
                'checkout_date' => $booking->checkout_date,
                'checkout_time' => $booking->checkout_time,
                'booking_date' => $booking->created_at,
                'booking_status' => $booking->booking_status,
                'payment_mode' => $booking->payment_mode,
            );

            Mail::to(Auth::user()->email)->send(new BookingMailable($data));
            return redirect('confirm-booking/success')->with('success','Your booking has been completed successfully. We will contact with you very shortly.');
        }
        catch(\Exception $e) {
            return redirect('confirm-booking/success')->with('error','Something Went Wrong!');
        }
    }

    public function success()
    {
        return view('frontend.success.booking');
    }
}
