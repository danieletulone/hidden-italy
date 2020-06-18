<?php

Route::resource('monuments', 'MonumentController');

Route::resource('monumentsCategories', 'MonumentCategoryController');

Route::resource('categories', 'CategoryController');

Route::resource('image', 'ImageController');

Route::resource('comments', 'CommentController');

Route::resource('scopes', 'ScopeController');
Route::resource('roles', 'RoleController');
Route::resource('users', 'UserController');