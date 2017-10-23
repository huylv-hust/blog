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

//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/login', 'LoginController@index')->name('login');
    Route::post('/login', 'LoginController@postLogin');
    Route::get('/register', 'RegisterController@index')->name('register');
    Route::post('/register', 'RegisterController@create');
    Route::get('/password/reset', 'ResetPasswordController@index')->name('password.reset');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});
