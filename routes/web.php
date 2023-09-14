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
Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth/login', [AuthController::class, 'authenticate'])->name('authenticate');

Route::get('/auth/register', [AuthController::class, 'register'])->name('register');
Route::post('/auth/register', [AuthController::class, 'storeRegister'])->name('register.user');

Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/', [DashboardController::class, 'index'])->name('index')->middleware('auth');
Route::get('/kunci-jawaban', [DashboardController::class, 'kunciJawaban'])->name('kunciJawaban')->middleware('auth');
Route::get('/jawaban-siswa', [DashboardController::class, 'jawabanSiswa'])->name('jawabanSiswa')->middleware('auth');
