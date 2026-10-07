<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromotionQualification extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_rank',
        'to_rank',
        'category_type',
        'requirements_list',
    ];
}
