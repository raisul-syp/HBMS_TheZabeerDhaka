<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'hb_bookings';

    protected $fillable = [
        'guest_id',
        'room_id',
        'staff_id',
        'checkin_date',
        'checkout_date',
        'checkin_time',
        'checkout_time',
        'total_adults',
        'total_childs',
        'booking_status',
        'is_delete',
        'payment_mode',
        'booking_comment',
        'created_by',
        'updated_by',
    ];

    public function guests()
    {
        return $this->belongsTo(User::class, 'guest_id');
    }

    public function rooms()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function staffs()
    {
        return $this->belongsTo(Admin::class, 'staff_id');
    }
}
