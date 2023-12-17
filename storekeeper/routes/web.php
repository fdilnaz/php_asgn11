<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

// routes/web.php



Route::get('/dashboard', [ProductController::class, 'dashboard'])->name('dashboard');
Route::get('/transactions', [ProductController::class, 'transactions'])->name('transactions');

Route::resource('products', ProductController::class);



