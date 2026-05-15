<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentAccreditationApplication;

class StudentAccreditationController extends Controller
{
    /**
     * Show application form
     */
    public function create()
    {
        return view('student-accreditation.create');
    }

    /**
     * Store application
     */
    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | ✅ VALIDATION
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([

            // Student details
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'nationality' => 'nullable|string|max:255',

            // Academic details
            'institution_name' => 'required|string|max:255',
            'course_name' => 'required|string|max:255',
            'award_received' => 'required|string|max:255',
            'graduation_date' => 'nullable|date',
            'study_mode' => 'nullable|string',
            'student_number' => 'nullable|string|max:255',

            // Institution contacts
            'institution_email' => 'nullable|email',
            'institution_phone' => 'nullable|string|max:255',
            'institution_website' => 'nullable|string|max:255',
            'registrar_name' => 'nullable|string|max:255',

            // Files
            'certificate' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'transcript' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'id_document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        /*
        |--------------------------------------------------------------------------
        | 📂 FILE UPLOADS
        |--------------------------------------------------------------------------
        */

        $certificatePath = null;
        $transcriptPath = null;
        $idDocumentPath = null;

        if ($request->hasFile('certificate')) {
            $certificatePath = $request->file('certificate')
                ->store('student-accreditation/certificates', 'public');
        }

        if ($request->hasFile('transcript')) {
            $transcriptPath = $request->file('transcript')
                ->store('student-accreditation/transcripts', 'public');
        }

        if ($request->hasFile('id_document')) {
            $idDocumentPath = $request->file('id_document')
                ->store('student-accreditation/id-documents', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | 💾 SAVE APPLICATION
        |--------------------------------------------------------------------------
        */

        StudentAccreditationApplication::create([

            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'date_of_birth' => $validated['date_of_birth'] ?? null,
            'nationality' => $validated['nationality'] ?? null,

            'institution_name' => $validated['institution_name'],
            'course_name' => $validated['course_name'],
            'award_received' => $validated['award_received'],
            'graduation_date' => $validated['graduation_date'] ?? null,
            'study_mode' => $validated['study_mode'] ?? null,
            'student_number' => $validated['student_number'] ?? null,

            'institution_email' => $validated['institution_email'] ?? null,
            'institution_phone' => $validated['institution_phone'] ?? null,
            'institution_website' => $validated['institution_website'] ?? null,
            'registrar_name' => $validated['registrar_name'] ?? null,

            'certificate_path' => $certificatePath,
            'transcript_path' => $transcriptPath,
            'id_document_path' => $idDocumentPath,

            'status' => 'pending',
        ]);

        return redirect()
            ->back()
            ->with('success', 'Application submitted successfully.');
    }
}