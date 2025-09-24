<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CasisController;
use App\Http\Controllers\Home;
use App\Http\Controllers\Info_Jurusan;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\OrtuController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\Calon_siswa;
use App\Http\Controllers\User\OrtuController as UserOrtuController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
        Route::get('data/ayah', [UserOrtuController::class, 'ayah'])->name('data.ayah');
    });
});

Route::prefix('admin')->group(function () {

    Route::get('/login/ynhf%%^&FHB134Ctg4yfhHFG', [AdminLoginController::class, 'form_login'])->name('privat.login');
    Route::post('/login/post', [AdminLoginController::class, 'login'])->name('privat.login.post');

    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'admin_dashboard'])->name('admin.dashboard');
        Route::resource('pendaftaran', PendaftarController::class)->except(['registrasi', 'add_registrasi']);
        Route::resource('jurusan', JurusanController::class);
        Route::resource('ortu', OrtuController::class);
        Route::resource('info_jurusan', Info_Jurusan::class);
        Route::resource('casis', CasisController::class);
    });

    Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');
});
