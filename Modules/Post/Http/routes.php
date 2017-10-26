<?php

Route::group(['middleware' => ['web', 'check_login'], 'prefix' => 'admin/post', 'namespace' => 'Modules\Post\Http\Controllers'], function () {
    Route::get('/list', 'PostController@index')->name('post.list');
    Route::get('/create', 'PostController@create')->name('post.create');
    Route::post('/create', 'PostController@store');
    Route::get('/edit/{id}', 'PostController@edit')->name('post.edit');
    Route::post('/edit/{id}', 'PostController@update');
    Route::post('/delete', 'PostController@destroy')->name('post.delete');
});
