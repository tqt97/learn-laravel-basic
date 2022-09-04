<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;



Route::get('dashboard', DashboardController::class,)->name('dashboard');

Route::resource('categories', CategoryController::class);


require __DIR__ . '/auth.php';