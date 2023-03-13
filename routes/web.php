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
    Route::get('/{id}', [ProductController::class, 'show'])->name('product.show');
});

Route::prefix('admin')->group(function () {
    Route::get('', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/products', [AdminProductController::class, 'index'])->name('admin.products.home');
    Route::get('/products/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
});
