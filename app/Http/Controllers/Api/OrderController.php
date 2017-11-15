<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

use App\Models\Order;

class OrderController extends Controller
{
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
                'status' => '422',
                'message' => $validator->getMessageBag()->toArray(),
                'data' => null
            ]);
        }

        try {
            $input = $request->all();
            $order = Order::create($input);

            return response()->json([
                'status' => 200,
                'message' => 'success_to_create_order',
                'data' => $order,
            ]);

        } catch (JWTAuthException $e) {
            return response()->json([
                'status' => 500,
                'message' => 'failed_to_create_order',
                'data' => null,
            ]);
        }

    }
}
