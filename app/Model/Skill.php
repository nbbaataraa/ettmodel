<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Employee;

class Skill extends Model
{

    protected $fillable = [
                        'employee_id',
                        'skill_name',
                        'skill_type',
                        'skill_level',
                        ];
    public function employee(){
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    // public function skillTypes(){
    //     return $this->belongsToMany(SkillType::class);
    // }
}
