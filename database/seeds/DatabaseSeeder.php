<?php

use App\Employee;
use App\Status;
use App\User;
use Illuminate\Database\Seeder;
use App\Model\Skill;
use App\Model\SkillType;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Employee::class, 500)->create()->each(function ($emp) {
            $emp->status()->save(factory(Status::class)->make());
         });
        factory(Status::class)->create();
        factory(User::class, 10)->create();
        
        factory(Skill::class, 300)->create();

        factory(SkillType::class, 430)->create();
        
    }
}
