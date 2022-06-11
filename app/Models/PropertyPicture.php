<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyPicture extends Model
{
    use HasFactory;

    /**
     * Mass assingable attributes
     */
    protected $fillable = [
        'property_picture_path',
        'property_picture_title',
        'property_picture_description',
        'property_id'
    ];
    /**
     * Relationship with Property model
     */
    public function property(){
        return $this->belongsTo(Property::class);
    }
}
