<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
