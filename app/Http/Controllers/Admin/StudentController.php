<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\CertificateRequest;

class StudentController extends Controller
{
    public function search(Request $request)
    {
        $reg = $request->get('reg');

        if (!$reg) {
            return response()->json(['found' => false]);
        }

        // ✅ STEP 1: Find student
        $student = Student::where('registration_number', $reg)->first();

        if (!$student) {
            return response()->json(['found' => false]);
        }

        // ✅ STEP 2: Find APPROVED request
        $approved = CertificateRequest::with('course')
            ->where('student_id', $student->id)
            ->where('status', 'approved')
            ->latest()
            ->first();

        if (!$approved) {
            return response()->json([
                'found' => false,
                'message' => 'Student exists but NOT approved'
            ]);
        }

        // ✅ STEP 3: Return everything needed for issuing
        return response()->json([
            'found' => true,
            'id' => $student->id,
            'full_name' => $student->full_name,
            'registration_number' => $student->registration_number,
            'institution' => optional($student->institution)->name,

            // 🔥 CRITICAL DATA
            'course_id' => $approved->course_id,
            'course_name' => $approved->course?->name,
            'grade' => $approved->grade,
            'status' => $approved->status,
        ]);
    }
}