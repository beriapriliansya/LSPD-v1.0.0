<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentCommand extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_name',
        'rank_required',
        'responsibilities',
        'sop_guidelines',
    ];
}
