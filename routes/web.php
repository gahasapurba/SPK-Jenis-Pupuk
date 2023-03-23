<?php

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

    // datakriteria
    Route::get('/indexDataKriteria', [Admin\DataKriteriaController::class, 'index'])->name('indexDataKriteria');
    Route::get('/addDataKriteria', [Admin\DataKriteriaController::class, 'addDataKriteria'])->name('addDataKriteria');
    Route::get('/editDataKriteria', [Admin\DataKriteriaController::class, 'editDataKriteria'])->name('editDataKriteria');
    Route::get('/tambahData', [Admin\DataKriteriaController::class, 'ProsesTambahDataKriteria'])->name('tambahDataKriteria');
    Route::get('/editData', [Admin\DataKriteriaController::class, 'ProsesEditDataKriteria'])->name('ubahDataKriteria');
    Route::get('/hapusData', [Admin\DataKriteriaController::class, 'hapusData'])->name('hapusDataKriteria');

});

// Route Yang Hanya Bisa Diakses Oleh Pengguna Yang Rolenya User

Route::middleware(['auth','verified','isUser'])->group(function () {

    Route::get('/', [User\DashboardController::class, 'index']);

    // Route Dashboard User
    Route::resource('dashboard', User\DashboardController::class);

});


