    <?php

    use App\Http\Controllers\SiswaController;
    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\CasisController;
    use App\Http\Controllers\Home;
    use App\Http\Controllers\Info_Jurusan;
    use App\Http\Controllers\JurusanController;

    use Illuminate\Support\Facades\Route;

    Route::resource('/', Home::class);

    Route::resource('siswa', SiswaController::class);
    Route::resource('jurusan', JurusanController::class);
    Route::resource('info_jurusan', Info_Jurusan::class);
    Route::get('admin', [AdminController::class, 'index']);
    Route::get('auth', [AuthController::class, 'index']);
    Route::resource('casis', CasisController::class);
