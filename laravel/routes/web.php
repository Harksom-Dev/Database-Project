<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\DB;


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

// create Route
Route::get('/employees', [App\Http\Controllers\EmployeesController:: class, 'index'])->name('employee');
Route::get('/customers', [App\Http\Controllers\CustomersController:: class, 'index'])->name('customer');
Route::get('/get-cus/{id}', [App\Http\Controllers\CustomersController:: class, 'getSelaeRepByEmployee']);


Route::get('/customers/edit/{id}', [App\Http\Controllers\CustomersController:: class,'edit']);
Route::get('/employees/edit/{id}', [App\Http\Controllers\EmployeesController:: class,'edit']);

Route::post('/customers/add',[App\Http\Controllers\CustomersController:: class,'store'])-> name('addCustomer');
Route::patch('/customers/update/{id}',[App\Http\Controllers\CustomersController:: class,'update']);
Route::get('/customers/softdelete/{id}', [App\Http\Controllers\CustomersController:: class,'softdelete']);

Route::patch('/employees/update/{id}',[App\Http\Controllers\EmployeesController:: class,'update']);
Route::post('/employees/add',[App\Http\Controllers\EmployeesController:: class,'store'])-> name('addEmployee');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::any('/search',[App\Http\Controllers\SearchCustomerController::class, 'index'] );


Route::get('/stock-in',[App\Http\Controllers\stock_inController::class,'index'])->name('stockin.index');
Route::post('/stock-in/add/new',[App\Http\Controllers\stock_inController::class,'store'])->name('stockin.store');
Route::get('/stock-in/delete/',[App\Http\Controllers\stock_inController::class,'delete']);

Route::get('/product/add',[App\Http\Controllers\addProductController::class,'index'])->name('addproduct');
Route::post('/product/add',[App\Http\Controllers\addProductController::class,'store'])->name('product.store');


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

// use App\Http\Controllers\promotioncodeController;
// Route::post('/codechecking',[promotioncodeController::class,'check'])->name('codecheck');

use App\Http\Controllers\paymentController;
Route::get('/payment/{id}',[paymentController::class,'index'])->name('payment');
Route::post('/payment',[paymentController::class,'store'])->name('payment.add');



