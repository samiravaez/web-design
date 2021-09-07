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

Route::get('/', function () {
    return('home');
})->middleware('auth');

Auth::routes();
Route::get('/code/show', [HomeController::class, 'code'])->name('code.show');
Route::post('/code', [HomeController::class, 'checkCode'])->name('code.check');
Route::get('/home', [HomeController::class, 'index'])->name('home');
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