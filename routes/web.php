<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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

// Home
Route::get('/', [HomeController::class, "index"])->name('home');


// Product
Route::prefix('/product')->group(function (){
    Route::get('/', [ProductController::class, "index"])->name('product');
    Route::post('/store', [ProductController::class, "store"])->name('product.store');
    Route::get('/edit', [ProductController::class, "edit"])->name('product.edit');
    Route::post('/{item_id}/update', [ProductController::class, "update"])->name('product.update');
    Route::get('/{item_id}/delete', [ProductController::class, "delete"])->name('product.delete');
    Route::get('/{item_id}/done', [ProductController::class, "done"])->name('product.done');

});

// Banner
Route::prefix('/banner')->group(function (){
    Route::get('/', [BannerController::class, "index"])->name('banner');
    Route::post('/store', [BannerController::class, "store"])->name('banner.store');
    Route::get('/{banner_id}/delete', [BannerController::class, "delete"])->name('banner.delete');
    Route::get('/{banner_id}/status', [BannerController::class, "status"])->name('banner.status');

});

