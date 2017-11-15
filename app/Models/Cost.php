<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    protected $fillable = ['job_id', 'cost', 'cost_type'];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
