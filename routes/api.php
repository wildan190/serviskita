<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Superadmin\UserController;
use App\Http\Controllers\API\Superadmin\SuperadminCategoryController;
use App\Http\Controllers\API\Admin\ProductServicesController;
use App\Http\Controllers\API\UserDetailsController;

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);

Route::middleware(['auth:sanctum', 'CheckRole:superadmin'])->group(function () {
    Route::prefix('superadmin')->group(function () {
        Route::get('/users', [UserController::class, 'index']);
        Route::get('/users/{user}', [UserController::class, 'show']);
        Route::put('/users/{user}', [UserController::class, 'update']);
        Route::delete('/users/{user}', [UserController::class, 'destroy']);
        Route::get('/users/search', [UserController::class, 'search']);

        Route::get('categories', [SuperadminCategoryController::class, 'index']);
        Route::post('categories', [SuperadminCategoryController::class, 'store']);
        Route::get('categories/{id}', [SuperadminCategoryController::class, 'show']);
        Route::put('categories/{id}', [SuperadminCategoryController::class, 'update']);
        Route::delete('categories/{id}', [SuperadminCategoryController::class, 'destroy']);
    });
});

Route::middleware(['auth:sanctum', 'CheckRole:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('product-services', [ProductServicesController::class, 'index']);
        Route::post('product-services', [ProductServicesController::class, 'store']);
        Route::get('product-services/{id}', [ProductServicesController::class, 'show']);
        Route::put('product-services/{id}', [ProductServicesController::class, 'update']);
        Route::delete('product-services/{id}', [ProductServicesController::class, 'destroy']);
    });
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user-details', [UserDetailsController::class, 'index']);
    Route::get('/user-details/{id}', [UserDetailsController::class, 'show']);
    Route::post('/user-details', [UserDetailsController::class, 'store']);
    Route::put('/user-details/{id}', [UserDetailsController::class, 'update']);
    Route::delete('/user-details/{id}', [UserDetailsController::class, 'destroy']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
