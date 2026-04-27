<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class CertificateRequest extends Model
{
    /*
    |--------------------------------------------------------------------------
    | MASS ASSIGNMENT
    |--------------------------------------------------------------------------
    */
    protected $fillable = [
    'student_id',
    'course_id',
    'institution_id',
    'grade',
    'status',
    'admin_comment',
    'reviewed_by',
    'reviewed_at',
    'resubmission_count',

    // ✅ ADD THESE
    'cohort_name',
    'batch_id',
];

    /*
    |--------------------------------------------------------------------------
    | CASTS
    |--------------------------------------------------------------------------
    */
    protected $casts = [
        'reviewed_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

    public function batch()
        {
            return $this->belongsTo(Batch::class);
        }

    /*
    |--------------------------------------------------------------------------
    | STATUS HELPERS
    |--------------------------------------------------------------------------
    */
    public function isPending()
    {
        return $this->status === 'pending';
    }

    public function isApproved()
    {
        return $this->status === 'approved';
    }

    public function isRejected()
    {
        return $this->status === 'rejected';
    }

    public function isResubmitted()
    {
        return $this->status === 'resubmitted';
    }

    public function isUnderReview()
    {
        return $this->status === 'under_review';
    }

    public function canResubmit(): bool
    {
        return $this->status === 'rejected';
    }

    /*
    |--------------------------------------------------------------------------
    | WORKFLOW HELPERS
    |--------------------------------------------------------------------------
    */

    public function reject($comment = null, $adminId = null)
    {
        $this->update([
            'status' => 'rejected',
            'admin_comment' => $comment,
            'reviewed_by' => $adminId ?? auth()->id(),
            'reviewed_at' => now(),
        ]);
    }

    public function approve($adminId = null)
    {
        $this->update([
            'status' => 'approved',
            'reviewed_by' => $adminId ?? auth()->id(),
            'reviewed_at' => now(),
        ]);
    }

    public function resubmit()
    {
        $this->update([
            'status' => 'pending',
            'resubmission_count' => ($this->resubmission_count ?? 0) + 1,
        ]);
    }
}