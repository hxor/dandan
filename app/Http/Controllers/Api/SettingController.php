<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\City;
use App\Models\Setting;

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

    public function getAboutUs()
    {
        $setting = Setting::orderBy('id', 'desc')->first();
        return response()->json([
            'status' => 200,
            'message' => 'Get About us data',
            'data' => [
                'aboutus' => $setting->aboutus,
                'link_plasytore' => $setting->linkps
            ]
        ]);
    }
}
