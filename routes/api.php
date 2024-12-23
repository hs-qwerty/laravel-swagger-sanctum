<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth/login', [\App\Http\Controllers\Auth\LoginController::class,'login'])->name('login');
Route::post('/auth/register', [\App\Http\Controllers\Auth\RegisterController::class,'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/auth/logout', [\App\Http\Controllers\Auth\LogoutController::class,'delete']);
});
Route::prefix('/category')->middleware(['auth:sanctum'])->group(function () {
    Route::get('/', [\App\Http\Controllers\CategoryController::class, 'index'])->middleware('throttle:30,1');
    Route::get('/{id}', [\App\Http\Controllers\CategoryController::class, 'show'])->where('id', '[0-9]+')->middleware('throttle:30,1');
    Route::post('/', [\App\Http\Controllers\CategoryController::class, 'store'])->middleware('throttle:30,1');
    Route::put('/{id}', [\App\Http\Controllers\CategoryController::class, 'update'])->where('id', '[0-9]+')->middleware('throttle:30,1');
    Route::delete('/{id}', [\App\Http\Controllers\CategoryController::class, 'delete'])->where('id', '[0-9]+')->middleware('throttle:30,1');
});
Route::prefix('/products')->middleware(['auth:sanctum'])->group(function () {
    Route::get('/', [\App\Http\Controllers\ProductController::class, 'index']);
    Route::get('/{id}', [\App\Http\Controllers\ProductController::class, 'show'])->where('id', '[0-9]+');
    Route::post('/', [\App\Http\Controllers\ProductController::class, 'store']);
    Route::put('/{id}', [\App\Http\Controllers\ProductController::class, 'update'])->where('id', '[0-9]+');
    Route::delete('/{id}', [\App\Http\Controllers\ProductController::class, 'delete'])->where('id', '[0-9]+');
});
Route::prefix('/blog-category')->middleware(['auth:sanctum'])->group(function () {
    Route::get('/', [\App\Http\Controllers\BlogCategoryController::class, 'index']);
    Route::get('/{id}', [\App\Http\Controllers\BlogCategoryController::class, 'show'])->where('id', '[0-9]+');
    Route::post('/', [\App\Http\Controllers\BlogCategoryController::class, 'store']);
    Route::put('/{id}', [\App\Http\Controllers\BlogCategoryController::class, 'update'])->where('id', '[0-9]+');
    Route::delete('/{id}', [\App\Http\Controllers\BlogCategoryController::class, 'delete'])->where('id', '[0-9]+');
});

Route::prefix('/blog')->middleware(['auth:sanctum','is_admin'])->group(function () {
    Route::get('/', [\App\Http\Controllers\BlogController::class, 'index']);
    Route::get('/{id}', [\App\Http\Controllers\BlogController::class, 'show'])->where('id', '[0-9]+');
    Route::post('/', [\App\Http\Controllers\BlogController::class, 'store']);
    Route::put('/{id}', [\App\Http\Controllers\BlogController::class, 'update'])->where('id', '[0-9]+');
    Route::delete('/{id}', [\App\Http\Controllers\BlogController::class, 'delete'])->where('id', '[0-9]+');
});

