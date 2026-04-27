<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Batch extends Model
{
    protected $fillable = [
        'institution_id',
        'cohort_name',
        'status',
        'total_rows',
        'processed_rows',
        'failed_rows',
        'created_by',
    ];

    public function requests(): HasMany
    {
        return $this->hasMany(CertificateRequest::class);
    }

    public function progress(): float
    {
        if ($this->total_rows == 0) return 0;

        return round(($this->processed_rows / $this->total_rows) * 100, 2);
    }
}