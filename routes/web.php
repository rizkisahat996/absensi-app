<?php

use App\Http\Controllers\AbsenController;
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

Route::get('/', [AbsenController::class, 'index'])->name('absen.index');
Route::post('/store', [AbsenController::class, 'store'])->name('absen.store');