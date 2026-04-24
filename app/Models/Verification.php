<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    protected $fillable = [
    'certificate_number',
    'checked_at',
    'ip_address',
    'user_agent',
    'result',
    'institution_id'
];

}
