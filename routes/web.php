<?php

use App\Http\Controllers\Auth\FacebookSocialiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleSocialiteController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(FacebookSocialiteController::class)->group(function(){
    Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('auth/facebook/callback', 'handleFacebookCallback');
});
Route::get('/auth/google', [GoogleSocialiteController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleSocialiteController::class, 'handleCallback'])->name('google.callback');
