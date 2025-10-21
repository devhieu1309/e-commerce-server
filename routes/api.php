<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VideoReviewController;
use App\Http\Controllers\ShippingMethodController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\BannerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VariationController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// ========== Minh Hieu ===========
Route::get('categories/{category}/variations', [CategoryController::class, 'getVariationByCategory']);
Route::get('variations/search', [VariationController::class, 'searchByVariationName']);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('variations', VariationController::class);
// ========== End Minh Hieu ===========





Route::get('/products', [ProductController::class, 'index']);
Route::apiResource('shipping_methods', ShippingMethodController::class);
Route::apiResource('users', UserController::class);

// Video Review Routes
Route::get('/video-reviews', [VideoReviewController::class, 'index']);
Route::post('/video-reviews', [VideoReviewController::class, 'store']);
Route::put('/video-reviews/{id}', [VideoReviewController::class, 'update']);
Route::patch('/video-reviews/{id}', [VideoReviewController::class, 'update']);
Route::delete('/video-reviews/{id}', [VideoReviewController::class, 'destroy']);
Route::patch('/video-reviews/{id}/toggle', [VideoReviewController::class, 'toggleVisibility']);

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


