<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/Welcome', function () {
    return ('Welcome');
});

Route::get('/level', [LevelController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'index']);

Route::get('/user/tambah', [UserController::class, 'tambah'])->name('/user/tambah');
Route::get('/user/ubah/{id}', [UserController::class, 'ubah'])->name('/user/ubah');
Route::get('/user/hapus/{id}', [UserController::class, 'hapus'])->name('/user/hapus');

Route::get('/user',[UserController::class, 'index'])->name('/user');
Route::post('/user/tambah_simpan',[UserController::class, 'tambah_simpan'])->name('/user/tambah_simpan');

Route::put('/user/ubah_simpan/{id}',[UserController::class, 'ubah_simpan'])->name('/user/ubah_simpan');
