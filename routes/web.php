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


Route::group(['prefix'=>'/auth'], function() {
    Route::get('/login', 'AuthController@login');
    Route::get('/register', 'AuthController@Register');
    Route::post('/register/action', 'AuthController@RegisterAction');
    Route::get('/verify/{user_id}/{user_name}', 'AuthController@verify');
    Route::post('/login/action', 'AuthController@LoginAction');
    Route::get('/logout', 'AuthController@LogoutAction');
});

Route::group(['prefix'=>'/product', 'middleware' => 'auth_middleware'], function() {
    Route::get('/', 'ProductController@index');
    Route::get('/create', 'ProductController@create');
    Route::post('/store', 'ProductController@store');
    Route::get('/edit/{id}', 'ProductController@edit');
    Route::post('/update/{id}', 'ProductController@update');
    Route::delete('/destroy/{id}', 'ProductController@destroy');
});