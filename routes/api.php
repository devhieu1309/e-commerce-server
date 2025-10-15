<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VideoReviewController;
use App\Http\Controllers\ShippingMethodController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/products', [ProductController::class, 'index']);

// Video Review Routes
Route::get('/video-reviews', [VideoReviewController::class, 'index']);
Route::post('/video-reviews', [VideoReviewController::class, 'store']);
Route::put('/video-reviews/{id}', [VideoReviewController::class, 'update']);
Route::patch('/video-reviews/{id}', [VideoReviewController::class, 'update']);
Route::delete('/video-reviews/{id}', [VideoReviewController::class, 'destroy']);
Route::patch('/video-reviews/{id}/toggle', [VideoReviewController::class, 'toggleVisibility']);

Route::apiResource('shipping_methods', ShippingMethodController::class);
Route::apiResource('categories', CategoryController::class);

