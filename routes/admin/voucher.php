<?php

use App\Http\Controllers\Admin\VoucherController;
use Illuminate\Support\Facades\Route;



Route::get('/vouchers/list', [VoucherController::class, 'show'])->name('voucher.list');
Route::get('/vouchers/edit/{id}', [VoucherController::class, 'edit'])->name('voucher.edit');
Route::get('/vouchers/create', [VoucherController::class, 'create'])->name('voucher.create');
Route::get('/vouchers/categories/{id}', [VoucherController::class, 'indexCats'])->name('voucher.categories');
Route::patch('/vouchers/update/{id}', [VoucherController::class, 'update'])->name('voucher.update');
Route::delete('/vouchers/destroy/{id}', [VoucherController::class, 'destroy'])->name('voucher.destroy');
Route::post('/vouchers/store', [VoucherController::class, 'store'])->name('voucher.store');
Route::post('/vouchers/getUsersSelect', [VoucherController::class, 'getUsersSelect'])->name('voucher.user.select');
Route::post('/vouchers/getProductsSelect', [VoucherController::class, 'getProductsSelect'])->name('voucher.product.select');

