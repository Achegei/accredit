<?php

namespace App\Services;

use App\Models\Certificate;
use App\Models\Verification;
use Illuminate\Http\Request;

class VerificationService
{
    /**
     * Verify certificate and log the attempt
     */
    public function verify(string $query, Request $request): array
{
    // 1. CERTIFICATE CHECK
    $certificate = Certificate::with(['student', 'course.institution'])
        ->where('certificate_number', $query)
        ->first();

    if ($certificate) {
        $this->log($query, $request, 'valid', $certificate->course->institution_id);

        return [
            'type' => 'certificate',
            'status' => 'valid',
            'data' => $certificate
        ];
    }

    // 2. INSTITUTION CHECK
    $institution = \App\Models\Institution::where('name', 'LIKE', "%$query%")->first();

    if ($institution) {
        $this->log($query, $request, 'valid', $institution->id);

        return [
            'type' => 'institution',
            'status' => 'valid',
            'data' => $institution
        ];
    }

    // 3. COURSE CHECK
    $course = \App\Models\Course::where('name', 'LIKE', "%$query%")->first();

    if ($course) {
        $this->log($query, $request, 'valid', $course->institution_id);

        return [
            'type' => 'course',
            'status' => 'valid',
            'data' => $course
        ];
    }

    // 4. NOT FOUND
    $this->log($query, $request, 'not_found');

    return [
        'type' => null,
        'status' => 'not_found',
        'message' => 'No matching record found'
    ];
}
    /**
     * Log verification attempt
     */
    private function log(string $number, Request $request, string $result, $institutionId = null): void
    {
        Verification::create([
            'certificate_number' => $number,
            'checked_at' => now(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'result' => $result,
            'institution_id' => $institutionId
        ]);
    }
    
}