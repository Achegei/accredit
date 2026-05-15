<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAccreditationApplication extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'date_of_birth',
        'nationality',

        'institution_name',
        'course_name',
        'award_received',
        'graduation_date',
        'study_mode',
        'student_number',

        'institution_email',
        'institution_phone',
        'institution_website',
        'registrar_name',

        'certificate_path',
        'transcript_path',
        'id_document_path',

        'status',
        'admin_notes',
        'institution_feedback',
    ];

    /*
    |--------------------------------------------------------------------------
    | 🔗 RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    public function verification()
    {
        return $this->hasOne(InstitutionVerification::class, 'application_id');
    }

    public function documents()
    {
        return $this->hasMany(ApplicationDocument::class, 'application_id');
    }
}