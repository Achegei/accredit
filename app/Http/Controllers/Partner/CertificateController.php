<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\CertificateRequest;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class CertificateController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LIST BATCHES (COHORTS)
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $user = auth()->user();

        $requests = CertificateRequest::with(['student', 'course'])
            ->where('institution_id', $user->institution_id)
            ->latest()
            ->get()
            ->groupBy('cohort_name');

        return view('partner.certificates.index', compact('requests'));
    }

    /*
    |--------------------------------------------------------------------------
    | STORE BULK UPLOAD
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $user = Auth::user();

        if (!$user || !$user->institution_id) {
            abort(403);
        }

        $request->validate([
            'file' => 'required|mimes:csv,xlsx,xls',
            'cohort_name' => 'nullable|string|max:255',
        ]);

        $cohortName = $request->cohort_name ?? 'Batch ' . now()->format('Y-m-d H:i');
        $batchId = 'batch_' . sha1($cohortName . microtime(true));

        try {
            $rows = Excel::toArray([], $request->file('file'))[0];

            foreach ($rows as $index => $row) {

                if ($index === 0) continue; // skip header

                $fullName = trim($row[0] ?? '');
                $email = trim($row[1] ?? '');
                $registrationNumber = trim($row[2] ?? '');
                $courseName = trim($row[3] ?? '');
                $grade = trim($row[4] ?? '');

                // ✅ STRICT VALIDATION
                if (!$registrationNumber || !$courseName) {
                    continue;
                }

                // ✅ CREATE / UPDATE STUDENT USING REG NUMBER
                $student = Student::updateOrCreate(
                    [
                        'registration_number' => $registrationNumber,
                        'institution_id' => $user->institution_id
                    ],
                    [
                        'full_name' => $fullName ?: 'Unnamed Student',
                        'email' => $email ?: null,
                    ]
                );

                // ✅ FIND COURSE
                $course = Course::where('name', $courseName)->first();
                if (!$course) continue;

                // ✅ CREATE REQUEST
                CertificateRequest::create([
                    'student_id' => $student->id,
                    'course_id' => $course->id,
                    'institution_id' => $user->institution_id,
                    'grade' => $grade,
                    'status' => 'pending',
                    'cohort_name' => $cohortName,
                    'batch_id' => $batchId,
                ]);
            }

            return back()->with('success', 'Bulk upload processed successfully.');

        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /*
    |--------------------------------------------------------------------------
    | RESUBMIT
    |--------------------------------------------------------------------------
    */
    public function resubmit($id)
    {
        $req = CertificateRequest::where('id', $id)
            ->where('institution_id', auth()->user()->institution_id)
            ->firstOrFail();

        if ($req->status !== 'rejected') {
            return back()->with('error', 'Only rejected requests can be resubmitted.');
        }

        $req->update([
            'status' => 'pending',
            'resubmission_count' => ($req->resubmission_count ?? 0) + 1
        ]);

        return back()->with('success', 'Resubmitted successfully.');
    }
}