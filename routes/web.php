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

// Route Yang Hanya Bisa Diakses Oleh Pengguna Yang Sudah Login, Terverifikasi, dan Rolenya Administrator

Route::middleware(['auth','verified','isAdmin'])->group(function () {

    // Route List DataTables

        // Kriteria
        Route::get('admin-criteria-list', [Admin\CriteriaController::class, 'listCriteria']);

        // Subkriteria
        Route::get('admin-subcriteria-list', [Admin\SubcriteriaController::class, 'listSubcriteria']);

        // Alternatif
        Route::get('admin-alternative-list', [Admin\AlternativeController::class, 'listAlternative']);

        // Penilaian
        Route::get('admin-assessment-list', [Admin\AssessmentController::class, 'listAssessment']);

        // Pengguna
        Route::get('admin-user-list', [Admin\UserController::class, 'listUser']);

    // Route Trash DataTables

        // Kriteria
        Route::get('admin-criteria-trash', [Admin\CriteriaController::class, 'trashCriteria']);

        // Subkriteria
        Route::get('admin-subcriteria-trash', [Admin\SubcriteriaController::class, 'trashSubcriteria']);

        // Alternatif
        Route::get('admin-alternative-trash', [Admin\AlternativeController::class, 'trashAlternative']);

        // Penilaian
        Route::get('admin-assessment-trash', [Admin\AssessmentController::class, 'trashAssessment']);

        // Pengguna
        Route::get('admin-user-trash', [Admin\UserController::class, 'trashUser']);

    // Route Controller
    Route::prefix('admin')->name('admin.')->group(function () {

        // Kriteria
        Route::get('criteria/trash', [Admin\CriteriaController::class, 'trash'])->name('criteria.trash');
        Route::resource('criteria', Admin\CriteriaController::class);
        Route::get('criteria/{criteria}/restore', [Admin\CriteriaController::class, 'restore'])->name('criteria.restore');
        Route::delete('criteria/{criteria}/kill', [Admin\CriteriaController::class, 'kill'])->name('criteria.kill');

        // Subkriteria
        Route::get('subcriteria/trash', [Admin\SubcriteriaController::class, 'trash'])->name('subcriteria.trash');
        Route::resource('subcriteria', Admin\SubcriteriaController::class);
        Route::get('subcriteria/{subcriteria}/restore', [Admin\SubcriteriaController::class, 'restore'])->name('subcriteria.restore');
        Route::delete('subcriteria/{subcriteria}/kill', [Admin\SubcriteriaController::class, 'kill'])->name('subcriteria.kill');

        // Alternatif
        Route::get('alternative/trash', [Admin\AlternativeController::class, 'trash'])->name('alternative.trash');
        Route::resource('alternative', Admin\AlternativeController::class);
        Route::get('alternative/{alternative}/restore', [Admin\AlternativeController::class, 'restore'])->name('alternative.restore');
        Route::delete('alternative/{alternative}/kill', [Admin\AlternativeController::class, 'kill'])->name('alternative.kill');

        // Penilaian
        Route::get('assessment/trash', [Admin\AssessmentController::class, 'trash'])->name('assessment.trash');
        Route::resource('assessment', Admin\AssessmentController::class);
        Route::get('assessment/{assessment}/restore', [Admin\AssessmentController::class, 'restore'])->name('assessment.restore');
        Route::delete('assessment/{assessment}/kill', [Admin\AssessmentController::class, 'kill'])->name('assessment.kill');

        // Pengguna
        Route::get('user/trash', [Admin\UserController::class, 'trash'])->name('user.trash');
        Route::resource('user', Admin\UserController::class);
        Route::get('user/{user}/restore', [Admin\UserController::class, 'restore'])->name('user.restore');
        Route::delete('user/{user}/kill', [Admin\UserController::class, 'kill'])->name('user.kill');

    });

    // Route Dashboard Admin
    Route::resource('admin', Admin\AdminController::class);

});

// Route Yang Hanya Bisa Diakses Oleh Pengguna Yang Sudah Login, Terverifikasi, dan Rolenya User

Route::middleware(['auth','verified','isUser'])->group(function () {

    Route::get('/', [User\DashboardController::class, 'index']);

    // Route Controller
    Route::prefix('dashboard')->name('dashboard.')->group(function () {

        // Profil
        Route::resource('user', User\UserController::class);

    });

    // Route Dashboard User
    Route::resource('dashboard', User\DashboardController::class);

});
