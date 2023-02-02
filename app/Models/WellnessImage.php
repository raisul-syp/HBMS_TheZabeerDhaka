<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WellnessImage extends Model
{
    use HasFactory;

    protected $table = 'hb_wellness_images';

    protected $fillable = [
        'wellness_id',
        'image',
    ];

    public function halls()
    {
        return $this->belongsTo(Hall::class, 'wellness_id');
    }
}
