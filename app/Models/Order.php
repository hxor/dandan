<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id', 'job_id', 'status_id', 'locate', 'city', 'date', 'cost', 'order_desc'
    ];
}
