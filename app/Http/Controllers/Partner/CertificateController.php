<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CertificateService;
use App\Models\Course;
use App\Models\Student;

class CertificateController extends Controller
{
    public function store(Request $request, CertificateService $service)
    {
        // 1. Validate input
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id'  => 'required|exists:courses,id',
            'grade'      => 'nullable|string|max:50',
        ]);

        $user = auth()->user();

        // 2. Ensure user is partner
        if ($user->role !== 'partner') {
            abort(403, 'Unauthorized');
        }

        // 3. Ensure user has institution
        if (!$user->institution_id) {
            abort(403, 'No institution assigned');
        }

        $institutionId = $user->institution_id;

        // 4. Validate course belongs to institution
        $course = Course::where('id', $request->course_id)
            ->where('institution_id', $institutionId)
            ->first();

        if (!$course) {
            abort(403, 'Invalid course for your institution');
        }

        // 5. Validate student belongs to institution
        $student = Student::where('id', $request->student_id)
            ->where('institution_id', $institutionId)
            ->first();

        if (!$student) {
            abort(403, 'Invalid student for your institution');
        }

        // 6. Issue certificate via service
        $certificate = $service->issue([
            'student_id' => $student->id,
            'course_id'  => $course->id,
            'grade'      => $request->grade,
        ]);

        return response()->json([
            'message' => 'Certificate issued successfully',
            'data' => $certificate
        ]);
    }
}