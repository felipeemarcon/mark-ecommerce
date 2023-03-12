<?php

use App\Http\Controllers\{HomeController, ProductController};
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

Route::get('/', [HomeController::class, 'index']);

Route::prefix('products')->group(function () {
    Route::get('', [ProductController::class, 'index'])->name('product.index');
    Route::get('/{id}', [ProductController::class, 'show'])->name('product.show');
});
