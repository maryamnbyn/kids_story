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
//
//
//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

//login and register route

Route::group(['namespace' => 'API\V1', 'prefix' => 'v1'], function () {

    Route::post('/register', 'UserController@register');
    Route::post('/login', 'UserController@login');
    Route::post('/register/verify', 'UserController@verificationRegister');
    Route::get('download/{filename}', 'StoryController@Downloadlink');

    //story
    Route::get('/stories/search', 'StoryController@search');


});



Route::group(['namespace' => 'API\V1', 'prefix' => 'v1' ,'middleware' => 'auth:api'], function () {

    //User Route token

    Route::post('/user/edit', 'UserController@update');
    Route::post('/user/info', 'UserController@info');
    Route::post('/update/verify', 'UserController@verificationUpdate');
    Route::post('/logout', 'UserController@logout');
    Route::post('/user/name', 'UserController@setUserName');
    Route::post('/user/suggestion', 'UserController@suggestion');



    //story Route token

    Route::get('/stories/{story}', 'StoryController@show');
//    Route::get('/stories/search', 'StoryController@search');
    Route::post('/stories', 'StoryController@store');
    Route::get('/stories', 'StoryController@index');
    Route::post('/stories/update/{story}', 'StoryController@update');
    Route::post('/stories/destroy/{story}', 'StoryController@destroy');
});
