<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Institution;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'applications' => Application::count(),
            'institutions' => Institution::count(),
            'partners' => User::where('role', 'partner')->count(),
        ]);
    }
}