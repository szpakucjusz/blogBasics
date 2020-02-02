<?php

Route::get('/', 'IndexController@index')->name('home');
Route::resource('post', 'PostController');
Route::get('user', 'UsersController@list');

Auth::routes();

