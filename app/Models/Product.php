<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'image',
        'category',
        'barcode',
        'price',
        'quantity',
        'status'
    ];

    public function getImageUrlAttribute()
    {
        // Check if the image exists and return the URL, otherwise return a default image URL
        return $this->image ? asset('uploads/' . $this->image) : asset('uploads/default.png');
    }
}
