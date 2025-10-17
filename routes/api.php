<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\BannerController;
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

//phương thanh toán
Route::get('/order-status/search', [OrderStatusController::class, 'search']);
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
