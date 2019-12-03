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


Route::group(['middleware' => ['auth','web'],'prefix' => 'dashboard/setting'], function(){
 	Route::get('/create',			['uses'=>'SettingController@setting',		'as'=>'setting.index']);
    Route::post('/store',			['uses'=>'SettingController@store',			'as'=>'setting.store']);
    Route::post('/update/{id}',  	['uses'=>'SettingController@update'	,		'as'=>'setting.update']);
   
});