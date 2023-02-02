<?php

namespace App\Models;

use App\Models\Room;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoomFacility extends Model
{
    use HasFactory;

    protected $table = 'hb_room_facilities';

    protected $fillable = [
        'room_id',
        'facility_id',
    ];

    public function room()
    {
        return $this->belongsToMany(RoomFacility::class, 'facility_id', 'room_id');
    }
}
