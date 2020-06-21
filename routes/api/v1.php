<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->group(function () {
    Route::post('/login', 'Auth\PassportController@login');
    Route::post('/register', 'Auth\PassportController@register');
});

Route::get('monuments/find-nearest', 'Api\MonumentController@findNearest');

Route::resource('monuments', 'Api\MonumentController');

Route::resource('categories', 'Api\CategoryController');

Route::get('/users/joined', 'Api\UserController@joined');

Route::resource('comments', 'Api\CommentController');

Route::resource('comments', 'Api\CommentController');
