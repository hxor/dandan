<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id', 'job_id', 'status_id', 'locate', 'city', 'date', 'cost', 'order_desc'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
