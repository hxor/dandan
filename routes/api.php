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
    Route::post('auth/register', 'Api\AuthController@register');
    Route::post('auth/login', 'Api\AuthController@login');
    Route::post('auth/customer/register', 'Api\AuthController@registerCustomer');
    Route::post('auth/customer/login', 'Api\AuthController@loginCustomer');
    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::get('/jwt/jwt', function() {
            return 'Test JWT Page';
        });
    });
});
