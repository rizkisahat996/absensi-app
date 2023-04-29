<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AbsensiController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// routes untuk user
Route::middleware(['auth'])->group(function () {
    Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
    Route::patch('/absensis/{id}', [AbsensiController::class, 'update_user'])->name('absensi.update_user');
});

// routes untuk admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/absensi/admin', [AbsensiController::class, 'index_admin'])->name('absensi.index_admin');
    Route::post('/absensi/store', [AbsensiController::class, 'store'])->name('absensi.store');
    Route::patch('/absensi/{id}', [AbsensiController::class, 'update'])->name('absensi.update');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
