<?php

Route::resource('monuments', 'MonumentController');
Route::resource('categories', 'CategoryController');
Route::resource('image', 'ImageController');
Route::resource('scopes', 'ScopeController');
Route::resource('roles', 'RoleController');
Route::resource('users', 'UserController');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');