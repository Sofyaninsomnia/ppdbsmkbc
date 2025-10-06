<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Home;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\Calon_siswa;
use App\Http\Controllers\User\DocumentController;
use App\Http\Controllers\User\OrtuController as UserOrtuController;
use Illuminate\Support\Facades\Route;

Route::get('/', [Home::class, 'index'])->name('home');
Route::get('/detail_jurusan/{id}', [Home::class, 'show'])->name('home.show');

Route::get('auth', [AuthController::class, 'formLogin'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('proses_login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);


Route::get('daftar/registrasi', [PendaftarController::class, 'registrasi'])->name('daftar.registrasi');
Route::post('daftar/add_registrasi', [PendaftarController::class, 'add_registrasi'])->name('daftar.add_registrasi');
Route::get('daftar/show_print_form/{id}', [PendaftarController::class, 'show_print_form'])->name('daftar.show_print_form');

Route::prefix('user')->group(function() {
    Route::middleware(['user'])->group(function(){

        Route::get('dashboard', [DashboardController::class, 'user_dashboard'])->name('user.dashboard');

        Route::get('form/tahap-2', [Calon_siswa::class, 'form_tahap_2'])->name('form.tahap_2');
        Route::post('create/casis', [Calon_siswa::class, 'create'])->name('create_casis');

        Route::get('data_ortu', [UserOrtuController::class, 'index'])->name('data.ortu');
        Route::get('form_data/ayah', [UserOrtuController::class, 'ayah'])->name('data.ayah');
        Route::get('form_data/ibu', [UserOrtuController::class, 'ibu'])->name('data.ibu');
        Route::post('kirim/data_otu', [UserOrtuController::class, 'create_data'])->name('kirim.data_ortu');

        Route::get('document', [DocumentController::class, 'index'])->name('document.index');
        Route::post('dokument/proses/', [DocumentController::class, 'upload'])->name('user.document.upload');
    });
});

Route::prefix('admin')->group(function () {

    Route::get('/login/ynhf%%^&FHB134Ctg4yfhHFG', [AuthController::class, 'formLogin_admin'])->name('privat.login');
    Route::post('/login/post', [AuthController::class, 'login_admin'])->name('privat.login.post');

    Route::middleware(['admin'])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'admin_dashboard'])->name('admin.dashboard');
    });

});
