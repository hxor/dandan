<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

use App\Models\Order;

class OrderController extends Controller
{
    public function getOrderHistory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
            'job_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 404,
                'message' => $validator->getMessageBag()->toArray(),
                'data' => null
            ], 200);
        }

        try {
            $order = Order::where('customer_id', $request->customer_id)
                ->where('job_id', $request->job_id)
                ->paginate(3);

            return response()->json([
                'status' => 200,
                'message' => 'Get History Data success',
                'data' => $order,
            ]);

        } catch (JWTAuthException $e) {
            return response()->json([
                'status' => 500,
                'data' => null,
                'message' => $e->getMessage()
            ], 200);
        }
    }
    public function postOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
            'job_id' => 'required',
            'status_id' => 'required',
            'locate' => 'required',
            'city' => 'required',
            'date' => 'required',
            'cost' => 'numeric',
            'order_desc' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 404,
                'message' => $validator->getMessageBag()->toArray(),
                'data' => null
            ], 200);
        }

        try {
            $input = $request->all();
            $order = Order::create($input);

            $message = [
                'title' => 'Order Job Baru',
                'body' => 'Terdapat order baru yang dipesan. Harap Periksa.'
            ];
            
            fcm()->data($message)->toTopics('/topics/android');

            return response()->json([
                'status' => 200,
                'message' => 'success_to_create_order',
                'data' => $order,
            ]);

        } catch (JWTAuthException $e) {
            return response()->json([
                'status' => 500,
                'data' => null,
                'message' => $e->getMessage()
            ], 200);
        }

    }
}
