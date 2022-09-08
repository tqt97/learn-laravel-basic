<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;



Route::get('dashboard', DashboardController::class,)->name('dashboard');

Route::get('categories/{id}/restore', [CategoryController::class, 'restore'])->name('categories.get.restore');
Route::post('categories/{id}/restore', [CategoryController::class, 'restore'])->name('categories.post.restore');
Route::post('categories/{id}/force_delete', [CategoryController::class, 'forceDelete'])->name('categories.force_delete');

Route::resource('categories', CategoryController::class);


require __DIR__ . '/auth.php';
