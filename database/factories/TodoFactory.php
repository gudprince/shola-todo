<?php

namespace Database\Factories;

use App\Models\Todo;
use App\Models\TodoGroup;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class TodoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = todo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'todo_group_id' => TodoGroup::factory(),
            'user_id'  => User::factory(),
            'is_complete'  => $this->faker->numberBetween($min = 0, $max = 1)
        ];
    }
}
