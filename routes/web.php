<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
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



Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/code/show', [HomeController::class, 'code'])->name('code.show');
Route::post('/code', [HomeController::class, 'checkCode'])->name('code.check');
Route::post('/sendCode', [HomeController::class, 'codeSend'])->name('code.send.again');
//Route::get('dashboard', [App\Http\Controllers\UserController::class, 'dashboard'])->middleware('auth');
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => ['is_admin', "auth"]], function () {
        require_once('admin/dashboard.php');
        require_once('admin/user.php');
        require_once('admin/product.php');
        require_once('admin/category.php');
        require_once('admin/voucher.php');
    });
});

Route::group(['middleware' => ["auth"]], function () {
    Route::get('/home', [HomeController::class, 'home'])->name('home');
});
