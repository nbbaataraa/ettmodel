<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SkillType extends Model
{
    protected $fillable = [
        'skill_type_name',
        'skill_level',
    ];

    
}
