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


// Route Dashboard //
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route Aktiva //
Route::get('/data-aktiva', [App\Http\Controllers\AktivaController::class, 'index'])->name('aktiva');
Route::get('/tambah/data-aktiva', [App\Http\Controllers\AktivaController::class, 'tambah'])->name('tambah.aktiva');
Route::post('/simpan/data-aktiva', [App\Http\Controllers\AktivaController::class, 'simpan'])->name('simpan.aktiva');
Route::get('/edit/data-aktiva/{id}', [App\Http\Controllers\AktivaController::class, 'edit'])->name('edit.aktiva');
