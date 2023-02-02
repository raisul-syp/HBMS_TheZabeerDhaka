<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wellness extends Model
{
    use HasFactory;

    protected $table = 'hb_wellness';

    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'long_description',
        'logo_image',
        'meta_title',
        'meta_keyword',
        'meta_decription',
        'is_active',
        'is_delete',
        'created_by',
        'updated_by',
    ];

    public function wellnessImages()
    {
        return $this->hasMany(WellnessImage::class, 'wellness_id', 'id');
    }
}
