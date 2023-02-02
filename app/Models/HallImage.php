<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HallImage extends Model
{
    use HasFactory;

    protected $table = 'hb_hall_images';

    protected $fillable = [
        'hall_id',
        'image',
    ];

    public function halls()
    {
        return $this->belongsTo(Hall::class, 'hall_id');
    }
}
