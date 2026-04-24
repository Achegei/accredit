<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $institutionId = auth()->user()->institution_id;

        return Student::where('institution_id', $institutionId)
            ->latest()
            ->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'nullable|email',
            'id_number' => 'nullable|string',
        ]);

        $student = Student::create([
            'institution_id' => auth()->user()->institution_id,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'id_number' => $request->id_number,
        ]);

        return response()->json([
            'message' => 'Student created',
            'data' => $student
        ]);
    }
}