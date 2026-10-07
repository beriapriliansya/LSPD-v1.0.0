<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContrabandRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'fine_per_unit',
        'jail_per_unit',
        'category',
    ];
}
