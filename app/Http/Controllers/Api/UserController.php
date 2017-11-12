<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;
use JWTAuth;
use JWTAuthException;

use App\Models\Customer;

class UserController extends Controller
{
    public function getProfile(Request $request)
    {
        try {
            Config::set('jwt.user' , "App\Models\Customer");
            Config::set('auth.providers.users.model', \App\Models\Customer::class);
            $user = JWTAuth::toUser($request->token);

            return response()->json([
                'status' => 200,
                'message'=>'Get Data User',
                'data' => [
                    'user' => $user,
                    'api_profile_update' => [
                        'method' => 'POST',
                        'href' => route('api.user.profile.update'),
                        'params' => 'token, name, address, phone, email',
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
            Config::set('jwt.user' , "App\Models\Customer");
            Config::set('auth.providers.users.model', \App\Models\Customer::class);
            $user = JWTAuth::toUser($request->token);

            return response()->json([
                'status' => 200,
                'message'=>'Update Customer Success',
                'data' => [
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
