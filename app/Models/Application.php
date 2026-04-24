<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'institution_name',
        'contact_person',
        'email',
        'phone',
        'category',
        'description',
        'status',
        'notes'
    ];
}