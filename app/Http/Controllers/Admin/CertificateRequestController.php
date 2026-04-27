<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Student;
use App\Models\Course;
use App\Models\CertificateRequest;
use App\Services\CertificateService;
use Illuminate\Http\Request;

class CertificateRequestController extends Controller
{
    protected $service;

    public function __construct(CertificateService $service)
    {
        $this->service = $service;
    }

    /*
    |--------------------------------------------------------------------------
    | ISSUED CERTIFICATES
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $certificates = Certificate::with([
            'student:id,full_name,registration_number',
            'course.institution'
        ])
        ->latest()
        ->get();

        return view('admin.certificates.index', compact('certificates'));
    }

    /*
    |--------------------------------------------------------------------------
    | ISSUE FORM
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('admin.certificates.create', [
            'students' => Student::latest()->get(),
            'courses'  => Course::latest()->get(),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | ISSUE CERTIFICATE
    |--------------------------------------------------------------------------
    */
    public function issue(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id'  => 'required|exists:courses,id',
            'grade'      => 'nullable|string|max:10',
        ]);

        $this->service->issue([
            'student_id' => $request->student_id,
            'course_id'  => $request->course_id,
            'grade'      => $request->grade,
            'issued_by'  => auth()->id(),
        ]);

        return redirect()
            ->route('admin.certificates.index')
            ->with('success', 'Certificate issued successfully');
    }

    /*
    |--------------------------------------------------------------------------
    | REVOKE CERTIFICATE
    |--------------------------------------------------------------------------
    */
    public function revoke($id)
    {
        $this->service->revoke($id);

        return redirect()
            ->route('admin.certificates.index')
            ->with('success', 'Certificate revoked successfully');
    }

    /*
    |--------------------------------------------------------------------------
    | STRIPE-STYLE BATCH REQUESTS (FIXED)
    |--------------------------------------------------------------------------
    */
    public function requests()
    {
        $requests = CertificateRequest::with([
                'student:id,full_name,registration_number',
                'course:id,name',
                'institution:id,name'
            ])
            ->orderByDesc('created_at')
            ->paginate(10); // ✅ PAGINATION FIX

        return view('admin.certificates.requests', compact('requests'));
    }

    /*
    |--------------------------------------------------------------------------
    | APPROVE SINGLE REQUEST
    |--------------------------------------------------------------------------
    */
    public function approve($id)
    {
        $req = CertificateRequest::findOrFail($id);

        $req->update([
            'status' => 'approved',
            'reviewed_by' => auth()->id(),
            'reviewed_at' => now(),
        ]);

        return redirect()
            ->route('admin.certificates.requests')
            ->with('success', 'Request approved');
    }

    /*
    |--------------------------------------------------------------------------
    | REJECT SINGLE REQUEST
    |--------------------------------------------------------------------------
    */
    public function reject(Request $request, $id)
    {
        $request->validate([
            'comment' => 'nullable|string|max:1000',
        ]);

        $certRequest = CertificateRequest::findOrFail($id);

        $certRequest->update([
            'status' => 'rejected',
            'admin_comment' => $request->comment,
            'reviewed_by' => auth()->id(),
            'reviewed_at' => now(),
        ]);

        return redirect()
            ->route('admin.certificates.requests')
            ->with('success', 'Request rejected');
    }

    /*
    |--------------------------------------------------------------------------
    | BULK ACTIONS
    |--------------------------------------------------------------------------
    */
    public function bulk(Request $request)
    {
        $request->validate([
            'ids'    => 'required|array|min:1',
            'action' => 'required|in:approve,reject',
        ]);

        $status = $request->action === 'approve'
            ? 'approved'
            : 'rejected';

        $updateData = [
            'status' => $status,
            'reviewed_by' => auth()->id(),
            'reviewed_at' => now(),
        ];

        if ($status === 'rejected') {
            $updateData['admin_comment'] = 'Bulk rejection';
        }

        CertificateRequest::whereIn('id', $request->ids)
            ->update($updateData);

        return redirect()
            ->route('admin.certificates.requests')
            ->with('success', 'Bulk action completed successfully');
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW SINGLE REQUEST
    |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        $request = CertificateRequest::with([
                'student',
                'course',
                'institution'
            ])
            ->findOrFail($id);

        return view('admin.certificates.show', compact('request'));
    }
}