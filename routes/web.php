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

Route::get('/home','HomeController@main');
Auth::routes(['register' => false]);

//Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('client')->group(function() {
	Route::post('/login', 								['as'=>'client.login.request', 			'uses'=>'Client\LoginController@clientLogin']);
	Route::post('/password/email', 						['as'=>'client.password.email', 		'uses'=>'Client\ForgotPasswordController@clientsendResetLinkEmail']);
	Route::get('/password/reset', 						['as'=>'client.password.request',		'uses'=>'Client\ForgotPasswordController@clientshowLinkRequestForm']);
	Route::post('password/reset', 						['as'=>'client.password.update', 		'uses'=>'Client\ResetPasswordController@reset']);
	Route::get('/password/reset/{token}',				['as'=>'client.password.reset',			'uses'=>'Client\ResetPasswordController@showResetForm']);
	Route::post('/register',							['as'=>'client.register.store',			'uses'=>'Client\RegisterController@clientRegister']);
	Route::get('/logout',								['as'=>'client.logout',					'uses'=>'Client\LoginController@clientLogout'])->middleware('auth:client');
	Route::get('/verifyEmail/{email}/{verifyToken}',	['as'=>'verifyemail',					'uses'=>'Client\RegisterController@sendEmailDone']);
	Route::get('login/{service}', 						['as'=>'service.login',					'uses'=>'Client\LoginController@redirectToProvider']);
	Route::get('login/{service}/callback', 				['as'=>'service',    					'uses'=>'Client\LoginController@handleProviderCallback']);

});
