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
     * Approve application → create institution + user + ownership link
     */
    public function approve(Application $application): array
    {
        // 🔒 Prevent double approval
        if ($application->status === 'approved') {
            return [
                'institution' => $application->institution,
                'user' => User::where('email', $application->email)->first()
            ];
        }

        // 1. Create Institution (linked to application)
        $institution = Institution::create([
            'name' => $application->institution_name,
            'email' => $application->email,
            'phone' => $application->phone,
            'status' => 'approved',
            'application_id' => $application->id,
        ]);

        // 2. Generate secure password
        $password = Str::random(10);

        // 3. Create or update partner user
        $user = User::updateOrCreate(
            ['email' => $application->email],
            [
                'name' => $application->contact_person,
                'password' => Hash::make($password),
                'role' => 'partner',
            ]
        );

        // 4. 🔥 FULL OWNERSHIP LINK (CRITICAL FIX)
        $user->update([
            'institution_id' => $institution->id,
        ]);

        $institution->update([
            'owner_user_id' => $user->id, // requires migration (recommended)
        ]);

        // 5. Mark application approved
        $application->update([
            'status' => 'approved'
        ]);

        // 6. Send approval email
        Mail::to($user->email)->send(
            new PartnerApprovedMail($user, $password)
        );

        return [
            'institution' => $institution,
            'user' => $user
        ];
    }

    /**
     * Reject application
     */
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