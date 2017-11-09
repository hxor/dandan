<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchImage extends Model
{
    protected $table = 'archimage';
    protected $fillable = ['architect_id', 'image'];

    public function arch()
    {
        return $this->belongsTo(Architect::class);
    }
}
