<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerProperty extends Model
{
    use HasFactory;

    protected $fillable = ['property_id', 'seller_id'];
}
