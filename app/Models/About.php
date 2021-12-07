<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
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
        'posted_by'
    ];

    public function postedBy(){
        return $this->belongsTo(SuperAdmin::class,'posted_by','id');
    }
}
