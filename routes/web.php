<?php

use App\Http\Controllers\GenerateSlugController;
use App\Http\Controllers\UploadImageController;
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

Route::post('upload', [UploadImageController::class, 'store']);

require __DIR__ . '/auth.php';

Route::get('generate_slug/category', [GenerateSlugController::class, 'category'])->name('generate_slug.category');
