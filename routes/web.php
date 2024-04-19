<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Admin routes
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'admindashboard'])->name('admin.dashboard');
});

Route::resource('companies', CompanyController::class);
Route::resource('employees', EmployeeController::class);

