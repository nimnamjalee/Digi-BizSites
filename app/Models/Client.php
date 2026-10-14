<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'business_name',
        'email',
        'phone',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}