<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Services\ApplicationService;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    protected $service;

    public function __construct(ApplicationService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $applications = Application::latest()->get();

        return view('admin.applications.index', compact('applications'));
    }

    public function approve($id)
    {
        $application = Application::findOrFail($id);

        $this->service->approve($application);

        return back()->with('success', 'Partner created successfully');
    }

    public function show($id)
{
    $application = Application::findOrFail($id);

    return view('admin.applications.show', compact('application'));
}

public function reject(Request $request, $id)
{
    $application = Application::findOrFail($id);

    $application->update([
        'status' => 'rejected',
        'notes' => $request->notes
    ]);

    return redirect()->back()->with('success', 'Application rejected');
}
}