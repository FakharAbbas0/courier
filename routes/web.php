<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SlabController;
use App\Http\Controllers\ZoneController;
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

Route::get('/register', [HomeController::class, 'registerPage'])->name('register');
Route::get('/login', [HomeController::class, 'loginPage'])->name('login');
Route::get('/logout', [HomeController::class, 'logout'])->name('signout');
Route::post('/postlogin', [HomeController::class, 'postlogin'])->name('postlogin');
Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/blank', [HomeController::class, 'blank_page'])->name('blank_page');
    Route::resource('orders',OrderController::class);
    Route::post('orders/add-update',[OrderController::class,'AddUpdate'])->name('order_add_update');
    Route::get('orders/report',[OrderController::class,'report'])->name('orders_report');
    Route::resource('zones',ZoneController::class);
    Route::resource('cities',CityController::class);
    Route::resource('cities',CityController::class);
    Route::resource('customers',CustomerController::class);
    Route::resource('services',ServiceController::class);
    Route::resource('slabs',SlabController::class);
    Route::resource('products',ProductController::class);
    Route::resource('branches',BranchController::class);
   
});
Route::resource('permissions',PermissionsController::class);