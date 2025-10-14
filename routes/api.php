<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ShippingMethodController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::patch('/categories/{id}', [CategoryController::class, 'update']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

Route::get('/shipping_methods', [ShippingMethodController::class, 'index']);
Route::post('/shipping_methods', [ShippingMethodController::class, 'store']);
Route::patch('/shipping_methods/{id}', [ShippingMethodController::class, 'update']);
Route::get('/shipping_methods/{id}', [ShippingMethodController::class, 'show']);
Route::delete('/shipping_methods/{id}', [ShippingMethodController::class, 'destroy']);
