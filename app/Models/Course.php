<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'institution_id',
    ];

    // Relationships
    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function institution()
    {
        return $this->belongsTo(\App\Models\Institution::class);
    }

    protected static function boot()
{
    parent::boot();

    static::creating(function ($course) {
        $course->code = $course->code ?? 'CRS-' . rand(100000, 999999);
    });
}
}