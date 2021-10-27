<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\http\Request;

use app\Http\Controllers\orderController;
use app\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\promotioncodeController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\paymentController;

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

// create Route
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin')->middleware('is_admin');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('home');



Route::get('/employees', [App\Http\Controllers\EmployeesController:: class, 'index'])->name('employee')->middleware('is_admin', 'isSale');
Route::get('/employees/edit/{id}', [App\Http\Controllers\EmployeesController:: class,'edit'])->middleware('is_admin');
Route::get('/employees/softdelete/{id}', [App\Http\Controllers\EmployeesController:: class,'softdelete'])->middleware('is_admin');
Route::patch('/employees/update/{id}',[App\Http\Controllers\EmployeesController:: class,'update']->middleware('is_admin'));
Route::post('/employees/add',[App\Http\Controllers\EmployeesController:: class,'store'])-> name('addEmployee');



Route::get('/customers', [App\Http\Controllers\CustomersController:: class, 'index'])->name('customer')->middleware('is_admin');
Route::get('/get-cus/{id}', [App\Http\Controllers\CustomersController:: class, 'getSelaeRepByEmployee'])->middleware('is_admin');
Route::get('/customers/edit/{id}', [App\Http\Controllers\CustomersController:: class,'edit'])->middleware('is_admin');
Route::post('/customers/add',[App\Http\Controllers\CustomersController:: class,'store'])-> name('addCustomer')->middleware('is_admin');
Route::patch('/customers/update/{id}',[App\Http\Controllers\CustomersController:: class,'update'])->middleware('is_admin');
Route::get('/customers/softdelete/{id}', [App\Http\Controllers\CustomersController:: class,'softdelete'])->middleware('is_admin');
Route::any('/search',[App\Http\Controllers\SearchCustomerController::class, 'index'])->middleware('is_admin');
//route to check if customer have member or not
Route::get('/customercheck',[customerController::class,'memberCheck'])->name('memcheck')->middleware('is_admin');
Route::post('/checking',[customerController::class,'check'])->name('check')->middleware('is_admin');



Route::get('/stock-in',[App\Http\Controllers\stock_inController::class,'index'])->name('stockin.index')->middleware('is_admin', 'isVPMarketing');
Route::post('/stock-in/add/new',[App\Http\Controllers\stock_inController::class,'store'])->name('stockin.store')->middleware('is_admin');
Route::get('/stock-in/delete/',[App\Http\Controllers\stock_inController::class,'delete'])->middleware('is_admin');



Route::get('/product/add',[App\Http\Controllers\addProductController::class,'index'])->name('addproduct')->middleware('is_admin');
Route::post('/product/add',[App\Http\Controllers\addProductController::class,'store'])->name('product.store')->middleware('is_admin');



Route::get('/promotioncode',[promotioncodeController::class,'index'])->name('promotion.index')->middleware('is_admin', 'isOnlySale');
Route::post('/promotioncode/add',[promotioncodeController::class,'store'])->name('promotion.store')->middleware('is_admin');
Route::post('/codechecking',[promotioncodeController::class,'check'])->name('codecheck')->middleware('is_admin');
Route::get('/promotioncode/delete',[App\Http\Controllers\promotioncodeController::class,'delete'])->middleware('is_admin');



Route::get('/order',[App\Http\Controllers\orderController::class, 'index'])->name('order.index')->middleware('is_admin');
Route::post('/edit',[App\Http\Controllers\orderController::class, 'edit'])->name('order.edit')->middleware('is_admin');
Route::post('/addedit',[App\Http\Controllers\orderController::class, 'addedit'])->name('order.addedit')->middleware('is_admin');
Route::post('/order',[orderdetailController::class,'order'])->name('order.add')->middleware('is_admin');



Route::get('/payment/{id}',[paymentController::class,'index'])->name('payment')->middleware('is_admin');
Route::post('/payment',[paymentController::class,'store'])->name('payment.add')->middleware('is_admin');



