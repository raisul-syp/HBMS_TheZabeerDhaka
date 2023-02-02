<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $table = 'hb_offers';

    protected $fillable = [
        'name',
        'slug',
        'offer_category',
        'short_description',
        'long_description',
        'start_date',
        'end_date',
        'thumb',
        'meta_title',
        'meta_keyword',
        'meta_decription',
        'is_active',
        'is_delete',
        'created_by',
        'updated_by',
    ];
}
