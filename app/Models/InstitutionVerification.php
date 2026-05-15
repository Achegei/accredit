<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstitutionVerification extends Model
{
    protected $fillable = [
        'application_id',
        'contact_person',
        'contact_email',
        'verification_status',
        'program_hours',
        'delivery_language',
        'study_mode',
        'curriculum_summary',
        'institution_response',
        'contacted_at',
        'responded_at',
    ];

    public function application()
    {
        return $this->belongsTo(
            StudentAccreditationApplication::class,
            'application_id'
        );
    }
}