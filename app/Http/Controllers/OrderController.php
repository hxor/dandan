<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Status;
use App\Models\Job;
use App\Models\City;
use App\Models\Setting;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobChart = Order::getOrderJobThisMonth();
        $statusChart = Order::getOrderStatusThisMonth();
        return view('pages.admin.order.index', compact('jobChart', 'statusChart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Customer::pluck('name', 'id');
        $status = Status::pluck('status', 'id');
        $job = Job::pluck('job', 'id');
        $city = City::pluck('city', 'city');
        return view('pages.admin.order.create', compact('customer', 'status', 'job', 'city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_id' => 'required',
            'job_id' => 'required',
            'status_id' => 'required',
            'locate' => 'required',
            'city' => 'required',
            'date' => 'required',
            'cost' => 'numeric|required',
            'order_desc' => 'required'
        ]);

        Order::create($request->all());

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Order successfully added',
        ]);

        return redirect()->route('admin.order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        $data = Setting::orderBy('id', 'desc')->first();
        return view('pages.admin.order.show', compact('order', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $customer = Customer::pluck('name', 'id');
        $status = Status::pluck('status', 'id');
        $job = Job::pluck('job', 'id');
        $city = City::pluck('city', 'city');
        return view('pages.admin.order.edit', compact('customer', 'status', 'job', 'order', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'customer_id' => 'required',
            'job_id' => 'required',
            'status_id' => 'required',
            'locate' => 'required',
            'city' => 'required',
            'date' => 'required',
            'cost' => 'numeric|required',
            'order_desc' => 'required'
        ]);
        $order = Order::findOrFail($id);
        $order->update($request->all());

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Order successfully updated',
        ]);

        $device_id = [$order->customer->device_id]; //must an array for lists customers
        $message = [
            'title' => 'Status Order Berubah',
            'body' => 'status order ' . $order->job->job . ' : ' . $order->status->status
        ];

        fcm()->data($message)->to($device_id);

        return redirect()->route('admin.order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Order::destroy($id)) return redirect()->back();

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Order successfully deleted',
        ]);

        return redirect()->route('admin.order.index');
    }

    public function getOrderData()
    {
        $order = Order::all();

        return Datatables::of($order)
            ->addColumn('customer', function($order) {
                return $order->customer->name;
            })
            ->addColumn('job', function($order) {
                return $order->job->job;
            })
            ->addColumn('status', function($order) {
                return $order->status->status;
            })
            ->addColumn('phone', function($order) {
                return $order->customer->phone;
            })
            ->addColumn('action', function($order){
                return view('layouts.admin.partials._action', [
                    'model' => $order->id,
                    'form_url' => route('admin.order.destroy', $order->id),
                    'edit_url' => route('admin.order.edit', $order->id),
                    'show_url' => route('admin.order.show', $order->id)
                ]);
            })
            ->rawColumns(['action'])
            ->make(true);

    }

    public function getReport(Request $request)
    {
        $data = Setting::orderBy('id', 'desc')->first();

        $date['start'] = $request->start;
        $date['end'] = $request->end;

        $orders = Order::whereBetween('created_at', [$date['start'], $date['end']])
            ->get();

        return view('pages.admin.order.list-order', compact('orders', 'date', 'data'));
    }



    // sending push message to single user by firebase reg id
    public function send($to, $message)
    {
        return $fields = array(
            'to' => $to,
            'data' => $message,
        );
        // return $this->sendPushNotification($fields);
    }
 
    // Sending message to a topic by topic name
    public function sendToTopic($to, $message)
    {
        $fields = array(
            'to' => '/topics/' . $to,
            'data' => $message,
        );
        return $this->sendPushNotification($fields);
    }
 
    // sending push message to multiple users by firebase registration ids
    public function sendMultiple($registration_ids, $message)
    {
        $fields = array(
            'to' => $registration_ids,
            'data' => $message,
        );

        return $this->sendPushNotification($fields);
    }
 
    // function makes curl request to firebase servers
    private function sendPushNotification($fields)
    {
 
        // Set POST variables
        $url = 'https://fcm.googleapis.com/fcm/send';

        $headers = array(
            'Authorization: key=' . env(FIREBASE_API_KEY),
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();
 
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
 
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
 
        // Close connection
        curl_close($ch);

        return $result;
    }

}
