<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\PartnerSplash as Splash;
use App\Models\Promo;
use App\Models\Partner;
use App\Models\Job;
use App\Models\Cost;
use App\Models\City;
use App\Models\Architect;

class PartnerController extends Controller
{
    public function getPartner()
    {
        $partner = Partner::paginate(9);
        return response()->json([
            'status' => 200,
            'message'=>'Get Data Splash',
            'data' => [
                'partner' => $partner,
            ],
        ]);
    }

    public function getPromo()
    {
        $promo = Promo::paginate(9);
        return response()->json([
            'status' => 200,
            'message'=>'Get Data Promo',
            'data' => [
                'partner' => $promo,
            ],
        ]);
    }

    public function getSplash()
    {
        $splash = Splash::where('is_active', 1)->first();
        $job = Job::all();
        $cost = Cost::all();
        $city = City::all();
        return response()->json([
            'status' => 200,
            'message'=>'Get Data Splash',
            'data' => [
                'splash' => $splash,
                'api_banner' => [
                    'method' => 'GET',
                    'href' => route('api.partner.banner')
                ],
                'api_order_history' => [
                    'method' => 'GET',
                    'href' => route('api.order.history'),
                    'param' => 'job_id,customer_id'
                ],
                'api_sponsor' => [
                    'method' => 'GET',
                    'href' => route('api.partner.sponsor')
                ],
                'api_promo' => [
                    'method' => 'GET',
                    'href' => route('api.partner.promo')
                ],
                'api_architect' => [
                    'method' => 'GET',
                    'href' => route('api.partner.architect')
                ],
                'api_profile' => [
                    'method' => 'GET',
                    'href' => route('api.user.profile'),
                    'param' => 'token'
                ],
                'api_job' => [
                    'method' => 'GET',
                    'href' => route('api.job.list'),
                    'job' => $job
                ],
                'api_cost' => [
                    'method' => 'GET',
                    'href' => route('api.job.cost'),
                    'cost' => $cost
                ],
                'api_city' => [
                    'method' => 'GET',
                    'href' => route('api.setting.city'),
                    'city' => $city
                ]
            ],
        ]);
    }

    public function getBanner()
    {
        $banner = Promo::where('is_banner', 1)->limit(3)->get();
        return response()->json([
            'status' => 200,
            'message'=>'Get Data Banner',
            'data' => [
                'banner' => $banner,
            ],
        ]);
    }

    public function getArchitect()
    {
        $arch = Architect::paginate(9);
        return response()->json([
            'status' => 200,
            'message' => 'Get Data Architect',
            'data' => [
                'architect' => $arch,
            ],
        ]);
    }
}
