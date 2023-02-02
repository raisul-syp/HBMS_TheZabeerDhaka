<?php

namespace App\Models\Website;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'hb_websliders';

    protected $fillable = [
        'name',
        'slug',
        'desktop_image',
        'mobile_image',
        'content_1',
        'content_2',
        'content_3',
        'content_4',
        'content_5',
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
