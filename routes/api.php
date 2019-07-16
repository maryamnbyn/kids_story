<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//login and register route

Route::group(['namespace' => 'API\V1', 'prefix' => 'v1'], function () {

    Route::post('/register/verify', 'UserController@verificationRegister');
    Route::post('/register', 'UserController@register');
    Route::post('/login', 'UserController@login');

});