<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalProcedure extends Model
{
    use HasFactory;

    protected $fillable = [
        'step_number',
        'stage_name',
        'guideline_text',
    ];
}
