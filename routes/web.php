<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\TransactionCompletedController;
use App\Http\Controllers\GrafikController;
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
})->name('welcome');

Auth::routes();

Route::middleware(['auth']) -> group(function () {
    Route::get('/dashboard', [GrafikController::class, 'index'])->name('dashboard');
});

// Admin routes
Route::middleware(['auth', 'user-access:admin']) -> group(function () {

    // Car routes
    Route::resource('car', CarController::class);

    // Driver routes
    Route::resource('driver', DriverController::class);

    // Transaction routes
    Route::resource('transaction', TransactionController::class);

    // Export Routes
    Route::get('transaction-export', [TransactionController::class, 'export'])->name('transaction.export');
});

// Verifikator routes
Route::middleware(['auth', 'user-access:verifikator']) -> group(function () {

    // Verification routes
    Route::resource('verification', VerificationController::class);

    // Completed Transaction routes
    Route::resource('transaction-completed', TransactionCompletedController::class);
});
