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
/*
 * Route Post
 */
Route::get('post/create', 'PostController@getCreate')->name('post.create');
Route::post('post/create', 'PostController@postCreate');
Route::get('post/edit/{id}', 'PostController@getEdit')->name('post.edit');
Route::post('post/edit/{id}', 'PostController@postEdit');
Route::get('post/list', 'PostController@getList')->name('post.list');
Route::post('post/delete', 'PostController@postDelete')->name('post.delete');
