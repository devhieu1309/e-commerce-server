<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ShippingMethodController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('shipping_methods', ShippingMethodController::class);
Route::apiResource('categories', CategoryController::class);
