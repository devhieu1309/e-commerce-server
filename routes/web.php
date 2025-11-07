<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleSocialiteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/google', [GoogleSocialiteController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleSocialiteController::class, 'handleCallback'])->name('google.callback');
