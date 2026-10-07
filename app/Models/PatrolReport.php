<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatrolReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'officer_name',
        'badge_number',
        'station',
        'rank',
        'incident_date',
        'incident_details',
        'bbcode_output',
        'status',
    ];
}
