<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $table = 'hb_settings';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'logo',
        'icon',
        'social_fb',
        'social_tw',
        'social_insta',
        'social_yt',
        'display_order',
        'meta_title',
        'meta_keyword',
        'meta_decription',
        'is_active',
        'is_delete',
        'created_by',
        'updated_by',
    ];
}
