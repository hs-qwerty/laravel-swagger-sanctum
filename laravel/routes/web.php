<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ProductContoller;


use App\Http\Controllers\AuthController;

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

Route::get('/', [ProductContoller::class, 'index']);




Route::get('/register', [AuthController::class, 'req']);

Route::post('/req', [AuthController::class, 'register'])->name('req');

Route::get('/login', [AuthController::class, 'login']);

Route::post('/log', [AuthController::class, 'log'])->name('log');
