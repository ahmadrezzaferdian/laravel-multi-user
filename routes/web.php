<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaControllerAdmin;
use App\Http\Controllers\SiswaControllerSiswa;


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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [AdminController::class, 'index']);
    // Rute untuk admin
    Route::get('/home/admin', [AdminController::class, 'admin'])->middleware('userAkses:admin');
    Route::get('/kelas', [AdminController::class, 'kelas'])->middleware('userAkses:admin');
    Route::get('/carikelas', [AdminController::class, 'pencarian_kelas'])->middleware('userAkses:admin');
    Route::get('/siswa', [AdminController::class, 'siswa_'])->middleware('userAkses:admin');
    Route::get('/carisiswa', [AdminController::class, 'pencarian_siswa'])->middleware('userAkses:admin');

    Route::get('/kelas/tambah-kelas', [KelasController::class, 'tambah'])->middleware('userAkses:admin');
    Route::post('/kelas/simpan', [KelasController::class, 'simpan'])->middleware('userAkses:admin');
    Route::get('/kelas/{id}/edit', [KelasController::class, 'edit'])->middleware('userAkses:admin');
    Route::post('/kelas/update', [KelasController::class, 'update'])->middleware('userAkses:admin');
    Route::get('/kelas/{id}/delete', [KelasController::class, 'delete'])->middleware('userAkses:admin');

    Route::get('/siswa/tambah-siswa', [SiswaControllerAdmin::class, 'tambah'])->middleware('userAkses:admin');
    Route::post('/siswa/simpan', [SiswaControllerAdmin::class, 'simpan'])->middleware('userAkses:admin');
    Route::get('/siswa/{id}/edit', [SiswaControllerAdmin::class, 'edit'])->middleware('userAkses:admin');
    Route::post('/siswa/update', [SiswaControllerAdmin::class, 'update'])->middleware('userAkses:admin');
    Route::get('/siswa/{id}/delete', [SiswaControllerAdmin::class, 'delete'])->middleware('userAkses:admin');


    // Rute untuk siswa
    Route::get('/home/siswa', [AdminController::class, 'siswa'])->middleware('userAkses:siswa');
    Route::get('/siswa/siswa', [AdminController::class, 'siswa_'])->middleware('userAkses:siswa');
    Route::get('/carisiswa', [AdminController::class, 'pencarian_siswa'])->middleware('userAkses:siswa');

    Route::get('/siswa/siswa/tambah-siswa', [SiswaControllerSiswa::class, 'tambah'])->middleware('userAkses:siswa');
    Route::post('/siswa/siswa/simpan', [SiswaControllerSiswa::class, 'simpan'])->middleware('userAkses:siswa');
    Route::get('/siswa/siswa/{id}/edit', [SiswaControllerSiswa::class, 'edit'])->middleware('userAkses:siswa');
    Route::post('/siswa/siswa/update', [SiswaControllerSiswa::class, 'update'])->middleware('userAkses:siswa');
    Route::get('/siswa/siswa/{id}/delete', [SiswaControllerSiswa::class, 'delete'])->middleware('userAkses:siswa');

    Route::get('/logout', [SesiController::class, 'logout']);
});
