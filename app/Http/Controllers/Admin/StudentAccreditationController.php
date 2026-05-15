<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentAccreditationApplication;

class StudentAccreditationController extends Controller
{
    /**
     * List applications
     */
    public function index()
    {
        $applications = StudentAccreditationApplication::latest()->paginate(20);

        return view(
            'admin.student-accreditation.index',
            compact('applications')
        );
    }

    /**
     * Show single application
     */
    public function show($id)
    {
        $application = StudentAccreditationApplication::findOrFail($id);

        return view(
            'admin.student-accreditation.show',
            compact('application')
        );
    }

    /**
     * Update status
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $application = StudentAccreditationApplication::findOrFail($id);

        $application->status = $request->status;

        $application->admin_notes = $request->admin_notes;

        $application->save();

        return back()->with(
            'success',
            'Application updated successfully.'
        );
    }
}