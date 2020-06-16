<?php

Route::get('/user', 'UserController@index')->name('user');

Route::get('/role', 'RoleController@index')->name('role');

Route::resource('monuments', 'MonumentController');

Route::resource('monumentsCategories', 'MonumentCategoryController');

Route::resource('categories', 'CategoryController');

Route::resource('image', 'ImageController');

Route::resource('comments', 'CommentController');