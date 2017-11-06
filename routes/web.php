<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function() {
    Route::resource('partner', 'PartnerController', ['names' => 'admin.partner']);
    Route::resource('splash', 'PartSplashController', ['names' => 'admin.splash']);
    Route::resource('promo', 'PromoController', ['names' => 'admin.promo']);
});

Route::group(['prefix' => 'api/table'], function() {
    Route::get('partner', 'PartnerController@getPartnerData')->name('api.partner.data');
    Route::get('splash', 'PartSplashController@getSplashData')->name('api.splash.data');
    Route::get('promo', 'PromoController@getPromoData')->name('api.promo.data');
});
