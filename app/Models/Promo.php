<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $fillable = ['id', 'title', 'image', 'desc', 'is_banner'];
}
