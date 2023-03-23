<?php

use App\Http\Controllers\DataKriteriaController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin as Admin;
use App\Http\Controllers\User as User;

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

// Route Autentikasi

Auth::routes();

// Route Yang Hanya Bisa Diakses Oleh Pengguna Yang Rolenya Administrator
Route::middleware(['auth','verified','isAdmin'])->group(function () {

    // Route Dashboard Admin
    Route::resource('admin', Admin\AdminController::class);

});

// Route Yang Hanya Bisa Diakses Oleh Pengguna Yang Rolenya User

Route::middleware(['auth','verified','isUser'])->group(function () {

    Route::get('/', [User\DashboardController::class, 'index']);

    // Route Dashboard User
    Route::resource('dashboard', User\DashboardController::class);

});

// datakriteria
Route::get('/indexDataKriteria', [DataKriteriaController::class, 'index'])->name('indexDataKriteria');
Route::get('/addDataKriteria', [DataKriteriaController::class, 'addDataKriteria'])->name('addDataKriteria');
Route::get('/editDataKriteria', [DataKriteriaController::class, 'editDataKriteria'])->name('editDataKriteria');
Route::get('/tambahData', [DataKriteriaController::class, 'ProsesTambahDataKriteria'])->name('tambahDataKriteria');
Route::get('/editData', [DataKriteriaController::class, 'ProsesEditDataKriteria'])->name('ubahDataKriteria');
Route::get('/hapusData', [DataKriteriaController::class, 'hapusData'])->name('hapusDataKriteria');
