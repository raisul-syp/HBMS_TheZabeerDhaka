<?php

namespace App\Models;

use App\Models\Facility;
use App\Models\Roomtype;
use App\Models\RoomImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;

    protected $table = 'hb_rooms';

    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'long_description',
        'max_adults',
        'max_childs',
        'quantity',
        'price',
        'discount_rate',
        'discount_price',
        'meta_title',
        'meta_keyword',
        'meta_decription',
        'has_discount',
        'is_active',
        'is_delete',
        'created_by',
        'updated_by',
    ];

    public function roomImages()
    {
        return $this->hasMany(RoomImage::class, 'room_id', 'id');
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class, 'hb_room_facilities');
    }

    public function roomViews()
    {
        return $this->belongsToMany(Roomtype::class, 'hb_roomtype_view');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'room_id', 'id');
    }
}
