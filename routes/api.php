<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ShippingMethodController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\BannerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('shipping_methods', ShippingMethodController::class);
Route::apiResource('categories', CategoryController::class);


//phương thanh toán
Route::get('/order-status', [OrderStatusController::class, 'index']);
Route::post('/order-status', [OrderStatusController::class, 'store']);
Route::patch('/order-status/{id}', [OrderStatusController::class, 'update']);
Route::get('/order-status/{id}', [OrderStatusController::class, 'show']);
Route::delete('/order-status/{id}', [OrderStatusController::class, 'destroy']);


//Banner
Route::get('/banner', [BannerController::class, 'index']);
Route::post('/banner', [BannerController::class, 'store']);
Route::patch('/banner/{id}', [BannerController::class, 'update']);
Route::get('/banner/{id}', [BannerController::class, 'show']);
Route::delete('/banner/{id}', [BannerController::class, 'destroy']);
