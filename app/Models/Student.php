<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function certificates()
{
    return $this->hasMany(Certificate::class);
}

public function institution()
{
    return $this->belongsTo(Institution::class);
}
}
