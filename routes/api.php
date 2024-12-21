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


Route::post('/auth/login', [\App\Http\Controllers\Auth\LoginController::class,'login']);
Route::post('/auth/register', [\App\Http\Controllers\Auth\RegisterController::class,'store']);


Route::get('/category', [\App\Http\Controllers\CategoryController::class, 'index']);
Route::get('/category/{id}', [\App\Http\Controllers\CategoryController::class, 'show'])->where('id', '[0-9]+');
Route::post('/category', [\App\Http\Controllers\CategoryController::class, 'store']);
Route::put('/category/{id}', [\App\Http\Controllers\CategoryController::class, 'update'])->where('id', '[0-9]+');
Route::delete('/category/{id}', [\App\Http\Controllers\CategoryController::class, 'delete'])->where('id', '[0-9]+');

Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index']);
Route::get('/products/{id}', [\App\Http\Controllers\ProductController::class, 'show'])->where('id', '[0-9]+');
Route::post('/products', [\App\Http\Controllers\ProductController::class, 'store']);
Route::put('/products/{id}', [\App\Http\Controllers\ProductController::class, 'update'])->where('id', '[0-9]+');
Route::delete('/products/{id}', [\App\Http\Controllers\ProductController::class, 'delete'])->where('id', '[0-9]+');
