<?php

namespace App\Models\Website;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory;

    protected $table = 'hb_webpages';

    protected $fillable = [
        'name',
        'title',
        'sub_title',
        'short_description',
        'long_description',
        'slug',
        'display_order',
        'image',
        'meta_title',
        'meta_keyword',
        'meta_decription',
        'footer_item',
        'is_active',
        'is_delete',
        'created_by',
        'updated_by',
    ];
}
