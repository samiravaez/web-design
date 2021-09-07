<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/users/list', [UserController::class, 'show'])->name('user.list');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
Route::patch('/users/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/users/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::post('/users/store', [UserController::class, 'store'])->name('user.store');
