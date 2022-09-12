<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('/login');
});

Auth::routes();
Route::post('/login-handler', [App\Http\Controllers\AuthController::class, 'loginHandler'])->name('loginHandler');
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

// Route Dashboard //
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route Aktiva //
Route::get('/data-aktiva', [App\Http\Controllers\Aktiva\AktivaController::class, 'index'])->name('aktiva');
Route::get('/tambah/data-aktiva', [App\Http\Controllers\Aktiva\AktivaController::class, 'tambah'])->name('tambah.aktiva');
Route::post('/simpan/data-aktiva', [App\Http\Controllers\Aktiva\AktivaController::class, 'simpan'])->name('simpan.aktiva');
Route::get('/edit/data-aktiva={id}', [App\Http\Controllers\Aktiva\AktivaController::class, 'edit'])->name('edit.aktiva');
Route::post('/update/data-aktiva', [App\Http\Controllers\Aktiva\AktivaController::class, 'update'])->name('update.aktiva');
Route::post('/hapus/data-aktiva={id}', [App\Http\Controllers\Aktiva\AktivaController::class, 'delete'])->name('delete.aktiva');

// Route Input Aktiva //
Route::get('/laporan-aktiva', [App\Http\Controllers\Aktiva\LaporanAktivaController::class, 'index'])->name('laporan.aktiva');
Route::get('/tambah/laporan-aktiva', [App\Http\Controllers\Aktiva\LaporanAktivaController::class, 'tambah'])->name('tambah.laporan.aktiva');
Route::post('/simpan/laporan-aktiva', [App\Http\Controllers\Aktiva\LaporanAktivaController::class, 'simpan'])->name('simpan.laporan.aktiva');
Route::get('/edit/laporan-aktiva={id}', [App\Http\Controllers\Aktiva\LaporanAktivaController::class, 'edit'])->name('edit.laporan.aktiva');
Route::post('/update/laporan-aktiva={id}', [App\Http\Controllers\Aktiva\LaporanAktivaController::class, 'update'])->name('update.laporan.aktiva');
Route::post('/hapus/laporan-aktiva={id}', [App\Http\Controllers\Aktiva\LaporanAktivaController::class, 'delete'])->name('delete.laporan.aktiva');
Route::get('/export/laporan-aktiva', [App\Http\Controllers\Aktiva\LaporanAktivaController::class, 'export'])->name('export.laporan.aktiva');



// Route Inventaris //
Route::get('/data-inventaris', [App\Http\Controllers\Inventaris\InventarisController::class, 'index'])->name('inventaris');
Route::get('/tambah/data-inventaris', [App\Http\Controllers\Inventaris\InventarisController::class, 'tambah'])->name('tambah.inventaris');
Route::post('/simpan/data-inventaris', [App\Http\Controllers\Inventaris\InventarisController::class, 'simpan'])->name('simpan.inventaris');
Route::get('/edit/data-inventaris={id}', [App\Http\Controllers\Inventaris\InventarisController::class, 'edit'])->name('edit.inventaris');
Route::post('/update/data-inventaris', [App\Http\Controllers\Inventaris\InventarisController::class, 'update'])->name('update.inventaris');
Route::post('/hapus/data-inventaris={id}', [App\Http\Controllers\Inventaris\InventarisController::class, 'delete'])->name('delete.inventaris');

// Route Laporan Inventaris //
Route::get('/laporan-inventaris', [App\Http\Controllers\Inventaris\LaporanInventarisController::class, 'index'])->name('laporan.inventaris');
Route::get('/tambah/laporan-inventaris', [App\Http\Controllers\Inventaris\LaporanInventarisController::class, 'tambah'])->name('tambah.laporan.inventaris');
Route::post('/simpan/laporan-inventaris', [App\Http\Controllers\Inventaris\LaporanInventarisController::class, 'simpan'])->name('simpan.laporan.inventaris');
Route::get('/edit/laporan-inventaris={id}', [App\Http\Controllers\Inventaris\LaporanInventarisController::class, 'edit'])->name('edit.laporan.inventaris');
Route::post('/update/laporan-inventaris={id}', [App\Http\Controllers\Inventaris\LaporanInventarisController::class, 'update'])->name('update.laporan.inventaris');
Route::post('/hapus/laporan-inventaris={id}', [App\Http\Controllers\Inventaris\LaporanInventarisController::class, 'delete'])->name('delete.laporan.inventaris');
Route::get('/export/laporan-inventaris', [App\Http\Controllers\Inventaris\LaporanInventarisController::class, 'export'])->name('export.laporan.inventaris');
