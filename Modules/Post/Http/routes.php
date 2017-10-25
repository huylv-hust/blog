<?php

Route::group(['middleware' => ['web', 'check_login'], 'prefix' => 'admin/post', 'namespace' => 'Modules\Post\Http\Controllers'], function () {
    Route::group(['middleware' => 'check_role'], function () {
        Route::get('/create', 'PostController@getCreate')->name('post.create');
        Route::post('/create', 'PostController@postCreate');
    });
    Route::get('/edit/{id}', 'PostController@getEdit')->name('post.edit');
    Route::post('/edit/{id}', 'PostController@postEdit');
    Route::get('/list', 'PostController@getList')->name('post.list');
    Route::post('/delete', 'PostController@postDelete')->name('post.delete');
});
