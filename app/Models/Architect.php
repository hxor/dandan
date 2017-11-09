<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Architect extends Model
{
    protected $fillable = ['title', 'desc', 'title', 'image'];


    public function images()
    {
        return $this->hasMany(ArchImage::class);
    }
}
