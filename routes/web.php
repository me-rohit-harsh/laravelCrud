<?php

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

Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/product', [ProductController::class, 'addproduct'])->name('products.addproduct');
Route::get('/list', [ProductController::class, 'allproducts'])->name('products.allproduct');
Route::post('/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/{id}/update', [ProductController::class, 'update'])->name('products.update');
Route::get('{id}/delete', [ProductController::class, 'delete'])->name('products.delete');
// Route::delete('{id}/delete', [ProductController::class, 'delete'])->name('products.delete');
