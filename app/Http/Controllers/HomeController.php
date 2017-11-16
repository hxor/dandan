<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobChart = Order::getOrderJobThisMonth();
        $statusChart = Order::getOrderStatusThisMonth();
        return view('pages.admin.index', compact('jobChart', 'statusChart'));
    }
}
