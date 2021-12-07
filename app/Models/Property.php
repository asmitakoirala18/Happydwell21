<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use willvincent\Rateable\Rateable;

class Property extends Model
{
    use HasFactory, Rateable;


    protected $fillable = [
        'types',
        'country',
        'state_name',
        'city_name',
        'zip_code',
        'title',
        'slug',
        'price',
        'build_date',
        'bedrooms',
        'garages',
        'bathrooms',
        'area',
        'summary',
        'description',
        'image',
        'is_slider',
        'is_verify',
        'state_id_card',
        'tax_payment_document',
        'page_visit',


    ];

    public function featuredImages()
    {
        return $this->hasMany(PropertyGallery::class, 'property_id', 'id');
    }

    public function getTitleAttribute($value)
    {
        return Str::title($value);
    }

    public function getRating()
    {


    }
}
