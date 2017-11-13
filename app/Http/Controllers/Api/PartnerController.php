<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\PartnerSplash as Splash;
use App\Models\Promo;
use App\Models\Partner;
use App\Models\Job;

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
                'api_banner' => [
                    'method' => 'GET',
                    'href' => route('api.partner.banner')
                ],
                'api_history' => '',
                'api_profile' => [
                    'method' => 'GET',
                    'href' => route('api.user.profile'),
                    'param' => 'token'
                ],
            ],
        ]);
    }

    public function getSplash()
    {
        $splash = Splash::where('is_active', 1)->limit(4)->get();
        $job = Jobs::all();
        return response()->json([
            'status' => 200,
            'message'=>'Get Data Splash',
            'data' => [
                'splash' => $splash,
                'api_banner' => [
                    'method' => 'GET',
                    'href' => route('api.partner.banner')
                ],
                'api_history' => '',
                'api_partner' => [
                    'method' => 'GET',
                    'href' => route('api.partner.sponsor')
                ],
                'api_profile' => [
                    'method' => 'GET',
                    'href' => route('api.user.profile'),
                    'param' => 'token'
                ],
                'api_job' => [
                    'job_data' => $job
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
}
