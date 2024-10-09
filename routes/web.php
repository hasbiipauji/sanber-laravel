<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TableController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/main', function () {
//     return view('layouts.main');
// });
Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/welcome', [DashboardController::class, 'welcome'])->name('welcome');

Route::get('/table', [TableController::class, 'table'])->name('table');
Route::get('/data-table', [TableController::class, 'dataTable'])->name('data-table');


