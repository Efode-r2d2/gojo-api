<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    /**
     * Attributes that are mass assignable
     */
    protected $fillable = [
        'country_name',
        'capital_city',
        'telephone_code',
        'country_code'
    ];
}
