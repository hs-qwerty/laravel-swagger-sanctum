<?php

use App\Http\Controllers\api\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/*
 * Swagger section
 */
Route::get('/index', [HomeController::class, 'index']);
Route::post('/store', [HomeController::class, 'store']);
Route::get('/get/{id}', [HomeController::class, 'get']);
Route::put('/update/{id}', [HomeController::class, 'update']);
Route::delete('/delete/{id}', [HomeController::class, 'delete']);


/*
 * login - register section
 */

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login'])->name('login');



/*
 * Sanctum section
 */
Route::group(['middleware' => 'auth:sanctum'], function (){
    Route::post('/logout', [UserController::class, 'logout']);
    Route::post('/product', [ProductController::class, 'index']);
    Route::get( '/product/get/{id}', [ProductController::class, 'get']);
    Route::post('/product/store', [ProductController::class, 'store']);
    Route::put('/product/update/{id}', [ProductController::class, 'update']);
    Route::delete('/product/delete/{id}', [ProductController::class, 'delete']);
});
