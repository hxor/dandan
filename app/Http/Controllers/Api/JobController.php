<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Cost;
use App\Models\Job;

class JobController extends Controller
{
    public function getJob()
    {
        $job = Job::all();
        return response()->json([
            'status' => 200,
            'message' => 'Job List',
            'data' => $job
        ]);
    }
    public function getCost()
    {
        $cost = Cost::all();
        return response()->json([
            'status' => 200,
            'message' => 'Cost list',
            'data' => $cost
        ]);
    }
}
