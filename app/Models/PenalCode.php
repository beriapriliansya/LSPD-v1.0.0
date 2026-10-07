<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenalCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'code',
        'title',
        'fine',
        'jail_time',
        'license_action',
        'type',
        'description',
    ];
}
