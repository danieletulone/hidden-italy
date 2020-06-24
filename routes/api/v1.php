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

// Auth: Login and Register
Route::prefix('auth')->group(function () {
    Route::post('/login', 'Auth\PassportController@login');
    Route::post('/register', 'Auth\PassportController@register');
});

Route::middleware('auth:api')->group(function() {
    
    // Auth
    Route::post('/auth/revoke', 'Auth\PassportController@revoke');

    // Categories
    Route::get('/categories', 'Api\CategoryController@index')
        ->middleware('scope:read-categories');
    
    // Comments
    Route::post('/comments', 'Api\CommentController@store')
        ->middleware('scope:create-comments');
    
    Route::delete('/comments/{comment}', 'Api\CommentController@store')
        ->middleware('scope:delete-comments');
    
    Route::patch('/comments/{comment}', 'Api\CommentController@update')
        ->middleware('scope:update-comments');
    
    // Monuments
    Route::get('/monuments', 'Api\MonumentController@index')
        ->middleware('scope:read-monuments');
    
    Route::get('/monuments/find-nearest', 'Api\MonumentController@findNearest')
        ->middleware('scope:read-monuments');

    Route::get('/monuments/{monument}', 'Api\MonumentController@show')
        ->middleware('scope:read-monuments'); 
    
    Route::post('/monuments', 'Api\MonumentController@store')
        ->middleware('scope:suggest-monuments');
    
    // Users
    Route::get('/users/joined', 'Api\UserController@joined')
        ->middleware('scope:read-users');

    Route::get('/users/monuments', 'Api\UserController@visitedMonuments');

});