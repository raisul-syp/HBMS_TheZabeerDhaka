<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomtypeView extends Model
{
    use HasFactory;

    protected $table = 'hb_roomtype_view';

    protected $fillable = [
        'room_id',
        'roomtype_id',
    ];

    public function roomtypeview()
    {
        return $this->belongsToMany(RoomtypeView::class, 'roomtype_id', 'room_id');
    }
}
