<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Status;
use App\Employee;
use Faker\Generator as Faker;

$factory->define(Status::class, function (Faker $faker) {
    return [
        'isActive' => $faker->boolean(true),
        'isPregnant' => $faker->boolean(false),
        'isCareBaby' => $faker->boolean(false),
        'isTakeFree' => $faker->boolean(false),
        'employee_id' => Employee::inRandomOrder()->first()->id,
    ];
});
