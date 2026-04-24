<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Course;
use App\Models\Certificate;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user || !$user->institution_id) {
            abort(403, 'Unauthorized or missing institution');
        }

        $institutionId = $user->institution_id;

        $students = Student::where('institution_id', $institutionId)->count();

        $courses = Course::where('institution_id', $institutionId)->count();

        $certificates = Certificate::whereHas('course', function ($q) use ($institutionId) {
            $q->where('institution_id', $institutionId);
        })->count();

        return view('partner.dashboard', compact(
            'students',
            'courses',
            'certificates'
        ));
    }
}