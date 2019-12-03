<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/dashboard', function (Request $request) {
    return $request->user();
});
