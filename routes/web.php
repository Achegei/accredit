<?php

use Illuminate\Support\Facades\Route;
use App\Models\Institution;
use App\Models\User;
use App\Http\Controllers\Admin\AdminInstitutionController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
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
| 🔎 PUBLIC VERIFICATION
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Public\VerificationController;

Route::get('/verify', [VerificationController::class, 'form'])->name('verify.form');
Route::get('/verify/search', [VerificationController::class, 'search'])->name('verify.search');


/*
|--------------------------------------------------------------------------
| 🏢 PARTNER AREA
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Partner\DashboardController as PartnerDashboard;
use App\Http\Controllers\Partner\StudentController as PartnerStudentController;
use App\Http\Controllers\Partner\CourseController;
use App\Http\Controllers\Partner\CertificateController as PartnerCertificateController;

Route::prefix('partner')
    ->middleware(['auth'])
    ->group(function () {

        Route::get('/dashboard', [PartnerDashboard::class, 'index'])
            ->name('partner.dashboard');

        Route::get('/students', [PartnerStudentController::class, 'index'])
            ->name('partner.students');

        Route::post('/students', [PartnerStudentController::class, 'store'])
            ->name('partner.students.store');

        Route::post('/students/bulk', [PartnerStudentController::class, 'bulk'])
            ->name('partner.students.bulk');

        Route::get('/students/template', [PartnerStudentController::class, 'template'])
            ->name('partner.students.template');

        Route::get('/students/{student}', [PartnerStudentController::class, 'show'])
            ->name('partner.students.show');

        Route::get('/students/{student}/edit', [PartnerStudentController::class, 'edit'])
            ->name('partner.students.edit');

        Route::put('/students/{student}', [PartnerStudentController::class, 'update'])
            ->name('partner.students.update');

        Route::delete('/students/{student}', [PartnerStudentController::class, 'destroy'])
            ->name('partner.students.destroy');

        Route::get('/courses', [CourseController::class, 'index']);
        Route::post('/courses', [CourseController::class, 'store']);

        /*
        | Certificates issued by partner (requests to admin system)
        */
        Route::get('/certificates', [PartnerCertificateController::class, 'index'])
            ->name('partner.certificates.index');

        Route::post('/certificates', [PartnerCertificateController::class, 'store'])
            ->name('partner.certificates.store');

            /*
        |--------------------------------------------------------------------------
        | 🔁 RESUBMIT REJECTED CERTIFICATE REQUEST
        |--------------------------------------------------------------------------
        */
        Route::post('/certificate-requests/{id}/resubmit',
            [PartnerCertificateController::class, 'resubmit']
        )->name('partner.certificates.resubmit');

    });


/*
|--------------------------------------------------------------------------
| 🔐 ADMIN AUTH
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Admin\AuthController as AdminAuth;

Route::prefix('admin')->group(function () {

    Route::get('/login', [AdminAuth::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminAuth::class, 'login'])->name('admin.login.post');
    Route::post('/logout', [AdminAuth::class, 'logout'])->name('admin.logout');
});


/*
|--------------------------------------------------------------------------
| 🏢 ADMIN PANEL (PROTECTED)
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\ApplicationController as AdminApplicationController;
use App\Http\Controllers\Admin\CertificateRequestController;

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | 📊 DASHBOARD
        |--------------------------------------------------------------------------
        */
        Route::get('/dashboard', [AdminDashboard::class, 'index'])
            ->name('admin.dashboard');


        /*
        |--------------------------------------------------------------------------
        | 📝 APPLICATIONS
        |--------------------------------------------------------------------------
        */
        Route::get('/applications', [AdminApplicationController::class, 'index'])
            ->name('admin.applications.index');

        Route::get('/applications/{id}', [AdminApplicationController::class, 'show'])
            ->name('admin.applications.show');

        Route::post('/applications/{id}/approve', [AdminApplicationController::class, 'approve'])
            ->name('admin.applications.approve');

        Route::post('/applications/{id}/reject', [AdminApplicationController::class, 'reject'])
            ->name('admin.applications.reject');


        /*
        |--------------------------------------------------------------------------
        | 🏫 INSTITUTIONS
        |--------------------------------------------------------------------------
        */
        
        Route::get('/institutions', [AdminInstitutionController::class, 'index'])
            ->name('admin.institutions.index');

        Route::get('/institutions/{id}', [AdminInstitutionController::class, 'show'])
            ->name('admin.institutions.show');

        Route::post('/institutions/{id}/courses', [AdminInstitutionController::class, 'addCourse'])
            ->name('admin.institutions.courses.add');

        Route::delete('/institutions/{id}/courses/{courseId}', [AdminInstitutionController::class, 'removeCourse'])
            ->name('admin.institutions.courses.remove');

        Route::delete('/institutions/{id}', [AdminInstitutionController::class, 'destroy'])
            ->name('admin.institutions.delete');


        /*
        |--------------------------------------------------------------------------
        | 🤝 PARTNERS
        |--------------------------------------------------------------------------
        */
        Route::get('/partners', [PartnerController::class, 'partners'])
            ->name('admin.partners.index');
        Route::get('/partners/{id}', [PartnerController::class, 'show'])
            ->name('admin.partners.show');

        Route::get('/partners/{id}/edit', [PartnerController::class, 'edit'])
            ->name('admin.partners.edit');

        Route::put('/partners/{id}', [PartnerController::class, 'update'])
            ->name('admin.partners.update');

        Route::delete('/partners/{id}', [PartnerController::class, 'destroy'])
            ->name('admin.partners.destroy');


        /*
        |--------------------------------------------------------------------------
        | 📜 CERTIFICATE REQUEST SYSTEM (FIXED + CLEAN)
        |--------------------------------------------------------------------------
        */

        // View partner requests (PENDING APPROVAL)
        Route::get('/certificate-requests', [CertificateRequestController::class, 'requests'])
            ->name('admin.certificates.requests');
        Route::get('/certificate-requests/{id}', [CertificateRequestController::class, 'show'])
            ->name('admin.certificates.show');

        // Approve single request
        Route::post('/certificate-requests/{id}/approve', [CertificateRequestController::class, 'approve'])
            ->name('admin.certificates.approve');

        // Reject single request (with comment)
        Route::post('/certificate-requests/{id}/reject', [CertificateRequestController::class, 'reject'])
            ->name('admin.certificates.reject');

        // Bulk approve/reject
        Route::post('/certificate-requests/bulk', [CertificateRequestController::class, 'bulk'])
            ->name('admin.certificates.bulk');


        /*
        |--------------------------------------------------------------------------
        | 🎓 ISSUED CERTIFICATES (FINAL CERTS TABLE)
        |--------------------------------------------------------------------------
        */
        Route::get('/certificates', [CertificateRequestController::class, 'index'])
            ->name('admin.certificates.index');

        Route::post('/certificates/{id}/revoke', [CertificateRequestController::class, 'revoke'])
            ->name('admin.certificates.revoke');

        Route::get('/certificates/create', [CertificateRequestController::class, 'create'])
            ->name('admin.certificates.create');

        Route::post('/certificates/issue', [CertificateRequestController::class, 'issue'])
            ->name('admin.certificates.issue');

        // Student search for certificate verification
        Route::get('students/search', [AdminStudentController::class, 'search']);
    });