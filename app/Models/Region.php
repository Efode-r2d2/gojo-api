<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'region_name',
        'region_code',
        'country'
    ];
    /**
     * Get the country owns the region
     */
    public function country(){
        return $this->belongsTo(Country::class);
    }
    /**
     * Get cities under this region
     */
    public function cities(){
        return $this->hasMany(City::class);
    }
}
