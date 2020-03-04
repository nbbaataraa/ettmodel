<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\SkillType;
use App\Model\Skill;
use Faker\Generator as Faker;

$factory->define(SkillType::class, function (Faker $faker) {
    return [
        'skill_id' => Skill::all()->random()->id,
        'skill_type_name' =>$faker->text(15),
        'skill_level' =>$faker->randomDigit(5)
    ];
});
