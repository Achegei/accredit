<?php

namespace App\Services;

use App\Models\Certificate;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class CertificateService
{
    /**
     * Issue a new certificate
     */
    public function issue(array $data): Certificate
    {
        return DB::transaction(function () use ($data) {

            $certificateNumber = $this->generateCertificateNumber();

            return Certificate::create([
                'student_id' => $data['student_id'],
                'course_id'  => $data['course_id'],
                'certificate_number' => $certificateNumber,
                'issue_date' => now(),
                'grade' => $data['grade'] ?? null,
                'status' => 'valid',
            ]);
        });
    }

    /**
     * Generate unique sequential certificate number
     */
    private function generateCertificateNumber(): string
    {
        $year = date('Y');
        $country = 'KE';

        // Get last certificate for sequencing
        $last = Certificate::orderBy('id', 'desc')->first();

        $nextId = $last ? $last->id + 1 : 1;

        $sequence = str_pad($nextId, 6, '0', STR_PAD_LEFT);

        return "GEST-{$country}-{$year}-{$sequence}";
    }

    /**
     * Revoke a certificate
     */
    public function revoke(int $certificateId): bool
    {
        $certificate = Certificate::findOrFail($certificateId);

        return $certificate->update([
            'status' => 'revoked'
        ]);
    }

    /**
     * Get certificate by number (used for verification system)
     */
    public function findByNumber(string $number): ?Certificate
    {
        return Certificate::with(['student', 'course'])
            ->where('certificate_number', $number)
            ->first();
    }
}