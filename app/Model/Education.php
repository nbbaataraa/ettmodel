<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Employee;

class Education extends Model
{
    public function employee (){        
            return $this->belongsTo(Employee::class, 'employee_id');
        }
        protected $fillable = [
            'employee_id',
            'edu_collage',
            'edu_high',
            'edu_senior',
            'edu_magister',
            'edu_doctor',
            'edu_universities'
        ];
    }
