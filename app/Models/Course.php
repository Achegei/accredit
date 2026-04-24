<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function certificates()
{
    return $this->hasMany(Certificate::class);
}

public function institution()
{
    return $this->belongsTo(\App\Models\Institution::class);
}
}
