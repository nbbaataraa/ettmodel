<?php

use App\Employee;
use App\Status;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Employee::class, 50)->create()->each(function ($emp) {
            $emp->status()->save(factory(Status::class)->make());
        });
        factory(Status::class)->create();
        factory(User::class, 10)->create();
    }
}
