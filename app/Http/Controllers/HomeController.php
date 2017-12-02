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
    public function index(Request $request)
    {
        if ($request->user()->role == 'admin') {
            $jobChart = Order::getOrderJobThisMonth();
            $statusChart = Order::getOrderStatusThisMonth();
            return view('pages.admin.index', compact('jobChart', 'statusChart'));
        } else {
            $jobChart = Order::getOrderJobThisMonth($request->user()->city);
            $statusChart = Order::getOrderStatusThisMonth($request->user()->city);
            return view('pages.admin.index', compact('jobChart', 'statusChart'));
        }
        
    }
}
