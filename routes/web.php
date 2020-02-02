<?php

Route::get('/', 'IndexController@index')->name('home');
Route::resource('post', 'PostController')->middleware(\App\Http\Middleware\IsEditor::class);
Route::get('users', 'UsersController@list')->middleware(\App\Http\Middleware\IsAdmin::class);
Route::put('users/edit-role', 'UsersController@editRole')->middleware(\App\Http\Middleware\IsAdmin::class);

Auth::routes();

