<?php

namespace App\Models;

use App\Models\Restaurent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RestaurentImage extends Model
{
    use HasFactory;

    protected $table = 'hb_restaurent_images';

    protected $fillable = [
        'restaurent_id',
        'image',
    ];

    public function restaurents()
    {
        return $this->belongsTo(Restaurent::class, 'restaurent_id');
    }
}
