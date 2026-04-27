<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if (!$user || !$user->institution_id) {
            abort(403, 'Unauthorized');
        }

        $courses = Course::where('institution_id', $user->institution_id)
            ->latest()
            ->get();

        return view('partner.courses.index', compact('courses'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        if (!$user || !$user->institution_id) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'nullable|string|max:50',
            'duration' => 'nullable|string|max:50',
        ]);

        Course::create([
            'institution_id' => $user->institution_id,
            'name' => $request->name,
            'code' => $request->code,
            'duration' => $request->duration,
            'accreditation_status' => 'approved',
        ]);

        return back()->with('success', 'Course created successfully');
    }
}