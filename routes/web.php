<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
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

//Route::get('/', function () {
//    return view('index');
//});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => config('catalog.folder')], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('catalog');
    Route::get('/{category}', [CategoryController::class, 'get'])->name('catalog.section');
    Route::get('/{category}/{product}', [ProductController::class, 'get'])->name('catalog.product');
});

Route::group(['prefix' => config('catalog.orders')], function () {
    Route::get('/', [OrderController::class, 'index'])->middleware('auth')->name('orders');
    Route::get('/{order}', [OrderController::class, 'get'])->middleware('auth')->name('order');
    Route::post('/{product}', [OrderController::class, 'make'])->middleware('auth')->name('makeorder');
});

Route::get(config('catalog.cart') . '/{product}', [OrderController::class, 'cart'])->middleware('auth')->name('cart');


Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
