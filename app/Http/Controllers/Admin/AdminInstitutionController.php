<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Institution;
use App\Models\Course;
use Illuminate\Http\Request;

class AdminInstitutionController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LIST INSTITUTIONS
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $institutions = Institution::latest()->get();

        return view('admin.institutions.index', compact('institutions'));
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW INSTITUTION + COURSES
    |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        $institution = Institution::with('courses')->findOrFail($id);

        return view('admin.institutions.show', compact('institution'));
    }

    /*
    |--------------------------------------------------------------------------
    | ADD COURSE (ACCREDIT)
    |--------------------------------------------------------------------------
    */
    public function addCourse(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Course::create([
            'institution_id' => $id,
            'name' => $request->name,
        ]);

        return back()->with('success', 'Course added');
    }

    /*
    |--------------------------------------------------------------------------
    | REMOVE COURSE
    |--------------------------------------------------------------------------
    */
    public function removeCourse($id, $courseId)
    {
        $course = Course::where('institution_id', $id)
            ->where('id', $courseId)
            ->firstOrFail();

        $course->delete();

        return back()->with('success', 'Course removed');
    }

    public function destroy($id)
    {
        $institution = Institution::findOrFail($id);
        $institution->delete();

        return back()->with('success', 'Institution deleted');
    }
}