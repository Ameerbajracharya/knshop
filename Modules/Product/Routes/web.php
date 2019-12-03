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

Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard/product'],function() {
    // product
    Route::get('/',                         ['as'=>'product.view',      'uses'=>'ProductController@productindex']);
    Route::get('/create',                   ['as'=>'product.create',    'uses'=>'ProductController@create']);
    Route::post('/store',                   ['as'=>'product.store',     'uses'=>'ProductController@store']);
    Route::get('/status/{id}',              ['as'=>'product.status',    'uses'=>'ProductController@status'] );
    Route::get('/scheme/{product}',         ['as'=>'product.scheme',    'uses'=>'ProductController@scheme'] );
    Route::get('/edit/{id}',                ['as'=>'product.edit',      'uses'=>'ProductController@edit']);
    Route::post('/update/{id}',             ['as'=>'product.update',    'uses'=>'ProductController@update']);
    Route::get('/show/{id}',                ['as'=>'product.show',      'uses'=>'ProductController@show']);
    Route::get('/delete/{id}',              ['as'=>'product.delete',    'uses'=>'ProductController@destroy']);

//productdetail
    Route::get('/{product}/detail',                              ['as'=>'productdetail.view',        'uses'=>'DetailController@index']);
    Route::get('/{product}/detail/create',                       ['as'=>'productdetail.create',      'uses'=>'DetailController@create']);
    Route::post('/{product}/detail/store',                       ['as'=>'productdetail.store',       'uses'=>'DetailController@store']);
    Route::get('/{product}/detail/show/{productdetail}',         ['as'=>'productdetail.show',        'uses'=>'DetailController@show']);
    Route::get('/{product}/detail/edit',                         ['as'=>'productdetail.edit',        'uses'=>'DetailController@edit']);
    Route::post('/{product}/detail/update',                      ['as'=>'productdetail.update',      'uses'=>'DetailController@update']);

//brand
    Route::get('/brand',                ['as'=>'brand.view',        'uses'=>'BrandController@index']);
    Route::get('/brand/create',         ['as'=>'brand.create',      'uses'=>'BrandController@create']);
    Route::post('/brand/store',         ['as'=>'brand.store',       'uses'=>'BrandController@store']);
    Route::get('/brand/edit/{id}',      ['as'=>'brand.edit',        'uses'=>'BrandController@edit']);
    Route::post('/brand/update/{id}',   ['as'=>'brand.update',      'uses'=>'BrandController@update']);
    Route::get('/brand/delete/{id}',    ['as'=>'brand.delete',      'uses'=>'BrandController@destroy']);
    Route::get('/brand/status/{id}',    ['as'=>'brand.status',      'uses'=>'BrandController@status'] );


//productImages
    Route::get('/{product}/image',                              ['as'=>'productimage.view',        'uses'=>'ProductImageController@index']);
    Route::get('/{product}/image/create',                       ['as'=>'productimage.create',      'uses'=>'ProductImageController@create']);
    Route::post('/{product}/image/store',                       ['as'=>'productimage.store',       'uses'=>'ProductImageController@store']);
    Route::get('/{product}/image/show/{productimage}',          ['as'=>'productimage.show',        'uses'=>'ProductImageController@show']);
    Route::get('/{product}/image/edit/{productimage}',          ['as'=>'productimage.edit',        'uses'=>'ProductImageController@edit']);
    Route::post('/{product}/image/update/{productimage}',       ['as'=>'productimage.update',      'uses'=>'ProductImageController@update']);
    Route::get('/{product}/image/delete/{productimage}',        ['as'=>'productimage.delete',      'uses'=>'ProductImageController@destroy']);
    Route::get('/{product}/image/status/{productimage}',        ['as'=>'productimage.status',      'uses'=>'ProductImageController@status'] );

//category
    Route::get('/category',              ['as'=>'category.view',        'uses'=>'CategoryController@index']);
    Route::get('/category/create',       ['as'=>'category.create',      'uses'=>'CategoryController@create']);
    Route::post('/category/store',       ['as'=>'category.store',       'uses'=>'CategoryController@store']);
    Route::get('/category/edit/{id}',    ['as'=>'category.edit',        'uses'=>'CategoryController@edit']);
    Route::post('/category/update/{id}', ['as'=>'category.update',      'uses'=>'CategoryController@update']);
    Route::get('/category/delete/{id}',  ['as'=>'category.delete',      'uses'=>'CategoryController@destroy']);
    Route::get('/category/status/{id}',  ['as'=>'category.status',      'uses'=>'CategoryController@status'] );


//type
    Route::get('/type',                   ['as'=>'producttype.view',      'uses'=>'ProductTypeController@index']);
    Route::get('/type/create',            ['as'=>'producttype.create',    'uses'=>'ProductTypeController@create']);
    Route::post('/type/store',            ['as'=>'producttype.store',     'uses'=>'ProductTypeController@store']);
    Route::get('/type/edit/{id}',         ['as'=>'producttype.edit',      'uses'=>'ProductTypeController@edit']);
    Route::post('/type/update/{id}',      ['as'=>'producttype.update',    'uses'=>'ProductTypeController@update']);
    Route::get('/type/delete/{id}',       ['as'=>'producttype.delete',    'uses'=>'ProductTypeController@destroy']);
    Route::get('/type/status/{id}',       ['as'=>'producttype.status',    'uses'=>'ProductTypeController@status'] );

//Unit
    Route::get('unit',                 ['as'=>'unit.view',        'uses'=>'UnitController@index']);
    Route::get('/unit/create',         ['as'=>'unit.create',      'uses'=>'UnitController@create']);
    Route::post('/unit/store',         ['as'=>'unit.store',       'uses'=>'UnitController@store']);
    Route::get('/unit/edit/{id}',      ['as'=>'unit.edit',        'uses'=>'UnitController@edit']);
    Route::post('/unit/update/{id}',   ['as'=>'unit.update',      'uses'=>'UnitController@update']);
    Route::get('/unit/delete/{id}',    ['as'=>'unit.delete',      'uses'=>'UnitController@destroy']);
    Route::get('/unit/status/{id}',    ['as'=>'unit.status',      'uses'=>'UnitController@status'] );
//Unit
    Route::get('altunit',                 ['as'=>'altunit.view',        'uses'=>'AltunitController@index']);
    Route::get('/altunit/create',         ['as'=>'altunit.create',      'uses'=>'AltunitController@create']);
    Route::post('/altunit/store',         ['as'=>'altunit.store',       'uses'=>'AltunitController@store']);
    Route::get('/altunit/edit/{id}',      ['as'=>'altunit.edit',        'uses'=>'AltunitController@edit']);
    Route::post('/altunit/update/{id}',   ['as'=>'altunit.update',      'uses'=>'AltunitController@update']);
    Route::get('/altunit/delete/{id}',    ['as'=>'altunit.delete',      'uses'=>'AltunitController@destroy']);
    Route::get('/altunit/status/{id}',    ['as'=>'altunit.status',      'uses'=>'AltunitController@status'] );

    //Scheme
    Route::get('scheme',                 ['as'=>'scheme.view',        'uses'=>'SchemeController@index']);
    Route::get('/scheme/create',         ['as'=>'scheme.create',      'uses'=>'SchemeController@create']);
    Route::post('/scheme/store',         ['as'=>'scheme.store',       'uses'=>'SchemeController@store']);
    Route::get('/scheme/edit/{id}',      ['as'=>'scheme.edit',        'uses'=>'SchemeController@edit']);
    Route::post('/scheme/update/{id}',   ['as'=>'scheme.update',      'uses'=>'SchemeController@update']);
    Route::get('/scheme/delete/{id}',    ['as'=>'scheme.delete',      'uses'=>'SchemeController@destroy']);
    Route::get('/scheme/status/{id}',    ['as'=>'scheme.status',      'uses'=>'SchemeController@status']);

   
});

Route::fallback(['middleware' => ['auth'], 'prefix' => 'dashboard/product'], function() {
    Route::get('/',             ['as'=>'product.view',      'uses'=>'ProductController@productindex']);
});

