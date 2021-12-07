<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'slug',
        'description',

    ];

    public function getAllServiceData()
    {
        return $this->hasMany(Service::class, 'service_type_id', 'id');
    }
}
