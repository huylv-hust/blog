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
// Authentication Routes...
//$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
//$this->post('login', 'Auth\LoginController@login');
//$this->post('logout', 'Auth\LoginController@logout')->name('logout');
//
// Registration Routes...
//$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//$this->post('register', 'Auth\RegisterController@register');
//
// Password Reset Routes...
//$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
//$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
//$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
//$this->post('password/reset', 'Auth\ResetPasswordController@reset');
//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    //route login
    Route::get('/login', 'LoginController@index')->name('login');
    Route::post('/login', 'LoginController@postLogin');
    //route logout
    Route::post('/logout', 'LoginController@postLogout')->name('logout');
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
});
