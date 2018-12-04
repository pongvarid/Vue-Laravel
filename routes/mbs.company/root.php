<?php

Route::resource('/mbs/root/permission', Root\User\PermissionController::class);
Route::get('user/all', 'UserController@user');
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@authenticate');
Route::get('open', 'DataController@open');

Route::post('register', 'UserController@register');
Route::post('update', 'UserController@update');
Route::post('delete', 'UserController@delete');

Route::resource('xxxxx', 'UserController');