<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'institution_id',
        'full_name',
        'email',
        'phone',
        'id_number',
        'date_of_birth',
        'gender',
        'nationality',
        'registration_number',
        'enrollment_date',
        'status',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'enrollment_date' => 'date',
    ];

    // ================= RELATIONSHIPS =================

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
}