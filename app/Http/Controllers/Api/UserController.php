<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Config;
use JWTAuth;
use JWTAuthException;

use App\Models\Customer;

class UserController extends Controller
{
    public function getProfile(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'user_id' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 404,
                    'data' => null,
                    'message' => $validator->getMessageBag()->toArray()
                ]);
            }

            $user_id = $request->user_id;
            $user = Customer::findOrFail($user_id);

            return response()->json([
                'status' => 200,
                'message'=>'Get Data User',
                'data' => [
                    'user' => $user,
                    'api_profile_update' => [
                        'method' => 'POST',
                        'href' => route('api.user.profile.update'),
                        'params' => 'token, user_id, name, address, phone, email',
                    ],
                ],
            ]);

        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'data' => null,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function updateProfile(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'user_id' => 'required',
                'name' => 'required|string|max:255',
                'address' => 'required',
                'phone' => 'required',
                'email' => 'required|string|email|max:255|unique:users,email,' . $request->user_id,
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 404,
                    'data' => null,
                    'message' => $validator->getMessageBag()->toArray()
                ]);
            }

            $user = Customer::findOrFail($request->user_id);
            $user->update([
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email
            ]);

            return response()->json([
                'status' => 200,
                'message'=>'Update Customer Success',
                'data' => [
                    'user' => $user,
                    'api_profile' => [
                        'method' => 'GET',
                        'href' => route('api.user.profile'),
                        'param' => 'token'
                    ],
                ],
            ]);

        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'data' => null,
                'message' => $e->getMessage()
            ]);
        }
    }
}
