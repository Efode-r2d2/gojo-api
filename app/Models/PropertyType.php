<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    use HasFactory;
    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'property_type_name',
        'property_type_code'
    ];
}
