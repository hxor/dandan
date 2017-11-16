<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['code', 'job'];

    public function prices()
    {
        return $this->hasMany(Cost::class);
    }
}
