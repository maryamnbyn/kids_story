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
//login and register route

Route::group(['namespace' => 'API\V1', 'prefix' => 'v1'], function () {

    Route::post('/register', 'UserController@register');
    Route::post('/login', 'UserController@login');
    Route::post('/register/verify', 'UserController@verificationRegister');
//    Route::get('download/{filename}', 'StoryController@Downloadlink');

    //story
    Route::get('/stories/search', 'StoryController@search');

});

Route::group(['namespace' => 'API\V1', 'prefix' => 'v1' ,'middleware' => 'auth:api'], function () {

    //User Route token

    Route::post('/user/edit', 'UserController@update');
    Route::post('/user/info', 'UserController@info');
    Route::post('/update/verify', 'UserController@verificationUpdate');
    Route::post('/logout', 'UserController@logout');
    Route::post('/user/name', 'UserController@setInfo');
    Route::post('/user/suggestion', 'UserController@suggestion');

    //story Route token

    Route::get('/stories/{story}', 'StoryController@show');
//    Route::get('/stories/search', 'StoryController@search');

    Route::get('/stories', 'StoryController@index');

    Route::post('/favorite/stories', 'StoryController@setFavorite');
    Route::get('/favorites/stories', 'StoryController@getFavorite');

    Route::post('/download/stories', 'StoryController@setDownload');
    Route::get('/downloads/stories', 'StoryController@getDownload');

    Route::post('/history/stories', 'StoryController@setHistory');
    Route::get('/histories/stories', 'StoryController@getHistory');

    //story Route category
    Route::get('/categories', 'CategoryController@index');
    Route::get('/category', 'CategoryController@categoryStory');

    //story Route comments
    Route::post('/comments', 'CommentController@index');
    Route::post('comment/create', 'CommentController@store');

});
