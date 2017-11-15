<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\City;

class SettingController extends Controller
{
    public function getCity()
    {
        $city = City::all();
        return response()->json([
            'status' => 200,
            'message' => 'List available city',
            'data' => $city
        ]);
    }
}
