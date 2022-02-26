<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PhotographerContoller;

use App\Http\Controllers\ImageController;

use App\Http\Controllers\ImageConnectionController;

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



Route::get('/anasayfa', [PhotographerContoller::class, 'index'])->middleware('auth');


Route::prefix('photographer')->name('photographer.')->group(function() {

    Route::middleware(['auth'])->group(function () {

        Route::get('list', [PhotographerContoller::class, 'show']);
        Route::get('create', [PhotographerContoller::class, 'create'])->name('create');
        Route::post('store', [PhotographerContoller::class, 'store'])->name('store');
        Route::get('edit/{id}', [PhotographerContoller::class, 'edit'])->name('edit');
        Route::get('gallery/{id}', [PhotographerContoller::class, 'gallery'])->name('gallery');
        Route::put('update/{id}', [PhotographerContoller::class, 'update'])->name('update');
        Route::delete('destroy/{id}', [PhotographerContoller::class, 'destroy'])->name('destroy');

    });

});


Route::prefix('image')->name('image.')->group(function() {

    Route::middleware(['auth'])->group(function () {
        Route::get('index', [ImageController::class, 'index'])->name('index');
        Route::get('create', [ImageController::class, 'create'])->name('create');
        Route::get('pexels', [ImageController::class, 'pexels'])->name('pexels');

    });

});




Route::post('/imageconnection/index', [ImageConnectionController::class, 'index'])->name('imageconnection.index');
Route::post('/imageconnection/pexels', [ImageConnectionController::class, 'pexels'])->name('imageconnection.pexels');
