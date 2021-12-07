<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Auth;

class Buyer extends Auth
{
    use HasFactory;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'gender',
        'image',
        'email_verification',
        'status'
    ];
}
