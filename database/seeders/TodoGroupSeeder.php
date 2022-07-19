<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Todo;
use App\Models\User;
use App\Models\TodoGroup;
use Faker\Factory;

class TodoGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $faker = Factory::create();

        TodoGroup::factory()->count(4)
            ->has(Todo::factory()->count(2)
                ->for(User::factory()->state(['email'=>$faker->unique()->safeEmail]))
            )
            ->create();
    }
}
