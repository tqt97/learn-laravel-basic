<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GenerateSlugController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::resource('categories', CategoryController::class)->middleware(['auth']);

require __DIR__ . '/auth.php';

Route::get('generate_slug/category', [GenerateSlugController::class, 'category'])->name('generate_slug.category');
