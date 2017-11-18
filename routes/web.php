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

    //Customer, and Order
    Route::resource('order', 'OrderController', ['names' => 'admin.order']);
    Route::resource('customer', 'CustomerController', ['names' => 'admin.customer']);
    Route::get('customer/{id}/editpass', 'CustomerController@editPass')->name('admin.customer.editpass');
    Route::put('customer/{id}/editpass', 'CustomerController@updatePass')->name('admin.customer.updatepass');
    Route::post('order/report', 'OrderController@getReport')->name('admin.order.reports');
    Route::get('send/notif', 'CustomerController@getNotifView')->name('admin.customer.notif');
    Route::post('send/notif', 'CustomerController@postNotif')->name('admin.customer.sendnotif');


    //Job
    Route::resource('job', 'JobController', ['names' => 'admin.job']);
    Route::resource('architect', 'ArchitectController', ['names' => 'admin.architect']);
    Route::get('architect/{id}/image/', 'ArchitectController@getUploadImage')->name('admin.architect.image');
    Route::post('architect/{id}/image', 'ArchitectController@postUploadImage')->name('admin.architect.upload');
    Route::delete('architect/{id}/image', 'ArchitectController@deleteUploadImage')->name('admin.architect.delimage');


    //Setting
    Route::resource('setting', 'SettingController', [
        'names' => 'admin.setting',
        'only' => ['index', 'store']
    ]);
    Route::resource('status', 'StatusController', ['names' => 'admin.status']);
    Route::resource('city', 'CityController', ['names' => 'admin.city']);
    Route::resource('cost', 'CostController', ['names' => 'admin.cost']);
    Route::resource('user', 'UserController', ['names' => 'admin.user']);
    Route::get('user/{id}/editpass', 'UserController@editPass')->name('admin.user.editpass');
    Route::put('user/{id}/editpass', 'UserController@updatePass')->name('admin.user.updatepass');
});

Route::group(['prefix' => 'api/table'], function() {
    Route::get('partner', 'PartnerController@getPartnerData')->name('api.partner.data');
    Route::get('splash', 'PartSplashController@getSplashData')->name('api.splash.data');
    Route::get('promo', 'PromoController@getPromoData')->name('api.promo.data');

    Route::get('customer', 'CustomerController@getCustomerData')->name('api.customer.data');

    Route::get('order', 'OrderController@getOrderData')->name('api.order.data');

    Route::get('job', 'JobController@getJobData')->name('api.job.data');
    Route::get('cost', 'CostController@getCostData')->name('api.cost.data');
    Route::get('architect', 'ArchitectController@getArchitectData')->name('api.architect.data');

    Route::get('status', 'StatusController@getStatusData')->name('api.status.data');
    Route::get('city', 'CityController@getCityData')->name('api.city.data');
    Route::get('user', 'UserController@getUserData')->name('api.user.data');
});

Route::group(['prefix' => 'api/order'], function() {
    Route::get('job/thismonth', 'OrderController@getOrderJobThisMonth')->name('api.order.job.month');
    Route::get('status/thismonth', 'OrderController@getOrderStatusThisMonth')->name('api.order.status.month');
});


Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin', function () {
        return 'Halaman Admin';
    });
});
Route::group(['middleware' => ['auth', 'role:manager']], function () {
    Route::get('/manager', function () {
        return 'Halaman Manager';
    });
});
Route::group(['middleware' => ['auth', 'role:supervisor']], function () {
    Route::get('/supervisor', function () {
        return 'Halaman Supervisor';
    });
});
