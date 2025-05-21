<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CasisController;
use App\Http\Controllers\Home; 
use App\Http\Controllers\Info_Jurusan;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\PendaftarController;
use Illuminate\Support\Facades\Route;

Route::resource('home', Home::class);

Route::get('auth', [AuthController::class, 'formLogin'])->name('auth');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);


Route::get('daftar/registrasi', [PendaftarController::class, 'registrasi'])->name('daftar.registrasi');
Route::post('daftar/add_registrasi', [PendaftarController::class, 'add_registrasi'])->name('daftar.add_registrasi');

Route::resource('pendaftaran', PendaftarController::class)->except(['registrasi', 'add_registrasi'])->middleware('auth');
Route::resource('jurusan', JurusanController::class)->middleware('auth');
Route::resource('info_jurusan', Info_Jurusan::class)->middleware('auth');
Route::get('admin', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');
Route::resource('casis', CasisController::class)->middleware('auth');


