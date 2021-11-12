<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\LppmController;
use App\Http\Controllers\ReviewerController;
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

Route::prefix('lppm')->middleware('auth.lppm')->group(function () {
// Route::prefix('lppm')->group(function () {
    Route::get('/', [LppmController::class, 'index']);
    Route::get('list', [LppmController::class, 'list']);
    Route::post('store',[LppmController::class,'store']);
    Route::get('download/{filename}',[LppmController::class , 'download']);
});

Route::prefix('reviewer')->middleware('auth.reviewer')->group(function () {
    Route::get('/', [ReviewerController::class, 'index']);
    Route::get('list', [ReviewerController::class, 'list']);
    Route::post('store',[ReviewerController::class,'store']);
    Route::get('download/{filename}',[ReviewerController::class , 'download']);
});