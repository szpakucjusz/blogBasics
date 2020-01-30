<?php

Route::resource('/', 'IndexController');
Route::resource('post', 'PostController');

Auth::routes();



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
