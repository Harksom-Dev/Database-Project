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


use App\Http\Controllers\catalogController;

//route to check if customer have member or not
Route::get('/customercheck',[catalogController::class,'memberCheck'])->name('memcheck');
Route::post('/checking',[catalogController::class,'check'])->name('check');

//main catalog route
Route::get('/catalog',[catalogController::class,'catalog'])->name('catalog');
Route::post('/group',[catalogController::class,'group'])->name('group');
Route::post('/catalog/or',[catalogController::class,'addorder'])->name('order');