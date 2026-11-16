<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PregnancyController;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\PosyanduScheduleController;
use App\Http\Controllers\PosyanduRegistrationController;
use App\Http\Controllers\ExaminationController;
use App\Http\Controllers\Admin\EducationController as AdminEducationController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\Admin\ReportController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])
        ->middleware('throttle:5,1')
        ->name('login.post');

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store'])->name('register.post');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('user.dashboard');
    })->name('dashboard');

    Route::get('/admin/dashboard', function () {
        abort_unless(auth()->user()->role === 'admin', 403);

        return view('dashboard.admin');
    })->name('admin.dashboard');

    Route::get('/user/dashboard', function () {
        abort_unless(auth()->user()->role === 'user', 403);

        return view('dashboard.user');
    })->name('user.dashboard');

    // Data Ibu Hamil
Route::get('/data-ibu-hamil', [PregnancyController::class, 'index'])
    ->name('pregnancies.index');

Route::get('/data-ibu-hamil/tambah', [PregnancyController::class, 'create'])
    ->name('pregnancies.create');

Route::post('/data-ibu-hamil', [PregnancyController::class, 'store'])
    ->name('pregnancies.store');
});

// Data Bayi & Anak
Route::get('/data-anak', [ChildController::class, 'index'])
    ->name('children.index');

Route::get('/data-anak/tambah', [ChildController::class, 'create'])
    ->name('children.create');

Route::post('/data-anak', [ChildController::class, 'store'])
    ->name('children.store');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('admin.dashboard');


/* JADWAL POSYANDU */

// Admin
Route::get('/admin/jadwal-posyandu', [PosyanduScheduleController::class, 'index'])
    ->name('admin.schedules.index');

Route::get('/admin/jadwal-posyandu/create', [PosyanduScheduleController::class, 'create'])
    ->name('admin.schedules.create');

Route::post('/admin/jadwal-posyandu', [PosyanduScheduleController::class, 'store'])
    ->name('admin.schedules.store');

Route::get('/admin/jadwal-posyandu/{schedule}/edit', [PosyanduScheduleController::class, 'edit'])
    ->name('admin.schedules.edit');

Route::put('/admin/jadwal-posyandu/{schedule}', [PosyanduScheduleController::class, 'update'])
    ->name('admin.schedules.update');

Route::delete('/admin/jadwal-posyandu/{schedule}', [PosyanduScheduleController::class, 'destroy'])
    ->name('admin.schedules.destroy');

// Masyarakat
Route::get('/jadwal-posyandu', [PosyanduScheduleController::class, 'publicIndex'])
    ->name('schedules.index');


    // Pendaftaran Orang Tua
    Route::get('/pendaftaran', [PosyanduRegistrationController::class, 'index'])
        ->name('registrations.index');

    Route::get('/pendaftaran/create', [PosyanduRegistrationController::class, 'create'])
        ->name('registrations.create');

    Route::post('/pendaftaran', [PosyanduRegistrationController::class, 'store'])
        ->name('registrations.store');

    // Pendaftaran Admin - hanya melihat dan memproses
    Route::get('/admin/pendaftaran', [PosyanduRegistrationController::class, 'adminIndex'])
        ->name('admin.registrations.index');

    Route::patch('/admin/pendaftaran/{registration}/status', [PosyanduRegistrationController::class, 'updateStatus'])
        ->name('admin.registrations.update-status');

        // PEMERIKSAAN ADMIN

Route::get('/admin/pemeriksaan', [ExaminationController::class, 'adminIndex'])
    ->name('admin.examinations.index');

Route::get('/admin/pemeriksaan/tambah/{registration}', [ExaminationController::class, 'create'])
    ->name('admin.examinations.create');

Route::post('/admin/pemeriksaan', [ExaminationController::class, 'store'])
    ->name('admin.examinations.store');

Route::get('/admin/pemeriksaan/{examination}', [ExaminationController::class, 'show'])
    ->name('admin.examinations.show');

Route::get('/admin/pemeriksaan/{examination}/edit', [ExaminationController::class, 'edit'])
    ->name('admin.examinations.edit');

Route::put('/admin/pemeriksaan/{examination}', [ExaminationController::class, 'update'])
    ->name('admin.examinations.update');

Route::delete('/admin/pemeriksaan/{examination}', [ExaminationController::class, 'destroy'])
    ->name('admin.examinations.destroy');


// PEMERIKSAAN ORANG TUA

Route::get('/pemeriksaan-saya', [ExaminationController::class, 'parentIndex'])
    ->name('examinations.parent-index');

    /*
|--------------------------------------------------------------------------
| EDUKASI KESEHATAN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // EDUKASI ADMIN
    Route::prefix('admin/edukasi')
        ->name('admin.educations.')
        ->group(function () {

            Route::get('/', [AdminEducationController::class, 'index'])
                ->name('index');

            Route::get('/tambah', [AdminEducationController::class, 'create'])
                ->name('create');

            Route::post('/', [AdminEducationController::class, 'store'])
                ->name('store');

            Route::get('/{education}/edit', [AdminEducationController::class, 'edit'])
                ->name('edit');

            Route::put('/{education}', [AdminEducationController::class, 'update'])
                ->name('update');

            Route::delete('/{education}', [AdminEducationController::class, 'destroy'])
                ->name('destroy');
        });

    // EDUKASI ORANG TUA
    Route::get('/edukasi', [EducationController::class, 'index'])
        ->name('educations.index');

    Route::get('/edukasi/{education}', [EducationController::class, 'show'])
        ->name('educations.show');

    // LAPORAN ADMIN SABITA
Route::get('/admin/laporan', [ReportController::class, 'index'])
    ->name('admin.reports.index');

Route::get('/admin/laporan/export', [ReportController::class, 'export'])
    ->name('admin.reports.export');    
});