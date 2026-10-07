<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeaponClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_name',
        'allowed_ranks',
        'allowed_weapons',
        'rules',
    ];
}
