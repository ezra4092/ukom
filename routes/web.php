<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\UserController;
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

Route::middleware('guest')->group(function(){
    Route::get('/', [AuthController::class, 'index'])->name('login');

    Route::post('/proses', [AuthController::class, 'login'])->name('proses');
});


Route::group(['middleware' => ['auth']], function() {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/outlet', [OutletController::class, 'index'])->name('outlet');
    Route::post('/tambah-outlet', [OutletController::class, 'tambah_outlet'])->name('tambah_outlet');
    Route::post('/hapus-outlet', [OutletController::class, 'hapus_outlet'])->name('hapus_outlet');
    Route::post('/edit-outlet', [OutletController::class, 'edit_outlet'])->name('edit_outlet');

    Route::get('/user', [UserController::class, 'index'])->name('user`');

});
