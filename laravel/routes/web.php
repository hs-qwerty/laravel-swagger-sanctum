<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ProductContoller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;

use App\Models\Customer;

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



Route::post('/save', [AuthController::class, 'save'])->name('save');
Route::post('/check', [AuthController::class, 'check'])->name('check');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



Route::group(['middleware' => ['AuthMid']], function (){
    Route::get('/admin', [CustomerController::class, 'index'])->name('admin');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/customer', [CustomerController::class, 'profile'])->name('customer');

    Route::put('/customerUpdate', [CustomerController::class, 'store'])->name('customerUpdate');


});



/*

Route::get('/register', [AuthController::class, 'req']);

Route::post('/req', [AuthController::class, 'register'])->name('req');

Route::get('/login', [AuthController::class, 'login']);

Route::post('/log', [AuthController::class, 'log'])->name('log');

*/
