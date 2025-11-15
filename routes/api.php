<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// =============== Categories ROUTES ===============
Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::patch('/categories/{id}', [CategoryController::class, 'update']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);


// =============== USER LIST ROUTES ===============
// Route::get('/users', [UserController::class, 'index']);        
// Route::post('/users', [UserController::class, 'store']);       
// Route::get('/users/{id}', [UserList_Controller::class, 'show']);    
// Route::patch('/users/{id}', [UserList_Controller::class, 'update']); 
// Route::delete('/users/{id}', [UserList_Controller::class, 'destroy']); 
Route::get('/users/search', [UserController::class, 'search']);
Route::apiResource('users', UserController::class);


