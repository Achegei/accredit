<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| 🌐 PUBLIC PAGES
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ApplicationController as PublicApplicationController;

Route::get('/', [PagesController::class, 'welcome']);
Route::get('/accreditation-pathways', [PagesController::class, 'accreditationPathways']);
Route::get('/the-gestaac-standard', [PagesController::class, 'theGestaacStandard'])->name('the-gestaac-standard');
Route::get('/global-registry', [PagesController::class, 'globalRegistry']);
Route::get('/contact-authority', [PagesController::class, 'contactAuthority']);
Route::get('/apply', [PagesController::class, 'apply'])->name('apply');
Route::post('/applications', [PublicApplicationController::class, 'store'])->name('applications.store');

/*
|--------------------------------------------------------------------------
| 🔐 AUTH SYSTEM
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| 🔎 PUBLIC VERIFICATION SYSTEM
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Public\VerificationController;

// UI page (both forms live here)
Route::get('/verify', [VerificationController::class, 'form'])->name('verify.form');

// unified search endpoint (ONLY ONE entry point)
Route::get('/verify/search', [VerificationController::class, 'search'])->name('verify.search');

/*
|--------------------------------------------------------------------------
| 🏢 PARTNER AREA (AUTH REQUIRED)
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Partner\DashboardController as PartnerDashboard;
use App\Http\Controllers\Partner\StudentController;
use App\Http\Controllers\Partner\CourseController;
use App\Http\Controllers\Partner\CertificateController;

Route::prefix('partner')
    ->middleware(['auth'])
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [PartnerDashboard::class, 'index'])
            ->name('partner.dashboard');

        // Students
        Route::get('/students', [StudentController::class, 'index']);
        Route::post('/students', [StudentController::class, 'store']);

        // Courses
        Route::get('/courses', [CourseController::class, 'index']);
        Route::post('/courses', [CourseController::class, 'store']);

        // Certificates
        Route::get('/certificates', [CertificateController::class, 'index']);
        Route::post('/certificates', [CertificateController::class, 'store']);
    });

/*
|--------------------------------------------------------------------------
| 🔐 ADMIN AUTH
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Admin\AuthController as AdminAuth;

Route::prefix('admin')->group(function () {

    Route::get('/login', [AdminAuth::class, 'showLogin'])
        ->name('admin.login');

    Route::post('/login', [AdminAuth::class, 'login'])
        ->name('admin.login.post');

    Route::post('/logout', [AdminAuth::class, 'logout'])
        ->name('admin.logout');
});

/*
|--------------------------------------------------------------------------
| 🏢 ADMIN PANEL (PROTECTED)
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\ApplicationController as AdminApplicationController;

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [AdminDashboard::class, 'index'])
            ->name('admin.dashboard');

        // Applications workflow
        Route::get('/applications', [AdminApplicationController::class, 'index'])
            ->name('admin.applications.index');

        Route::get('/applications/{id}', [AdminApplicationController::class, 'show'])
            ->name('admin.applications.show');

        Route::post('/applications/{id}/approve', [AdminApplicationController::class, 'approve'])
            ->name('admin.applications.approve');

        Route::post('/applications/{id}/reject', [AdminApplicationController::class, 'reject'])
            ->name('admin.applications.reject');
    });