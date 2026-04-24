<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $fillable = [
        'application_id',
        'name',
        'email',
        'phone',
        'country',
        'status',
        'accreditation_level',
        'logo',
        'verification_code'
    ];

    // Relationships
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}