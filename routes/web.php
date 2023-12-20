<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SewaController;
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

Route::get('/', [HomepageController::class, 'index'])->name('home');
Route::get('/cars', [CarController::class, 'index'])->name('car');
Route::get('/cars/{car:slug}', [CarController::class, 'show'])->name('car.show');
Route::get('/cars/{car:slug}/sewa', [SewaController::class, 'index'])->name('car.sewa');
Route::post('/cars/{car:slug}/sewa/store', [SewaController::class, 'store'])->name('store');
Route::get('/cars/{car:slug}/sewa/bayar', [SewaController::class, 'bayar'])->name('bayar');
Route::post('/cars/{car:slug}/sewa/bayar/proses', [SewaController::class, 'proses'])->name('proses.bayar');
Route::post('/check', [CarController::class, 'check'])->name('check');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/laporan', [SewaController::class, 'laporan'])->name('laporan');
