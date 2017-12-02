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

    protected $dates = [
        'created_at',
        'date'
    ];

    public static function getOrderJobThisMonth($city = null)
    {
        $data = [];
        $jobs = Job::all();
        foreach ($jobs as $job ){
            if ($city == null) {
                $data[] = [
                    'name' => $job->job,
                    'total' => Order::where('job_id', $job->id)->whereMonth('created_at', '=', date('m'))->count()
                ];
            } else {
                $data[] = [
                    'name' => $job->job,
                    'total' => Order::where('job_id', $job->id)->where('city', $city)->whereMonth('created_at', '=', date('m'))->count()
                ];
            }
        }

        return response()->json($data);
    }

    public static function getOrderStatusThisMonth($city = null)
    {
        $data = [];
        $statuses = Status::all();
        foreach ($statuses as $status ){
            if ($city == null) {
                $data[] = [
                    'name' => $status->status,
                    'total' => Order::where('status_id', $status->id)->whereMonth('created_at', '=', date('m'))->count()
                ];
            } else {
                $data[] = [
                    'name' => $status->status,
                    'total' => Order::where('status_id', $status->id)->where('city', $city)->whereMonth('created_at', '=', date('m'))->count()
                ];
            }
        }

        return response()->json($data);
    }
}
