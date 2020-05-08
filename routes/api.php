<?php

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('/login', 'Auth\PassportController@login');
    Route::post('/register', 'Auth\PassportController@registrer');
});