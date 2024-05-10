<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\SuperadminController;
use App\Http\Controllers\SuperAdmin\SuperadminCategoryController;

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
    Route::get('/users', [SuperadminController::class, 'index'])->name('superadmin.users.index'); // Daftar pengguna
    Route::get('/users/search', [SuperadminController::class, 'search'])->name('superadmin.users.search'); // Pencarian pengguna
    Route::get('/users/{user}/edit', [SuperadminController::class, 'edit'])->name('superadmin.users.edit'); // Form edit pengguna
    Route::put('/users/{user}', [SuperadminController::class, 'update'])->name('superadmin.users.update'); // Proses update pengguna

    Route::get('categories', [SuperadminCategoryController::class, 'index'])->name('superadmin.categories.index');
    Route::post('categories', [SuperadminCategoryController::class, 'store'])->name('superadmin.categories.store');
    Route::get('categories/{id}', [SuperadminCategoryController::class, 'show'])->name('superadmin.categories.show');
    Route::put('categories/{id}', [SuperadminCategoryController::class, 'update'])->name('superadmin.categories.update');
    Route::delete('categories/{id}', [SuperadminCategoryController::class, 'destroy'])->name('superadmin.categories.destroy');

    

});
