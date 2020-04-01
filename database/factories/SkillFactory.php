<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Skill;
use Faker\Generator as Faker;
use App\Employee;
$factory->define(Skill::class, function (Faker $faker) {
    return [
        'employee_id' => Employee::all()->random()->id,
        'skill_name' =>$faker->text(10),
        'skill_type' =>$faker->text(5),
        'skill_level' =>$faker->randomDigit,
        
    ];
});
