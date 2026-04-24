<?php

namespace App\Services\Partner;

use App\Models\User;
use App\Models\Institution;
use App\Services\Auth\CredentialService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\PartnerCredentialsMail;

class PartnerService
{
    public function createPartner(array $data)
    {
        return DB::transaction(function () use ($data) {

            $credentialService = new CredentialService();

            $plainPassword = $credentialService->generatePassword();

            // 1. Create Institution
            $institution = Institution::create([
                'name' => $data['institution_name'],
                'email' => $data['email'],
                'phone' => $data['phone'] ?? null,
                'country' => $data['country'] ?? null,
                'status' => 'approved',
            ]);

            // 2. Create User (Partner)
            $user = User::create([
                'name' => $data['institution_name'] . ' Admin',
                'email' => $data['email'],
                'password' => $credentialService->hashPassword($plainPassword),
                'role' => 'partner',
                'institution_id' => $institution->id,
            ]);

            // 3. Send Email
            Mail::to($user->email)->send(
                new PartnerCredentialsMail($user, $plainPassword)
            );

            return $user;
        });
    }
}