<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function store(Request $request)
{
    $validated = $request->validate([
        'institution_name' => 'required|string|max:255',
        'contact_person' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'nullable|string',
        'category' => 'nullable|string',
        'description' => 'nullable|string',
    ]);

    Application::create([
        'institution_name' => $validated['institution_name'],
        'contact_person' => $validated['contact_person'],
        'email' => $validated['email'],
        'phone' => $validated['phone'] ?? null,
        'category' => $validated['category'] ?? 'general',
        'description' => $validated['description'],
        'status' => 'pending',
    ]);

    return redirect()->back()->with('success', 'Application submitted successfully.');
}
}
