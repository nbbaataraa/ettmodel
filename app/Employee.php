<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Employee extends Model
{
    protected $guarded = [];
    // protected $dateFormat = 'y-m-d';
    protected $casts = [
        'emoloyee_isSoldier' => 'boolean',
    ];


    public function status()
    {
        return $this->hasOne(Status::class);
    }
}
