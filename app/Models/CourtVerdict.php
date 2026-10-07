<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourtVerdict extends Model
{
    use HasFactory;

    protected $fillable = [
        'step_number',
        'case_type',
        'stage_name',
        'description',
        'required_evidence',
    ];
}
