<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCategoryController;
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
    Route::get('/categories', [ProductCategoryController::class, 'index'])->name('products.categories');
    Route::get('/categories/{category}', [ProductCategoryController::class, 'show'])->name('product.category');
    Route::get('/{product:slug}', [ProductController::class, 'show'])->name('product.show');
});

Route::prefix('admin')->group(function () {
    Route::get('', [AdminController::class, 'index'])->name('admin.home');
});

Route::controller(AdminProductController::class)->prefix('admin/products')->group(function () {
    Route::get('', 'index')->name('admin.products');
    Route::get('/create', 'create')->name('admin.product.create');
    Route::post('', 'store')->name('admin.product.store');
    Route::get('/{product}/edit', 'edit')->name('admin.product.edit');
    Route::put('/{product}', 'update')->name('admin.product.update');

    // Destroys
    Route::get('/{product}/delete', 'destroy')->name('admin.product.destroy');
    Route::get('/{product}/delete-image', 'destroyImage')->name('admin.product.destroyImage');
});
