<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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


Route::get('/customers/edit/{id}', [App\Http\Controllers\CustomersController:: class,'edit'])-> name('editpage');
Route::get('/customers/address/edit/{id}', [App\Http\Controllers\CustomersController:: class,'addrEdit']);

Route::post('/customers/address/add/', [App\Http\Controllers\CustomersController:: class,'storeAddress'])-> name('addAddress');
Route::get('/customers/address/delete/{id}', [App\Http\Controllers\CustomersController:: class,'addrSoftdelete']);
Route::post('/customers/address/update',[App\Http\Controllers\CustomersController:: class,'updateAddress'])->name('updateAddress');

Route::get('/employees/edit/{id}', [App\Http\Controllers\EmployeesController:: class,'edit']);

Route::post('/customers/add',[App\Http\Controllers\CustomersController:: class,'store'])-> name('addCustomer');
Route::patch('/customers/update/{id}',[App\Http\Controllers\CustomersController:: class,'update']);
Route::get('/customers/softdelete/{id}', [App\Http\Controllers\CustomersController:: class,'softdelete']);
Route::get('/employees/softdelete/{id}', [App\Http\Controllers\EmployeesController:: class,'softdelete']);

Route::patch('/employees/update/{id}',[App\Http\Controllers\EmployeesController:: class,'update']);
Route::post('/employees/add',[App\Http\Controllers\EmployeesController:: class,'store'])-> name('addEmployee');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::any('/search',[App\Http\Controllers\SearchCustomerController::class, 'index'] );


