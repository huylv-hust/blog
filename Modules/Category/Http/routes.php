<?php

Route::group(['middleware' => 'web', 'prefix' => 'admin/category', 'namespace' => 'Modules\Category\Http\Controllers'], function () {
    Route::get('/list', 'CategoryController@index')->name('category.list');
    Route::get('/create', 'CategoryController@create')->name('category.create');
    Route::post('/create', 'CategoryController@store');
    Route::get('/edit/{id}', 'CategoryController@edit')->name('category.edit');
    Route::post('/edit/{id}', 'CategoryController@update');
    Route::post('/delete', 'CategoryController@destroy')->name('category.delete');
    Route::post('/status', 'CategoryController@status')->name('category.status');
});
