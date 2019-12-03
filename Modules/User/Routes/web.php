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

////Route::prefix('user')->group(function() {
//	Route::get('/', 'UserController@index');
//});

Route::group(['prefix'=>'dashboard','middleware' => ['auth']], function(){
	//users
	Route::prefix('user')->group(function() {
		Route::get('/', 			['uses' => 'UserController@index' , 	'as' => 'users.index']);
		Route::get('/create', 		['uses' => 'UserController@create' , 	'as' => 'users.create']);
		Route::post('/store', 		['uses' => 'UserController@store' , 	'as' => 'users.store']);
		Route::get('/edit/{id}', 	['uses' => 'UserController@edit' , 		'as' => 'users.edit']);
		Route::post('/update/{id}', ['uses' => 'UserController@update' , 	'as' => 'users.update']);
		Route::get('/show/{id}', 	['uses' => 'UserController@show' , 		'as' => 'users.show']);
		Route::get('/delete/{id}', 	['uses' => 'UserController@destroy' , 	'as' => 'users.delete']);
	});

	//role
	Route::prefix('role')->group(function() {
		Route::get('/', 			 ['uses' => 'RoleController@index' , 	'as' => 'roles.index']);
		Route::get('/create',		 ['uses' => 'RoleController@create' ,	'as' => 'roles.create']);
		Route::post('/store',		 ['uses' => 'RoleController@store' , 	'as' => 'roles.store']);
		Route::get('/edit/{id}',	 ['uses' => 'RoleController@edit' ,	    'as' => 'roles.edit']);
		Route::get('/show/{id}',	 ['uses' => 'RoleController@show' ,	    'as' => 'roles.show']);
		Route::post('/update/{id}',	 ['uses' => 'RoleController@update' , 	'as' => 'roles.update']);
		Route::get('/delete/{id}',	 ['uses' => 'RoleController@destroy' ,	'as' => 'roles.delete']);
	});

	//permission
		Route::prefix('permission')->group(function() {
		Route::get('/', 			['uses' => 'PermissionController@index' , 	'as' => 'permission.index']);
		Route::get('/create',		['uses' => 'PermissionController@create' ,	'as' => 'permission.create']);
		Route::post('/store', 		['uses' => 'PermissionController@store' , 	'as' => 'permission.store']);
		Route::get('/edit/{id}', 	['uses' => 'PermissionController@edit' , 	'as' => 'permission.edit']);
		Route::get('/show/{id}', 	['uses' => 'PermissionController@show' , 	'as' => 'permission.show']);
		Route::post('/update/{id}', ['uses' => 'PermissionController@update' , 	'as' => 'permission.update']);
		Route::get('/delete/{id}', 	['uses' => 'PermissionController@destroy' , 'as' => 'permission.delete']);
	});
	
});
