<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\DashboardController;

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
Route::get('/', [DashboardController::class, 'index'])->name('index');
Route::get('/kunci-jawaban', [DashboardController::class, 'kunciJawaban'])->name('kunciJawaban');
Route::get('/jawaban-siswa', [DashboardController::class, 'jawabanSiswa'])->name('jawabanSiswa');
