<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'price',
        'rating',
        'stock',
        'brand',
        'sku',
        'images',
        'warrantyInformation',
        'shippingInformation',
        'availabilityStatus',
    ];
    
    protected $casts = [
        'images' => 'array', 
    ];

    public function setImagesAttribute($value)
    {
        $this->attributes['images'] = is_array($value) ? json_encode($value) : json_encode([]);
    }

    public function getFirstImageAttribute()
    {
        $images = $this->images;
        return is_array($images) && count($images) > 0 ? $images[0] : null;
    }

}
