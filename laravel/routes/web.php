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


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::any('/search',[App\Http\Controllers\SearchCustomerController::class, 'index'] );