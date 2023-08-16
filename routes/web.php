<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\KeteranganController;

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

Route::get('/home', function () {
    return view('dashboard.home');
});


Route::get('/keterangan/create/{rek_medis}', [KeteranganController::class, 'create'])->name('keterangan.create');
Route::resource('/datapasien', PasienController::class)->names('datpas');
Route::get('/datapasien/{rek_medis}', [PasienController::class, 'show'])->name('datapasien.show');
Route::resource('/keterangan', KeteranganController::class)->names('ketpas');
