<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Education;
use Faker\Generator as Faker;
use App\Employee;

$factory->define(Education::class, function (Faker $faker) {
    return [
        'employee_id' => Employee::all()->random()->id,
        'edu_collage' =>$faker->text(10),
        'edu_high' =>$faker->text(10),
        'edu_senior' =>$faker->text(10),
        'edu_magister' =>$faker->text(10),
        'edu_doctor' =>$faker->text(10),
        'edu_universities' =>$faker->text(10)
    ];
});
