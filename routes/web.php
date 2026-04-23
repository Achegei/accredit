<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

Route::get('/', [PagesController::class, 'welcom']);
Route::get('/accreditation-pathways', [PagesController::class, 'accreditationPathways']);
Route::get('/the-gestaac-standard', [PagesController::class, 'theGestaacStandard']);
Route::get('/global-registry', [PagesController::class, 'globalRegistry']);
Route::get('/contact-authority', [PagesController::class, 'contactAuthority']);
