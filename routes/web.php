<?php

use App\Http\Controllers\SuratmasukController;
use App\Http\Controllers\SuratkeluarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Models\User;

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

Route::get('/', function () {
    return view('login');
})->middleware('guest');

Route::get('login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login')->middleware('guest');






Route::middleware('auth')->group(function () {
    Route::group(['middleware' => ['cek_login:admin']], function () {
        Route::resource('dashboard', AdminController::class);
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');

        // start surat masuk
        Route::get('/surat-masuk', [SuratmasukController::class, 'index'])->name('surat-masuk.suratmasuk');
        Route::get('/surat-masuk/cari', [SuratmasukController::class, 'cari'])->name('surat-masuk.cari');
        Route::get('/surat-masuk-detail/{id}', [SuratmasukController::class, 'detail'])->name('surat-masuk.detail');
        Route::get('/tambah-surat-masuk', [SuratmasukController::class, 'create'])->name('surat-masuk.tambah');
        Route::post('/berhasil-tambah-surat-masuk', [SuratmasukController::class, 'store'])->name('surat-masuk.store');
        Route::get('/edit-surat-masuk/{id}', [SuratmasukController::class, 'edit'])->name('surat-masuk.edit');
        Route::post('/berhasil-edit-surat-masuk/{id}', [SuratmasukController::class, 'update'])->name('surat-masuk.update');
        Route::get('/surat-masuk/hapus/{id}', [SuratmasukController::class, 'delete'])->name('surat-masuk.hapus');
        // End surat masuk

        // start surat keluar
        Route::get('/surat-keluar', [SuratkeluarController::class, 'index'])->name('surat-keluar.suratkeluar');
        Route::get('/surat-keluar/cari', [SuratkeluarController::class, 'cari'])->name('surat-keluar.cari');
        Route::get('/surat-keluar-detail/{id}', [SuratkeluarController::class, 'detail'])->name('surat-keluar.detail');
        Route::get('/tambah-surat-keluar', [SuratkeluarController::class, 'create'])->name('surat-keluar.tambah');
        Route::post('/berhasil-tambah-surat-keluar', [SuratkeluarController::class, 'store'])->name('surat-keluar.store');
        Route::get('/edit-surat-keluar/{id}', [SuratkeluarController::class, 'edit'])->name('surat-keluar.edit');
        Route::post('/berhasil-edit-surat-keluar/{id}', [SuratkeluarController::class, 'update'])->name('surat-keluar.update');
        Route::get('/surat-keluar/hapus/{id}', [SuratkeluarController::class, 'delete'])->name('surat-keluar.hapus');
        // End surat keluar


        // start kontrol user
        Route::get('/user', [UserController::class, 'index'])->name('user.index');
        Route::get('/detail-user/{id}', [UserController::class, 'detail'])->name('user.detail');
        Route::get('/tambah-user', [UserController::class, 'create'])->name('user.tambah');
        Route::post('/berhasil-tambah-user', [UserController::class, 'store'])->name('user.store');
        Route::get('/hapus-user/{id}', [UserController::class, 'delete'])->name('user.hapus');



    });
});
