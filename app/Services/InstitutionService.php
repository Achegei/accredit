<?php

namespace App\Services;

use App\Models\Institution;
use App\Models\Application;
use Illuminate\Support\Str;

class InstitutionService
{
    public function createFromApplication(Application $application): Institution
    {
        return Institution::create([
            'application_id' => $application->id,
            'name' => $application->institution_name,
            'email' => $application->email,
            'phone' => $application->phone,
            'country' => null,
            'status' => 'approved',
            'accreditation_level' => 'pending',
            'verification_code' => $this->generateCode(),
        ]);
    }

    private function generateCode(): string
    {
        return 'GEST-' . strtoupper(Str::random(10));
    }
}