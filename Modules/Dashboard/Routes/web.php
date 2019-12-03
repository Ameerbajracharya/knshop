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

Route::group(['middleware' => ['auth','web'],'prefix' => 'dashboard'], function()
{
    Route::get('/', 						['as'=>'dashboard',			'uses'=>'DashboardController@index']);
    Route::get('/orders', 					['as'=>'order.view',		'uses'=>'DashboardController@order']);
    Route::get('/orders/show/{id}', 		['as'=>'order.show',		'uses'=>'DashboardController@showorder']);
    Route::get('/confirm/{id}', 			['as'=>'confirm.status',	'uses'=>'DashboardController@confirm']);
    Route::get('/delivery/{id}', 			['as'=>'delivery.status',	'uses'=>'DashboardController@delivery']);
    Route::any('/search', 					['as'=>'search',			'uses'=>'DashboardController@search']);

});
