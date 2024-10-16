<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GameController;
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

Route::get('/category', [CategoryController::class, 'category'])->name('category');
Route::get('/create-category', [CategoryController::class, 'create'])->name('create-category');
Route::post('/store-category', [CategoryController::class, 'store'])->name('store-category');
Route::get('/show-category/{id}', [CategoryController::class, 'show'])->name('show-category');
Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('edit-category');
Route::put('/update-category/{id}', [CategoryController::class, 'update'])->name('update-category');
Route::delete('/delete-category/{id}', [CategoryController::class, 'delete'])->name('delete-category');

// kuis ke 3
Route::get('/game', [GameController::class, 'game'])->name('game');
Route::get('/create-game', [GameController::class, 'create'])->name('create-game');
Route::post('/store-game', [GameController::class, 'store'])->name('store-game');
Route::get('/show-game/{id}', [GameController::class, 'show'])->name('show-game');
Route::get('/edit-game/{id}', [GameController::class, 'edit'])->name('edit-game');
Route::put('/update-game/{id}', [GameController::class, 'update'])->name('update-game');
Route::delete('/delete-game/{id}', [GameController::class, 'delete'])->name('delete-game');

//crud books
Route::resource('books', BookController::class);



