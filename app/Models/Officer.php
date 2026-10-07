<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'badge_number',
        'rank',
        'division',
        'duty_status',
        'phone_number',
        'avatar_url',
    ];
}
