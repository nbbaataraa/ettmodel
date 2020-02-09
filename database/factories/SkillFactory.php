<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Skill;
use Faker\Generator as Faker;
use App\Employee;
$factory->define(Skill::class, function (Faker $faker) {
    return [
        'employee_id' => Employee::all()->random()->id,
        'isSoftware' =>$faker->boolean(true),
        'isLanguage' =>$faker->boolean(true),
        'isLanguageHaveExams' =>$faker->boolean(true),
        'isOthers' =>$faker->boolean(false),
        'skill_name' =>$faker->text(10)
    ];
});
