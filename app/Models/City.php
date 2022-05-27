<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    /**
     * Mass assignables
     */
    protected $fillable = [
        'city_name',
        'city_code',
        'region'
    ];
    /**
     * Get the region owns the city
     */
    public function region(){
        return $this->belongsTo(Region::class);
    }
}
