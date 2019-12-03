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

Route::group(['middleware' => ['auth','web'],'prefix' => 'dashboard/slider'], function(){
    Route::get('/', ['as' => 'viewslider','uses'=>'SliderController@view']);
    // route for store
    Route::get('/create', ['as' => 'createslider','uses'=>'SliderController@create']);
    Route::post('/add', ['as' => 'addslider','uses'=>'SliderController@store']);

    // route for edit and update
    Route::get('/edit/{id}', ['as' => 'editslider','uses'=>'SliderController@edit']);
    Route::post('/update/{id}', ['as' => 'updateslider','uses'=>'SliderController@update']);

    //
    Route::get('/delete/{id}', ['as' => 'deleteslider','uses'=>'SliderController@destroy']);
    Route::get('/status/{id}',  ['as' => 'sliderstatus', 'uses' => 'SliderController@status'] );


});
