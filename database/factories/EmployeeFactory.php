<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'family_name' => $faker->text(10),
        'fname' => $faker->text(10),
        'lname' => $faker->text(10),
        'employee_reg_num' => $faker->text(8),
        'employee_BOT' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'employee_bith_place' => $faker->text(100),
        'employee_address' => $faker->text(200),
        'employee_nationality' => $faker->text(50),
        'employee_social_origin' => $faker->text(50),
        'employee_isSoldier' => $faker->boolean(true),
        'employee_n_number' => $faker->text(10),
        'employee_health_number' => $faker->text(10),
        'employee_drive_license' => $faker->randomDigit(8),
        'employee_drive_license_mine' => $faker->text(8),
        'employee_phone_num' => $faker->randomDigit(8),
        'employee_phone_num_home' => $faker->randomDigit(8),
        'employee_email1' => $faker->unique()->safeEmail,
        'employee_email2' => $faker->unique()->safeEmail,
        'employee_revenue' => $faker->text(10),
        'employee_sizeOf_suits' => $faker->randomDigit(2),
        'employee_appointment' => $faker->text(50),
        'employee_department' => $faker->text(50),
        'employee_shift' => $faker->text(50),
        'employee_live_location' => $faker->text(50),
        'employee_campus' => $faker->text(50),
    ];
});
