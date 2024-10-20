<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TableController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
   
    // Route::post('/welcome', [DashboardController::class, 'welcome'])->name('welcome');
    
    Route::get('/table', [TableController::class, 'table'])->name('table');
    Route::get('/data-table', [TableController::class, 'dataTable'])->name('data-table');
    
    Route::get('/create-category', [CategoryController::class, 'create'])->name('create-category');
    Route::post('/store-category', [CategoryController::class, 'store'])->name('store-category');
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
    
    //pinjam buku
    Route::post('/borrow/{book_id}', [BorrowController::class, 'create'])->name('create-borrow');

    // ->only('index', 'update'), itu berarti hanya membuat rute untuk metode index dan update
    Route::resource('profiles', ProfileController::class)->only('index', 'update');
});

//crud books
//auth nya hanya bagian create, edit dan delete. untuk show dan index nya tidak sehingga authnya di form nya langsung
Route::resource('books', BookController::class);

Route::get('/register', [AuthController::class, 'register'])->name('register');
//route laravel ui untuk auth
Auth::routes();

// ini untuk mengahrahkan pada saat pertama kali dibuka
Route::get('/', [DashboardController::class, 'welcome'])->name('welcome');

// tugasnya autentikasi kecuali index dan show, ini keluarkan karena route nya tidak dibuat pakai --resource
Route::get('/category', [CategoryController::class, 'category'])->name('category');
Route::get('/show-category/{id}', [CategoryController::class, 'show'])->name('show-category');