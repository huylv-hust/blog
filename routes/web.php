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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    //route login
    Route::get('/login', 'LoginController@index')->name('login');
    Route::post('/login', 'LoginController@postLogin');
    //route logout
    Route::get('/logout', 'LoginController@postLogout')->name('logout');
    //route register
    Route::get('/register', 'RegisterController@index')->name('register');
    Route::post('/register', 'RegisterController@create');
    //route password
    Route::get('/password/forgot', 'ForgotPasswordController@index')->name('password.forgot');
    Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset/{token}', 'ResetPasswordController@index')->name('password.reset');
    Route::post('/password/reset', 'ResetPasswordController@postReset')->name('reset');
    //route dashboard
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    //route media
    Route::get('/media', 'MediaController@index')->name('media');
    Route::post('/media', 'MediaController@postMedia');
    Route::post('/media/delete', 'MediaController@deleteMedia');
    //route permission
    Route::get('/permission', function () {
        return view('permission');
    })->name('permission');
});
