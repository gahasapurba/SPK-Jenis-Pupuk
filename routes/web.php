<?php

use App\Http\Controllers\DataKriteriaController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

// Route Autentikasi

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// dashboard admin
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboardAdmin');

// datakriteria
Route::get('/indexDataKriteria', [DataKriteriaController::class, 'index'])->name('indexDataKriteria');
Route::get('/addDataKriteria', [DataKriteriaController::class, 'addDataKriteria'])->name('addDataKriteria');
Route::get('/editDataKriteria', [DataKriteriaController::class, 'editDataKriteria'])->name('editDataKriteria');
Route::get('/tambahData', [DataKriteriaController::class, 'ProsesTambahDataKriteria'])->name('tambahDataKriteria');
Route::get('/editData', [DataKriteriaController::class, 'ProsesEditDataKriteria'])->name('ubahDataKriteria');
Route::get('/hapusData', [DataKriteriaController::class, 'hapusData'])->name('hapusDataKriteria');
