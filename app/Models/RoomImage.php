<?php

namespace App\Models;

use App\Models\Room;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoomImage extends Model
{
    use HasFactory;

    protected $table = 'hb_room_images';

    protected $fillable = [
        'room_id',
        'image',
    ];

    public function rooms()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
