<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailTransaksi;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\TransaksiController;
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

Route::get('testexportlalala', function () {
    return view('exports.transaksi');
});

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');

    Route::post('/proses', [AuthController::class, 'login'])->name('proses');
});


Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/table', [DashboardController::class, 'table'])->name('table');

    Route::get('/outlet', [OutletController::class, 'index'])->name('outlet');
    Route::post('/tambah-outlet', [OutletController::class, 'tambah_outlet'])->name('tambah_outlet');
    Route::post('/hapus-outlet', [OutletController::class, 'hapus_outlet'])->name('hapus_outlet');
    Route::post('/edit-outlet', [OutletController::class, 'edit_outlet'])->name('edit_outlet');

    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::post('/tambah-user', [UserController::class, 'tambah_user'])->name('tambah_user');
    Route::post('/hapus-user', [UserController::class, 'hapus_user'])->name('hapus_user');
    Route::post('/edit-user', [UserController::class, 'edit_user'])->name('edit_user');

    Route::get('/member', [MemberController::class, 'index'])->name('member');
    Route::post('/tambah-member', [MemberController::class, 'tambah_member'])->name('tambah_member');
    Route::post('/hapus-member', [MemberController::class, 'hapus_member'])->name('hapus_member');
    Route::post('/edit-member', [MemberController::class, 'edit_member'])->name('edit_member');

    Route::get('/paket', [PaketController::class, 'index'])->name('paket');
    Route::post('/tambah-paket', [PaketController::class, 'tambah_paket'])->name('tambah_paket');
    Route::post('/hapus-paket', [PaketController::class, 'hapus_paket'])->name('hapus_paket');
    Route::post('/edit-paket', [PaketController::class, 'edit_paket'])->name('edit_paket');

    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    Route::post('/tambah-transaksi', [TransaksiController::class, 'tambah_transaksi'])->name('tambah_transaksi');
    Route::post('/hapus-transaksi', [TransaksiController::class, 'hapus_transaksi'])->name('hapus_transaksi');
    Route::post('/edit-transaksi', [TransaksiController::class, 'edit_transaksi'])->name('edit_transaksi');
    Route::get('/export-transaksi', [TransaksiController::class, 'export'])->name('export_transaksi');

    Route::get('/detailtransaksi', [DetailTransaksi::class, 'index'])->name('detailtransaksi');
    Route::get('/detailtransaksi/{id}', [DetailTransaksi::class, 'index']);
    Route::post('/tambah-detail/{id}', [DetailTransaksi::class, 'detail'])->name('detail');
});
