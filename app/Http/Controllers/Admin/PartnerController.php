<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Institution;

class PartnerController extends Controller
{
    public function partners()
{
    $partners = User::with('institution')
        ->where('role', 'partner')
        ->latest()
        ->paginate(10);

    return view('admin.partners.index', compact('partners'));
}

public function show($id)
{
    $partner = User::with('institution')
        ->where('role', 'partner')
        ->findOrFail($id);

    return view('admin.partners.show', compact('partner'));
}

public function edit($id)
{
    $partner = User::where('role', 'partner')->findOrFail($id);
    $institutions = Institution::all();

    return view('admin.partners.edit', compact('partner', 'institutions'));
}

public function update(Request $request, $id)
{
    $partner = User::where('role', 'partner')->findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'institution_id' => 'nullable|exists:institutions,id',
    ]);

    $partner->update([
        'name' => $request->name,
        'email' => $request->email,
        'institution_id' => $request->institution_id,
    ]);

    return redirect()
        ->route('admin.partners.index')
        ->with('success', 'Partner updated successfully');
}

public function destroy($id)
{
    $partner = User::where('role', 'partner')->findOrFail($id);
    $partner->delete();

    return back()->with('success', 'Partner deleted');
}
}
