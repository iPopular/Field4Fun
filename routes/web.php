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
    return Redirect::to('/'. Auth::user()->stadium->name .'/report_problems');
});

Auth::routes();

Route::get('/{stadium}/customer_info', [
    'middleware' => ['auth', 'roles'],
    'uses' => 'CustomerInfoController@show',
    'roles' => ['owner', 'administrator', 'staff']
]);

Route::get('/{stadium}/add-customer', [
    'middleware' => ['auth', 'roles'],
    'uses' => 'CustomerInfoController@addCustomer',
    'roles' => ['owner', 'administrator', 'staff']
]);

Route::get('/{stadium}/account_management', [
    'middleware' => ['auth', 'roles'], 
    'uses' => 'AccountController@show',
    'roles' => ['owner']
]);

Route::post('/{stadium}/add-account', [
    'middleware' => ['auth', 'roles'], 
    'uses' => 'AccountController@addAccount',
    'roles' => ['owner']
]);

Route::post('/{stadium}/update-account/{username}', [
    'middleware' => ['auth', 'roles'], 
    'uses' => 'AccountController@updateAccount',
    'roles' => ['owner']
]);

Route::post('/{stadium}/delete-account', [
    'middleware' => ['auth', 'roles'], 
    'uses' => 'AccountController@deleteAccount',
    'roles' => ['owner']
]);

Route::get('/{stadium}/report_problems', [
    'middleware' => ['auth', 'roles'],
    'uses' => 'ReportProblemsController@show',
    'roles' => ['owner', 'administrator', 'staff']
]);

