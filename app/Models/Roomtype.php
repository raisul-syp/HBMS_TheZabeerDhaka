<?php

namespace App\Models;

use App\Models\Room;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Roomtype extends Model
{
    use HasFactory;

    protected $table = 'hb_roomtype';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'meta_title',
        'meta_keyword',
        'meta_decription',
        'is_active',
        'is_delete',
        'created_by',
        'updated_by',
    ];

    public function roomtypeviews(){
        return $this->belongsToMany(Room::class, 'hb_roomtype_view');
    }
}
