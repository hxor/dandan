<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Config;
use JWTAuth;
use JWTAuthException;
use App\Models\User;
use App\Models\Customer;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => '422',
                'data' => null,
                'message' => $validator->getMessageBag()->toArray()
            ]);
        }
        $data = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);
        $credentials = [
            'email' => $request['email'],
            'password' => $request['password']
        ];
        $token = null;
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'status' => 500,
                    'data' => null,
                    'message' => 'invalid_email_or_password',
                ]);
            }
        } catch (JWTAuthException $e) {
            return response()->json([
                'status' => 500,
                'data' => null,
                'message' => 'failed_to_create_token',
            ]);
        }
        return response()->json([
            'status' => 200,
            'message'=>'User created successfully',
            'data' => [
                'token' => $token,
                'user' => $data
            ],
        ]);
    }
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        $token = null;
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'status' => 500,
                    'data' => null,
                    'message' => 'invalid_email_or_password',
                ]);
            }
        } catch (JWTAuthException $e) {
            return response()->json([
                'status' => 500,
                'data' => null,
                'message' => 'failed_to_create_token',
            ]);
        }
        $user = User::where('email', $request->email)->first();
        return response()->json([
            'status' => 200,
            'message'=>'User login successfully',
            'data' => [
                'token' => $token,
                'user' => $user
            ],
        ]);
    }
    public function registerCustomer(Request $request)
    {
        Config::set('jwt.user' , "App\Models\Customer");
        Config::set('auth.providers.users.model', \App\Models\Customer::class);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'required',
            'phone' => 'required|unique:customers',
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|min:6|confirmed'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => '422',
                'data' => null,
                'message' => $validator->getMessageBag()->toArray()
            ]);
        }

        $data = Customer::create([
            'name' => $request['name'],
            'address' => $request['address'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);

        $credentials = [
            'email' => $request['email'],
            'password' => $request['password']
        ];

        $token = null;
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'status' => 500,
                    'data' => null,
                    'message' => 'invalid_email_or_password',
                ]);
            }
        } catch (JWTAuthException $e) {
            return response()->json([
                'status' => 500,
                'data' => null,
                'message' => 'failed_to_create_token',
            ]);
        }
        return response()->json([
            'status' => 200,
            'message'=>'User created successfully',
            'data' => [
                'token' => $token,
                'user' => $data
            ],
        ]);
    }
    public function loginCustomer(Request $request){
        Config::set('jwt.user' , "App\Models\Customer");
        Config::set('auth.providers.users.model', \App\Models\Customer::class);
        $credentials = $request->only('email', 'password');
        $token = null;

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'status' => 500,
                    'data' => null,
                    'message' => 'invalid_email_or_password',
                ]);
            }
        } catch (JWTAuthException $e) {
            return response()->json([
                'status' => 500,
                'data' => null,
                'message' => 'failed_to_create_token',
            ]);
        }

        $user = Customer::where('email', $request->email)->first();

        return response()->json([
            'status' => 200,
            'message'=>'User login successfully',
            'data' => [
                'token' => $token,
                'user' => $user
            ],
        ]);
    }
}
