<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', [ProductController::class, 'index'])->name('product.index');


// for creating product/create page
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');

//for store product/create page
Route::post('/product', [ProductController::class, 'store'])->name('product.store');

//for edit product/create page
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');

//for update product/create page

Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');

//for delete product/create page
Route::delete('/product/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');

Route::get('/product/back', [ProductController::class, 'back'])->name('product.back');

