<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
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

Route::get('/', [AuthController::class, 'login']);
Route::post('loginUser', [AuthController::class, 'loginUser']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('dosen')->middleware('auth.dosen')->group(function () {
    Route::get('/', [DosenController::class, 'index']);
    Route::get('list', [DosenController::class, 'list']);
    Route::post('store',[DosenController::class,'store']);
    Route::get('delete/{id}',[DosenController::class , 'destroy']);
    Route::get('download/{filename}',[DosenController::class , 'download']);
});