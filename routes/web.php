<?php

Route::resource('/', 'IndexController');
Route::resource('post', 'PostController');
Route::get('user', 'UsersController@list');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
