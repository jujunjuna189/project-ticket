<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\RuteController;
use App\Http\Controllers\TipeTransportasiController;
use App\Http\Controllers\TransportasiController;
use Illuminate\Support\Facades\Route;

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
// Auth
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/auth', [AuthController::class, 'auth'])->name('auth');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Master Data
Route::get('/rute', [RuteController::class, 'index'])->name('rute');
Route::get('/rute/create', [RuteController::class, 'create'])->name('rute.create');
Route::post('/rute/store', [RuteController::class, 'store'])->name('rute.store');
Route::get('/rute/update', [RuteController::class, 'update'])->name('rute.update');
Route::post('/rute/updated', [RuteController::class, 'updated'])->name('rute.updated');
Route::get('/rute/delete', [RuteController::class, 'delete'])->name('rute.delete');
//
Route::get('/tipe-transportasi', [TipeTransportasiController::class, 'index'])->name('tipe-transportasi');
Route::get('/tipe-transportasi/create', [TipeTransportasiController::class, 'create'])->name('tipe-transportasi.create');
Route::post('/tipe-transportasi/store', [TipeTransportasiController::class, 'store'])->name('tipe-transportasi.store');
Route::get('/tipe-transportasi/update', [TipeTransportasiController::class, 'update'])->name('tipe-transportasi.update');
Route::post('/tipe-transportasi/updated', [TipeTransportasiController::class, 'updated'])->name('tipe-transportasi.updated');
Route::get('/tipe-transportasi/delete', [TipeTransportasiController::class, 'delete'])->name('tipe-transportasi.delete');
// 
Route::get('/transportasi', [TransportasiController::class, 'index'])->name('transportasi');
Route::get('/transportasi/create', [TransportasiController::class, 'create'])->name('transportasi.create');
Route::post('/transportasi/store', [TransportasiController::class, 'store'])->name('transportasi.store');
Route::get('/transportasi/update', [TransportasiController::class, 'update'])->name('transportasi.update');
Route::post('/transportasi/updated', [TransportasiController::class, 'updated'])->name('transportasi.updated');
Route::get('/transportasi/delete', [TransportasiController::class, 'delete'])->name('transportasi.delete');
// Transaksi
Route::get('/pemesanan', [PemesananController::class, 'index'])->name('pemesanan');
// Laporan
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
