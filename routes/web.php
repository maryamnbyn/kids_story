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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//admin pannel

Route::group(['as'=>'admin.','namespace' => 'Admin' ,'prefix' => 'admin','middleware'=>'admin'] ,function(){
Route::get('/dashboard' ,'AdminController@dashboard');
Route::get('/profile' ,'AdminController@profile')->name('profile');
    Route::resource('/stories', 'StoryController');
    Route::resource('/categories', 'CategoryController');
    });

Route::get('/story/pic/{filename}' ,'Admin\StoryController@downloadLink');

Route::get('/test' , 'Admin\CategoryController@test');
