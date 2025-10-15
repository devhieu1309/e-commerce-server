<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VideoReviewController;
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

Route::get('/products', [ProductController::class, 'index']);

// Video Review Routes
Route::get('/video-reviews', [VideoReviewController::class, 'index']);
Route::post('/video-reviews', [VideoReviewController::class, 'store']);
Route::put('/video-reviews/{id}', [VideoReviewController::class, 'update']);
Route::patch('/video-reviews/{id}', [VideoReviewController::class, 'update']);
Route::delete('/video-reviews/{id}', [VideoReviewController::class, 'destroy']);
Route::patch('/video-reviews/{id}/toggle', [VideoReviewController::class, 'toggleVisibility']);