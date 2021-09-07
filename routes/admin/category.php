<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;



Route::get('/categories/list', [CategoryController::class, 'show'])->name('category.list');
Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::get('/categories/categories/{id}', [CategoryController::class, 'indexCats'])->name('category.categories');
Route::put('/categories/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/categories/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('category.store');
