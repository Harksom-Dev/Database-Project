<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\http\Request;

use App\Http\Middleware\IsAdmin;
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
// Route::middleware(['auth:sanctum','verified'])
use App\Http\Controllers\customHomeController;

Route::middleware([IsAdmin::class,'is_admin'])->group(function () {
    Route::get('president/home/', [customHomeController::class, 'presidentHome'])->name('psd.home');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('president/home/', [customHomeController::class, 'presidentHome'])->name('psd.home')->middleware('is_admin');

use App\Http\Controllers\Auth\LoginController;


use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\testController;
Route::get('/get-user/{id}',[testController::class,'test'])->name('test');



