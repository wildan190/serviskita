<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\SuperadminController;
use App\Http\Controllers\SuperAdmin\SuperadminCategoryController;
use App\Http\Controllers\Admin\ProductServicesController;
use App\Http\Controllers\UserDetailsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('home');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::prefix('superadmin')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'CheckRole:superadmin'])->group(function () {
    // Route::get('/dashboard', [SuperadminController::class, 'index'])->name('superadmin.dashboard');
    Route::get('/users', [SuperadminController::class, 'index'])->name('superadmin.users.index');
    Route::get('/users/search', [SuperadminController::class, 'search'])->name('superadmin.users.search');
    Route::get('/users/{user}/edit', [SuperadminController::class, 'edit'])->name('superadmin.users.edit');
    Route::put('/users/{user}', [SuperadminController::class, 'update'])->name('superadmin.users.update');

    Route::get('categories', [SuperadminCategoryController::class, 'index'])->name('superadmin.categories.index');
    Route::post('categories', [SuperadminCategoryController::class, 'store'])->name('superadmin.categories.store');
    Route::get('categories/{id}', [SuperadminCategoryController::class, 'show'])->name('superadmin.categories.show');
    Route::put('categories/{id}', [SuperadminCategoryController::class, 'update'])->name('superadmin.categories.update');
    Route::delete('categories/{id}', [SuperadminCategoryController::class, 'destroy'])->name('superadmin.categories.destroy');
});

Route::middleware(['auth:sanctum', 'CheckRole:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('product-services', [ProductServicesController::class, 'index'])->name('admin.product_services.index');
        Route::get('product-services/create', [ProductServicesController::class, 'create'])->name('admin.product_services.create');
        Route::post('product-services', [ProductServicesController::class, 'store'])->name('admin.product_services.store');
        Route::get('product-services/{id}', [ProductServicesController::class, 'show'])->name('admin.product_services.show');
        Route::put('product-services/{id}', [ProductServicesController::class, 'update'])->name('admin.product_services.edit');
        Route::delete('product-services/{id}', [ProductServicesController::class, 'destroy'])->name('admin.product_services.destroy');
    });
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user-details', [UserDetailsController::class, 'index'])->name('user_details.index');
    Route::get('/user-details/create', [UserDetailsController::class, 'create'])->name('user_details.create');
    Route::get('/user-details/{id}', [UserDetailsController::class, 'show'])->name('user_details.show');
    Route::post('/user-details', [UserDetailsController::class, 'store'])->name('user_details.store');
    Route::put('/user-details/{id}', [UserDetailsController::class, 'update'])->name('user_details.update');
    Route::delete('/user-details/{id}', [UserDetailsController::class, 'destroy'])->name('user_details.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

});
