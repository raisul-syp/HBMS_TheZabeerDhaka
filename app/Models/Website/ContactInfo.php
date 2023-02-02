<?php

namespace App\Models\Website;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasFactory;

    protected $table = 'hb_webcontactinfos';

    protected $fillable = [
        'hotel_name',
        'phone',
        'email',
        'address',
        'google_map',
        'phone_sales',
        'phone_reservation',
        'email_sales',
        'email_reservation',
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
