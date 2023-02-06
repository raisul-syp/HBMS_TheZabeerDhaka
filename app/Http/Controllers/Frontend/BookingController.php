<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Room;
use App\Models\User;
use App\Models\Admin;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\BookingFormRequest;
use App\Mail\BookingMailable;

class BookingController extends Controller
{
    public function index()
    {
        $todayDate = Carbon::today()->format('Y-m-d');
        $tomorrowDate = Carbon::tomorrow()->format('Y-m-d');
        return view('frontend.booking', compact('todayDate','tomorrowDate'));
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

            Mail::send(new BookingMailable($data));
            return redirect('booking/success')->with('success','Your booking has been completed successfully. We will contact with you very shortly.');
        }
        catch(\Exception $e) {
            return redirect('booking/success')->with('error','Something Went Wrong!');
        }
    }

    // public function availableRooms(Request $request, $checkin_date)
    // {
    //     $available_rooms = Room::whereDoesntHave('bookings', function($query) use ($checkin_date) {
    //         $query->where('checkin_date', '<=', $checkin_date)
    //               ->where('checkout_date', '>=', $checkin_date);
    //     })->get();

    //     return response()->json(['data' => $available_rooms]);
    // }

    public function availableRooms(Request $request, $checkin_date)
    {
        $rooms = Room::all();
        $available_rooms = [];

        foreach($rooms as $room) {
            $booked_rooms = Booking::where('room_id', $room->id)
                ->where(function ($query) use ($checkin_date) {
                    $query->where('checkin_date', '<=', $checkin_date)
                        ->where('checkout_date', '>=', $checkin_date);
                })->where('booking_status', 1)->count();

            $available_quantity = $room->quantity - $booked_rooms;
            if ($available_quantity > 0) {
                $available_rooms[] = [
                    'id' => $room->id,
                    'name' => $room->name,
                    'quantity' => $room->quantity,
                    'available_quantity' => $available_quantity
                ];
            }
        }

        return response()->json(['data' => $available_rooms]);
    }

    public function success()
    {
        return view('frontend.success.booking');
    }
}
