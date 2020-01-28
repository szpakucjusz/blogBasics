<?php

Route::resource('/', 'IndexController');
Route::resource('post', 'PostController');

Auth::routes();


