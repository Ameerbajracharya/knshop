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

Route::get('/', 								['as'=> 'frontend', 			'uses'=> 'FrontendController@index']);
Route::prefix('')->group(function() {
	Route::get('category', 							['as'=> 'category', 			'uses'=> 'FrontendController@category']);
	Route::get('/help', 							['as'=> 'help', 				'uses'=> 'FrontendController@help']);
	Route::get('/productinfo/{product}', 			['as'=> 'product.info', 		'uses'=> 'FrontendController@productinfo']);
	Route::post('order/store/{product}',			['as'=>	'productinfo.store',	'uses'=> 'OrderController@store']);
	Route::get('/payment/{order}', 					['as'=> 'payment', 				'uses'=> 'OrderController@payment']);
	Route::post('/payment/store/{order}', 			['as'=> 'payment.update', 		'uses'=> 'OrderController@payment_update']);
	Route::get('/confirm/{order}', 					['as'=> 'confirm', 				'uses'=> 'OrderController@confirm']);
	Route::any('/search',							['as'=>	'frontend.search',		'uses'=> 'FrontendController@search']);
	Route::get('/pagenotfound',						['as'=> 'notfound',				'uses'=> 'FrontendController@notfound']);
});
