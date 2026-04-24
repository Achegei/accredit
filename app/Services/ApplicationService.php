<?php

namespace App\Services;

use App\Models\Application;
use App\Models\Institution;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\PartnerApprovedMail;
use App\Mail\ApplicationRejectedMail;

class ApplicationService
{
    /**
     * Store a new application
     */
    public function submit(array $data): Application
    {
        return Application::create([
            'institution_name' => $data['institution_name'],
            'contact_person'   => $data['contact_person'],
            'email'            => $data['email'],
            'phone'            => $data['phone'],
            'category'         => $data['category'],
            'description'      => $data['description'] ?? null,
            'status'           => 'pending',
        ]);
    }

    /**
     * Approve application → create institution + user
     */
    public function approve(Application $application): array
    {
        // 1. Create Institution
        $institution = Institution::create([
            'name' => $application->institution_name,
            'email' => $application->email,
            'phone' => $application->phone,
            'status' => 'approved',
        ]);

        // 2. Generate Password
        $password = Str::random(10);

        // 3. Create User (Partner)
        $user = User::create([
            'name' => $application->contact_person,
            'email' => $application->email,
            'password' => Hash::make($password),
            'role' => 'partner',
            'institution_id' => $institution->id,
        ]);

        // 4. Update Application Status
        $application->update([
            'status' => 'approved'
        ]);

        // 5. Send Email (basic for now)
        Mail::to($user->email)->send(new PartnerApprovedMail($user, $password));

        return [
            'institution' => $institution,
            'user' => $user
        ];
    }

    public function reject(Application $application, ?string $notes = null): void
{
    $application->update([
        'status' => 'rejected',
        'notes' => $notes
    ]);

    Mail::to($application->email)
        ->send(new ApplicationRejectedMail($application));
}
}