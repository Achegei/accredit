<?php

namespace App\Services\Auth;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class CredentialService
{
    public function generatePassword(): string
    {
        return Str::random(10);
    }

    public function hashPassword(string $password): string
    {
        return Hash::make($password);
    }
}