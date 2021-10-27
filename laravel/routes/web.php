<?php

use Illuminate\Support\Facades\Route;

use app\Http\Controllers\orderController;




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
Route::post('/codechecking',[promotioncodeController::class,'check'])->name('codecheck');

Route::get('/promotioncode/delete',[App\Http\Controllers\promotioncodeController::class,'delete']);


use App\Http\Controllers\adminController;
Route::get('/admin', [App\Http\Controllers\adminController::class, 'index'])->name('admin');


Route::get('/order',[App\Http\Controllers\orderController::class, 'index'])->name('order.index');
Route::post('/edit',[App\Http\Controllers\orderController::class, 'edit'])->name('order.edit');
Route::post('/addedit',[App\Http\Controllers\orderController::class, 'addedit'])->name('order.addedit');



use App\Http\Controllers\customerController;
//route to check if customer have member or not
Route::get('/customercheck',[customerController::class,'memberCheck'])->name('memcheck');
Route::post('/checking',[customerController::class,'check'])->name('check');


use App\Http\Controllers\catalogController;
//main catalog route
Route::get('/catalog',[catalogController::class,'index'])->name('catalog');
Route::post('/catalog',[catalogController::class,'index'])->name('catalog');
// Route::post('/group',[catalogController::class,'group'])->name('group');
Route::post('/catalog/or',[catalogController::class,'addorder'])->name('order');

use App\Http\Controllers\orderdetailController;
//orderdetail route
Route::get('/cart',[orderdetailController::class,'index'])->name('cart.index');
Route::post('/cart',[orderdetailController::class,'store'])->name('cart.store');

Route::delete('/cartremove',[orderdetailController::class,'remove'])->name('cart.remove');

Route::post('/order',[orderdetailController::class,'order'])->name('order.add');

Route::get('/test',[orderdetailController::class,'test'])->name('test');
Route::get('/test2',[orderdetailController::class,'test2'])->name('test2');


use App\Http\Controllers\paymentController;
Route::get('/payment/{id}',[paymentController::class,'index'])->name('payment');
Route::post('/payment',[paymentController::class,'store'])->name('payment.add');



