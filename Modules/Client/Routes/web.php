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

Route::group(['prefix' => 'client'],function() {
	Route::get('/', 						['as'=>'client', 						'uses'=>'ClientController@index' ])->middleware('auth:client');
	Route::get('/login', 					['as'=>'client.login', 					'uses'=>'ClientController@loginClient'])->middleware('guest:client');
	Route::get('/register',					['as'=>'client.register',				'uses'=>'ClientController@registerClient']);
	Route::post('/update/{id}',				['as'=>'client.update',					'uses'=>'ClientController@update']);
	Route::Get('clientorder/{id}',			['as'=>'client.order',					'uses'=>'ClientController@order']);
});

Route::group(['prefix' => 'dashboard'],function() {
	Route::get('/client',					['as'=>'client.dashboardindex',			'uses'=>'ClientController@dashboardindex']);
	Route::get('/client/delete/{id}',		['as'=>'client.delete',					'uses'=>'ClientController@delete']);
	Route::get('/client/status/{id}',		['as'=>'client.status',					'uses'=>'ClientController@status']);
});