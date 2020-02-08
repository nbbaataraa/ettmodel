<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Employee;

class Skill extends Model
{
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
