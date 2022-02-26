<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PhotographerConnectionController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/photographer', [PhotographerConnectionController::class, 'index']);
Route::get('/photographer/{id}', [PhotographerConnectionController::class, 'show']);

//Route::get('/photographer/{photographer}', [PhotographerConnectionController::class, 'show']);
