<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Superadmin\UserController;
use App\Http\Controllers\API\Superadmin\SuperadminCategoryController;

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);

Route::middleware(['auth:sanctum', 'CheckRole:superadmin'])->group(function () {
    // Rute API untuk Superadmin
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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
