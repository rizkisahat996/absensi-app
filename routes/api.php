<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Signature;

use function PHPUnit\Framework\returnValue;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/signature', function () {
  $tb_signature = signature::all();
  return response()->json($tb_signature);
});