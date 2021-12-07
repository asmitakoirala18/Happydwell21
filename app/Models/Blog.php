<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
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
        'posted_by'
    ];

    public function postedBy(){
       return $this->belongsTo(SuperAdmin::class,'posted_by','id');
    }
}
