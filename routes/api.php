<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VideoReviewController;
use App\Http\Controllers\ShippingMethodController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\NewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::apiResource('users', UserController::class);

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

// =============== Categories ROUTES ===============
// Route::get('/categories', [CategoryController::class, 'index']);
// Route::post('/categories', [CategoryController::class, 'store']);
// Route::patch('/categories/{id}', [CategoryController::class, 'update']);
// Route::get('/categories/{id}', [CategoryController::class, 'show']);
// Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);
// Route::apiResource('categories', CategoryController::class);

// =============== USER LIST ROUTES ===============
// Route::get('/users', [UserController::class, 'index']);        
// Route::post('/users', [UserController::class, 'store']);       
// Route::get('/users/{id}', [UserList_Controller::class, 'show']);    
// Route::patch('/users/{id}', [UserList_Controller::class, 'update']); 
// Route::delete('/users/{id}', [UserList_Controller::class, 'destroy']); 

//tin tuc
Route::get('news/search', [NewsController::class, 'search']);
Route::get('/news', [NewsController::class, 'index']);
Route::post('/news', [NewsController::class, 'store']);
Route::patch('/news/{id}', [NewsController::class, 'update']);
Route::get('/news/{id}', [NewsController::class, 'show']);
Route::delete('/news/{id}', [NewsController::class, 'destroy']);
