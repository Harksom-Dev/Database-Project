<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/stock-in',[App\Http\Controllers\stock_inController::class,'index'])->name('stockin.index');
Route::get('/product/add',[App\Http\Controllers\addProductController::class,'index'])->name('addproduct');
Route::post('/product/add',[App\Http\Controllers\addProductController::class,'store'])->name('product.store');
Route::post('/stock-in/add/new',[App\Http\Controllers\stock_inController::class,'store'])->name('stockin.store');
Route::get('/stock-in/delete/',[App\Http\Controllers\stock_inController::class,'delete']);

use App\Http\Controllers\promotioncodeController;
Route::get('/promotioncode',[promotioncodeController::class,'index'])->name('promotion.index');
Route::post('/promotioncode/add',[promotioncodeController::class,'store'])->name('promotion.store');
Route::get('/promotioncode/delete',[App\Http\Controllers\promotioncodeController::class,'delete']);

use App\Http\Controllers\adminController;
Route::get('/admin', [App\Http\Controllers\adminController::class, 'index'])->name('admin');