<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * LIST STUDENTS
     */
    public function index()
    {
        $user = Auth::user();

        if (!$user || !$user->institution_id) {
            abort(403, 'Unauthorized or missing institution');
        }

        $students = Student::where('institution_id', $user->institution_id)
            ->latest()
            ->paginate(10); // Stripe-level pagination

        return view('partner.students.index', compact('students'));
    }

    /**
     * STORE STUDENT
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        if (!$user || !$user->institution_id) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'id_number' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|string|max:20',
            'nationality' => 'nullable|string|max:100',
            'registration_number' => 'nullable|string|max:100',
            'enrollment_date' => 'nullable|date',
        ]);

        Student::create([
            'institution_id' => $user->institution_id,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'id_number' => $request->id_number,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'nationality' => $request->nationality,
            'registration_number' => $request->registration_number
                ?: 'STU-' . now()->format('Ymd') . '-' . rand(1000, 9999),
            'enrollment_date' => $request->enrollment_date,
        ]);

        return redirect()->route('partner.students')
            ->with('success', 'Student added successfully');
    }

    /**
     * SHOW STUDENT
     */
    public function show($id)
    {
        $user = Auth::user();

        $student = Student::where('institution_id', $user->institution_id)
            ->findOrFail($id);

        return view('partner.students.show', compact('student'));
    }

    /**
     * EDIT STUDENT
     */
    public function edit($id)
    {
        $user = Auth::user();

        $student = Student::where('institution_id', $user->institution_id)
            ->findOrFail($id);

        return view('partner.students.edit', compact('student'));
    }

    /**
     * UPDATE STUDENT
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $student = Student::where('institution_id', $user->institution_id)
            ->findOrFail($id);

        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'id_number' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|string|max:20',
            'nationality' => 'nullable|string|max:100',
        ]);

        $student->update($request->only([
            'full_name',
            'email',
            'phone',
            'id_number',
            'date_of_birth',
            'gender',
            'nationality'
        ]));

        return redirect()->route('partner.students')
            ->with('success', 'Student updated successfully');
    }

    /**
     * DELETE STUDENT
     */
    public function destroy($id)
    {
        $user = Auth::user();

        $student = Student::where('institution_id', $user->institution_id)
            ->findOrFail($id);

        $student->delete();

        return redirect()->route('partner.students')
            ->with('success', 'Student deleted successfully');
    }

    /**
     * BULK UPLOAD
     */
    public function bulk(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,txt'
        ]);

        $file = fopen($request->file('file')->getRealPath(), 'r');

        $institutionId = auth()->user()->institution_id;

        $count = 0;

        fgetcsv($file); // skip header

        while (($row = fgetcsv($file)) !== false) {

            if (empty($row[0])) continue;

            Student::create([
                'institution_id' => $institutionId,
                'full_name' => $row[0] ?? null,
                'email' => $row[1] ?? null,
                'phone' => $row[2] ?? null,
                'id_number' => $row[3] ?? null,
                'date_of_birth' => $row[4] ?? null,
                'gender' => $row[5] ?? null,
                'nationality' => $row[6] ?? null,
                'registration_number' => $row[7]
                    ?: 'STU-' . now()->format('Ymd') . '-' . rand(1000, 9999),
                'enrollment_date' => $row[8] ?? null,
            ]);

            $count++;
        }

        fclose($file);

        return back()->with('success', "$count students uploaded successfully");
    }

    /**
     * TEMPLATE DOWNLOAD
     */
    public function template()
    {
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=students_template.csv",
        ];

        $callback = function () {
            $file = fopen('php://output', 'w');

            fputcsv($file, [
                'full_name',
                'email',
                'phone',
                'id_number',
                'date_of_birth',
                'gender',
                'nationality',
                'registration_number',
                'enrollment_date'
            ]);

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function search(Request $request)
{
    $request->validate([
        'reg' => 'required|string'
    ]);

    $student = Student::with('institution')
        ->where('registration_number', $request->reg)
        ->first();

    if (!$student) {
        return response()->json([
            'found' => false
        ]);
    }

    return response()->json([
        'found' => true,
        'id' => $student->id,
        'full_name' => $student->full_name,
        'registration_number' => $student->registration_number,
        'institution' => $student->institution?->name,
        'status' => $student->status
    ]);
}
}