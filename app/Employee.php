<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Employee extends Model
{
    // protected $guarded = [];
    // protected $dateFormat = 'y-m-d';
    protected $fillable = ['family_name',
                        'fname',
                        'lname',
                        // 'employee_age',
                        'employee_reg_num',
                        'employee_BOT',
                        'employee_bith_place',
                        'employee_address',
                        'employee_nationality',
                        'employee_social_origin',
                        'employee_isSoldier',
                        'employee_n_number',
                        'employee_health_number',
                        'employee_drive_license',
                        'employee_drive_license_mine',
                        'employee_phone_num',
                        'employee_phone_num_home',
                        'employee_email1',
                        'employee_email2',
                        'employee_revenue',
                        'employee_sizeOf_suits',
                        'employee_appointment',
                        'employee_department',
                        'employee_shift',
                        'employee_live_location',
                        'employee_campus'];
    protected $casts = [
        'emoloyee_isSoldier' => 'boolean',
    ];


    public function status()
    {
        return $this->hasOne(Status::class);
    }
}
