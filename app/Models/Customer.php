<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    protected $fillable = [
        'name', 'address', 'phone', 'email', 'password', 'device_id'
    ];

    protected $hidden = [
        'password'
    ];
}
