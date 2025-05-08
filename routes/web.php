    <?php

    use App\Http\Controllers\SiswaController;
    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\CasisController;
    use App\Http\Controllers\JurusanController;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('home.welcome');
    });

    Route::resource('siswa', SiswaController::class);
    Route::resource('jurusan', JurusanController::class);
    Route::get('admin', [AdminController::class, 'index']);
    Route::get('auth', [AuthController::class, 'index']);
    Route::resource('casis', CasisController::class);