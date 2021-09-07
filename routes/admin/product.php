<?php

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;



Route::get('/products/list', [ProductController::class, 'show'])->name('product.list');
Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
Route::get('/products/categories/{id}', [ProductController::class, 'indexCats'])->name('product.categories');
Route::patch('/products/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/products/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::post('/products/store', [ProductController::class, 'store'])->name('product.store');
