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

Route::get('/test',[orderdetailController::class,'test'])->name('test');
Route::get('/test2',[orderdetailController::class,'test2'])->name('test2');
