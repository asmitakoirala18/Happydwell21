<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'date',
        'status',
        'meta_keywords',
        'meta_description',
        'summary',
        'description',
        'image',
        'page_visit',
        'posted_by',
        'service_type_id'
    ];

    public function postedBy()
    {
        return $this->belongsTo(SuperAdmin::class, 'posted_by', 'id');
    }

    public function serviceName()
    {
       return $this->belongsTo(ServiceType::class, 'service_type_id', 'id');
    }
}
