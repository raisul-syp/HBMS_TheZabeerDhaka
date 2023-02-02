<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryList extends Model
{
    use HasFactory;

    protected $table = 'hb_country';

    protected $fillable = [
        'country_code',
        'country_name',
        'code',
        'currency',
        'is_active',
        'created_by',
        'updated_by',
    ];
}
