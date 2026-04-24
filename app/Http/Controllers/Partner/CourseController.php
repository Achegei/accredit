<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        return Course::where('institution_id', auth()->user()->institution_id)
            ->latest()
            ->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'code' => 'nullable|string',
            'duration' => 'nullable|string',
        ]);

        $course = Course::create([
            'institution_id' => auth()->user()->institution_id,
            'name' => $request->name,
            'code' => $request->code,
            'duration' => $request->duration,
            'accreditation_status' => 'approved',
        ]);

        return response()->json([
            'message' => 'Course created',
            'data' => $course
        ]);
    }
}