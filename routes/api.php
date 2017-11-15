<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1','middleware' => ['api','cors']], function () {
    Route::group(['prefix' => 'auth'], function(){
        Route::post('/register', 'Api\AuthController@register');
        Route::post('/login', 'Api\AuthController@login');
        Route::post('/customer/register', 'Api\AuthController@registerCustomer');
        Route::post('/customer/login', 'Api\AuthController@loginCustomer');
    });

    Route::group(['middleware' => 'jwt.auth'], function () {

        Route::group(['prefix' => 'partner', 'namespace' => 'Api'], function(){
            Route::get('splash', 'PartnerController@getSplash')->name('api.partner.splash');
            Route::get('banner', 'PartnerController@getBanner')->name('api.partner.banner');
            Route::get('/', 'PartnerController@getPartner')->name('api.partner.sponsor');
        });


        Route::group(['prefix' => 'user', 'namespace' => 'Api'], function() {
            Route::get('/profile', 'UserController@getProfile')->name('api.user.profile');
            Route::post('/profile', 'UserController@updateProfile')->name('api.user.profile.update');
        });

        Route::group(['prefix' => 'job', 'namespace' => 'Api'], function() {
            Route::get('/', 'JobController@getJob')->name('api.job.list');
            Route::get('cost', 'JobController@getCost')->name('api.job.cost');
        });

        Route::group(['prefix' => 'order', 'namespace' => 'Api'], function() {
            Route::post('post', 'OrderController@postOrder')->name('api.order.post');
            Route::get('history', 'OrderController@getOrderHistory')->name('api.order.history');
        });

        Route::group(['prefix' => 'setting', 'namespace' => 'Api'], function() {
            Route::get('city', 'SettingController@getCity')->name('api.setting.city');
        });

    });
});
