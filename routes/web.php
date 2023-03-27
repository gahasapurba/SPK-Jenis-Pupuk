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

Auth::routes(['verify' => true]);

// Route Yang Hanya Bisa Diakses Oleh Pengguna Yang Rolenya Administrator
Route::middleware(['auth','verified','isAdmin'])->group(function () {

    // Route Dashboard Admin
    Route::resource('admin', Admin\AdminController::class);

    // datakriteria
    Route::get('/indexDataKriteria', [Admin\DataKriteriaController::class, 'index'])->name('indexDataKriteria');
    Route::get('/addDataKriteria', [Admin\DataKriteriaController::class, 'addDataKriteria'])->name('addDataKriteria');
    Route::get('/editDataKriteria/{id}', [Admin\DataKriteriaController::class, 'editDataKriteria'])->name('editDataKriteria');
    Route::post('/tambahData', [Admin\DataKriteriaController::class, 'ProsesTambahDataKriteria'])->name('tambahDataKriteria');
    Route::post('/editData', [Admin\DataKriteriaController::class, 'ProsesEditDataKriteria'])->name('ubahDataKriteria');
    Route::post('/hapusData', [Admin\DataKriteriaController::class, 'hapusData'])->name('hapusDataKriteria');

    // data subkriteria
    Route::get('/indexSubkriteria', [Admin\SubkriteriaController::class, "index"])->name("indexSubkriteria");
    Route::post('/tambahSubkriteria', [Admin\SubkriteriaController::class, 'prosesAddData'])->name('addSubriteria');
    Route::post('/editSubkriteria', [Admin\SubkriteriaController::class, 'editSubkriteria'])->name('editSubkriteria');
    Route::post('/hapusSubkriteria', [Admin\SubkriteriaController::class, 'hapusSubkriteria'])->name('hapusSubkriteria');

    // data alternatif
    Route::get('/indexAlternatif', [Admin\AlternatifController::class, 'index'])->name('indexAlternatif');
    Route::get('/pagesAddAlternatif', [Admin\AlternatifController::class, 'pagesAddData'])->name('pagesAddAlternatif');
    Route::post('/addDataAlternatif', [Admin\AlternatifController::class, 'addData'])->name('addDataAlternatif');
    Route::get('/pagesEditAlternatif/{id}', [Admin\AlternatifController::class, 'pagesEditAlternatif'])->name('pagesEditAlternatif');
    Route::post('editAlternatif', [Admin\AlternatifController::class, 'editData'])->name('editAlternatif');
    Route::post('deleteAlternatif', [Admin\AlternatifController::class, 'delateData'])->name('deleteAlternatif');
});

// Route Yang Hanya Bisa Diakses Oleh Pengguna Yang Rolenya User

Route::middleware(['auth','verified','isUser'])->group(function () {

    Route::get('/', [User\DashboardController::class, 'index']);

    // Route Dashboard User
    Route::resource('dashboard', User\DashboardController::class);

});
