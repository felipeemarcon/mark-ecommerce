<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('products')->group(function () {
    Route::get('', [ProductController::class, 'index'])->name('product.home');
    Route::get('/{product:slug}', [ProductController::class, 'show'])->name('product.show');
});

Route::prefix('admin')->group(function () {
    Route::get('', [AdminController::class, 'index'])->name('admin.home');

    Route::prefix('products')->group(function () {
        Route::get('', [AdminProductController::class, 'index'])->name('admin.products.home');
        Route::get('create', [AdminProductController::class, 'create'])->name('admin.product.create');
        Route::post('', [AdminProductController::class, 'store'])->name('admin.product.create');
        Route::get('{product}/edit', [AdminProductController::class, 'edit'])->name('admin.product.edit');
        Route::put('', [AdminProductController::class, 'update'])->name('admin.product.edit');
    });
});
